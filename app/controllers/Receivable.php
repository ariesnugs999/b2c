<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Receivable extends MY_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->loggedIn) {
            redirect('login');
        }
        if ( ! $this->session->userdata('store_id')) {
            $this->session->set_flashdata('warning', lang("please_select_store"));
            redirect('stores');
        }
        $this->load->library('form_validation');
        $this->load->helper('pos');
        $this->load->model('receivable_model');

        $this->digital_file_types = 'zip|pdf|doc|docx|xls|xlsx|jpg|png|gif';

    }

    function index() {
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['page_title'] = lang('receivable2');
        $account_customer = $this->session->userdata('account_customer');
        $this->data['view_invoice'] = $this->receivable_model->view_invoice();
        $bc = array(array('link' => '#', 'page' => lang('receivable2')));
        $meta = array('page_title' => lang('receivable2'), 'bc' => $bc);
        $this->page_construct('receivable/index', $this->data, $meta);
    }

    function view($id = NULL) {
        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $sales = $this->site->getSalesByID($id);
        $this->data['sales'] = $sales;
        $this->data['invoice'] = $this->site->geInvoiceByID($sales->invoice_no);
        $this->load->view($this->theme.'receivable/view', $this->data);
    }

    function get_invoice() {
       
        $cust_id = $this->session->userdata('account_customer');
        $this->load->library('datatables');
        if ($this->db->dbdriver == 'sqlite3') {
            $this->datatables->select("invoice_no, strftime('%Y-%m-%d', invoice_date) as invoice_date, strftime('%Y-%m-%d', due_date) as due_date, currency, debit, total_debit, top, finance_receipt_no,  strftime('%Y-%m-%d', finance_receipt_date) as finance_receipt_date, bank, credit, total_credit, cek, category");
        } else {
            if (!$this->Admin ) {
                $this->datatables->select("invoice_no, DATE_FORMAT(invoice_date, '%Y-%m-%d') as invoice_date, invoice_date, DATE_FORMAT(due_date, '%Y-%m-%d') as due_date, currency, debit, total_debit, top, finance_receipt_no,  DATE_FORMAT(finance_receipt_date, '%Y-%m-%d') as finance_receipt_date, bank, credit, total_credit, cek, category");
                
            } else{
                $this->datatables->select("invoice_no, DATE_FORMAT(invoice_date, '%Y-%m-%d') as invoice_date, invoice_date, DATE_FORMAT(due_date, '%Y-%m-%d') as due_date, currency, debit, total_debit, top, finance_receipt_no,  DATE_FORMAT(finance_receipt_date, '%Y-%m-%d') as finance_receipt_date, bank, credit, total_credit, cek, category");
                $this->datatables->where('account_customer', $this->session->userdata('account_customer'));
                
            }
           
        }
        // $this->datatables->where('status', 'paid');
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

    function details($id = NULL) {
        $this->data['details'] = $this->receivable_model->getReceivableDetails($id);
        $this->load->view($this->theme . 'receivable/details', $this->data);
    }

    public function ajax_details($id)
    {
        $data = $this->receivable_model->get_details_by_id($id);
        $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

}
