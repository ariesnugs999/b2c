<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{

    function __construct() {
        parent::__construct();

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
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['topProducts'] = $this->welcome_model->topProducts();
        $this->data['chartData'] = $this->welcome_model->getChartData();
        $this->data['view_so'] = $this->welcome_model->viewSO();
        $this->data['page_title'] = lang('dashboard');
        $bc = array(array('link' => '#', 'page' => lang('dashboard')));
        $meta = array('page_title' => lang('dashboard'), 'bc' => $bc);
        $this->page_construct('dashboard', $this->data, $meta);

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

    function get_sales() {
        $this->load->library('datatables');
        if ($this->db->dbdriver == 'sqlite3') {
            $this->datatables->select("invoice_no, strftime('%Y-%m-%d %H:%M', date) as date, customer_name, total, total_tax, total_discount, grand_total, paid, (grand_total-paid) as balance, status");
        } else {
            $this->datatables->select("id, DATE_FORMAT(date, '%Y-%m-%d %H:%i') as date, customer_name, total, total_tax, total_discount, grand_total, paid, (grand_total-paid) as balance, status");
        }
        $this->datatables->from('sales');
        $this->datatables->where('status', 'paid');
        if (!$this->Admin && !$this->session->userdata('view_right')) {
            $this->datatables->where('created_by', $this->session->userdata('user_id'));
        }
        $this->datatables->where('store_id', $this->session->userdata('store_id'));
        $this->datatables->add_column("Actions", "<div class='text-center'>
        <div class='btn-group'>
        <a href='" . site_url('pos/view/$1/1') . "' title='".lang("view_invoice")."' class='tip btn btn-primary btn-xs' data-toggle='ajax-modal'><i class='fa fa-list'></i></a> 
        <a href='".site_url('sales/payments/$1')."' title='" . lang("view_payments") . "' class='tip btn btn-primary btn-xs' data-toggle='ajax'><i class='fa fa-money'></i></a> 
        <a href='".site_url('sales/add_payment/$1')."' title='" . lang("add_payment") . "' class='tip btn btn-primary btn-xs' data-toggle='ajax'><i class='fa fa-briefcase'></i></a> 
        <a href='" . site_url('pos/?edit=$1') . "' title='".lang("edit_invoice")."' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a> <a href='" . site_url('sales/delete/$1') . "' onClick=\"return confirm('". lang('alert_x_sale') ."')\" title='".lang("delete_sale")."' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a>
        </div>
        </div>", "id");

        // $this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

}
