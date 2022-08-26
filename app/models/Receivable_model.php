<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Receivable_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    // get user
    public function read_user_info($id) {
    
        $sql = 'SELECT * FROM tec_users WHERE id = ?';
        $binds = array($id);
        $query = $this->db->query($sql, $binds);
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
        
    }

    public function view_invoice($account_customer = NULL) {
        if(!$this->Admin) {
            $account_customer = $this->session->userdata('account_customer');
        }
        // $this->db->select("invoice_no, invoice_date, due_date, currency, debit, total_debit, top, finance_receipt_no, finance_receipt_date, bank, credit, total_credit, cek, category");
        // $q = $this->db->get('v_so');
        
        // $this->db->where('account_customer', $this->session->userdata('account_customer'));
        $q = $this->db->query("SELECT pfii.item_id, v_so.invoice_no, invoice_date, due_date, currency, debit, total_debit, top, finance_receipt_no, finance_receipt_date, bank, credit, total_credit, v_so.cek, category FROM v_so LEFT JOIN paste_finance_invoice_items pfii ON pfii.invoice_no = v_so.invoice_no where account_customer ='$account_customer'");
        // $this->db->select("invoice_no, invoice_date, due_date, currency, debit, total_debit, top, finance_receipt_no, finance_receipt_date, bank, credit, total_credit, cek, category")
        // ->where('account_customer', $account_id);
        // $q = $this->db->get('v_so');
        if ($q !== FALSE && $q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function view_invoice2($id) {
        $sql = 'SELECT pfii.item_id, v_so.invoice_no, invoice_date, due_date, currency, debit, total_debit, top, finance_receipt_no, finance_receipt_date, bank, credit, total_credit, v_so.cek, category FROM v_so LEFT JOIN paste_finance_invoice_items pfii ON pfii.invoice_no = v_so.invoice_no WHERE account_customer = ?';
        $binds = array($id);
        $query = $this->db->query($sql, $binds);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function view_invoice3($table,$id){
        $this->db->where($id);
        $query = $this->db->get($table);
        $data = array();
        if($query !== FALSE && $query->num_rows() > 0){
            $data = $query->result_array();
        }

        return $data;
    }

    public function view_invoice4(){
        $username = $this->session->userdata('username');
        $account_customer = $this->session->userdata('account_customer');
        $q = $this->db->get_where('v_so', array('account_customer' => $account_customer));
        $data = array();
        if($q !== FALSE && $q->num_rows() > 0){
            $data = $q->result_array();
        }

        return $data;
    }

    public function view_invoice5($id){
        $this->db->select('*');
        $this->db->from('v_so');
        $this->db->where('account_customer',$id);
        return $this->db->get()->result_array();
    }

}
