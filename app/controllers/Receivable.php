<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Receivable extends MY_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('pos');

        if (! $this->loggedIn) {
            redirect('login');
        }
        if (version_compare($this->Settings->version, '4.0.14', '<=')) {
            $this->load->model('db_update');
            $this->db_update->update();
        }
        $this->load->model('welcome_model');
        if ($register = $this->site->registerData($this->session->userdata('user_id'))) {
            $register_data = array('register_id' => $register->id, 'cash_in_hand' => $register->cash_in_hand, 'register_open_time' => $register->date, 'store_id' => $register->store_id);
            $this->session->set_userdata($register_data);
        }
    }

    function index() {
        if (!$this->loggedIn) {
            redirect('login');
        }
        if (!$this->Admin) {
            $this->session->set_flashdata('warning', lang("access_denied"));
            redirect($_SERVER["HTTP_REFERER"]);
        }
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['topProducts'] = $this->welcome_model->topProducts();
        $this->data['chartData'] = $this->welcome_model->getChartData();
        $this->data['view_invoice'] = $this->welcome_model->view_invoice();
        $this->data['page_title'] = lang('Receivable');
        $bc = array(array('link' => '#', 'page' => lang('Receivable')));
        $meta = array('page_title' => lang('Receivable'), 'bc' => $bc);
        $this->page_construct('receivable/index', $this->data, $meta);
    }

    function disabled() {
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['page_title'] = lang('disabled_in_demo');
        $bc = array(array('link' => '#', 'page' => lang('disabled_in_demo')));
        $meta = array('page_title' => lang('disabled_in_demo'), 'bc' => $bc);
        $this->page_construct('disabled', $this->data, $meta);
    }

    public function signing($req = NULL) {
        if (!$req) {
            header("Content-type: text/plain");
            echo file_get_contents('./files/public.pem');
            exit(0);
        } else {

            $privateKey = openssl_get_privatekey(file_get_contents('./files/private.pem'), 'S3cur3P@ssw0rd');
            $signature = null;
            openssl_sign($req, $signature, $privateKey);

            if ($signature) {
                header("Content-type: text/plain");
                echo base64_encode($signature);
                exit(0);
            }

            echo '<h1>Error signing message</h1>';
            exit(1);
        }
    }

    function get_invoice() {
        $this->load->library('datatables');
        if ($this->db->dbdriver == 'sqlite3') {
            $this->datatables->select("invoice_no, strftime('%Y-%m-%d', invoice_date) as invoice_date, strftime('%Y-%m-%d', due_date) as due_date, currency, debit, total_debit, top, finance_receipt_no,  strftime('%Y-%m-%d', finance_receipt_date) as finance_receipt_date, bank, credit, total_credit, cek, category");
        } else {
            $this->datatables->select("invoice_no, DATE_FORMAT(invoice_date, '%Y-%m-%d') as invoice_date, invoice_date, DATE_FORMAT(due_date, '%Y-%m-%d') as due_date, currency, debit, total_debit, top, finance_receipt_no,  DATE_FORMAT(finance_receipt_date, '%Y-%m-%d') as finance_receipt_date, bank, credit, total_credit, cek, category");
        }
        $this->datatables->from('v_so');
        // $this->datatables->where('status', 'paid');
        // if (!$this->Admin && !$this->session->userdata('view_right')) {
        //     $this->datatables->where('created_by', $this->session->userdata('user_id'));
        // }
        // $this->datatables->where('store_id', $this->session->userdata('store_id'));
        $this->datatables->add_column("Actions", "<div class='text-center'>
        <div class='btn-group'>
        <a href='" . site_url('pos/view/$1/1') . "' title='".lang("view_invoice")."' class='tip btn btn-primary btn-xs' data-toggle='ajax-modal'><i class='fa fa-list'></i></a> 
        <a href='".site_url('sales/payments/$1')."' title='" . lang("view_payments") . "' class='tip btn btn-primary btn-xs' data-toggle='ajax'><i class='fa fa-money'></i></a> 
        <a href='".site_url('sales/add_payment/$1')."' title='" . lang("add_payment") . "' class='tip btn btn-primary btn-xs' data-toggle='ajax'><i class='fa fa-briefcase'></i></a> 
        <a href='" . site_url('pos/?edit=$1') . "' title='".lang("edit_invoice")."' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a> <a href='" . site_url('sales/delete/$1') . "' onClick=\"return confirm('". lang('alert_x_sale') ."')\" title='".lang("delete_sale")."' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>
        </div>
        </div>", "invoice_no");

        // $this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

}
