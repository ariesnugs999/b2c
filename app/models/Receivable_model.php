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
        // if(!$this->Admin) {
        //     $account_customer = $this->session->userdata('account_customer');
        // }

        $cust_id = $this->session->userdata('account_customer');
        // $this->db->select("invoice_no, invoice_date, due_date, currency, debit, total_debit, top, finance_receipt_no, finance_receipt_date, bank, credit, total_credit, cek, category");
        // $q = $this->db->get('v_so');
        
        // $this->db->where('account_customer', $this->session->userdata('account_customer'));
        $q = $this->db->query("SELECT pfii.item_id, v_so.invoice_no, invoice_date, due_date, currency, debit, total_debit, top, finance_receipt_no, finance_receipt_date, bank, credit, total_credit, v_so.cek, category  FROM v_so LEFT JOIN paste_finance_invoice_items pfii ON pfii.invoice_no = v_so.invoice_no where v_so.account_customer='$cust_id'");
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

    public function view_invoice_new($product_id, $account_customer = NULL) {
        if(!$account_customer) {
            $account_customer = $this->session->userdata('account_customer') ? $this->session->userdata('account_customer') : 1;
        }
        $q = $this->db->get_where(array('account_customer' => $account_customer), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getReceivableDetails($invoice_so) {
        // $this->db->order_by('id', 'asc');
        $q = $this->db->get_where('paste_finance_receipt', array('receipt_no' => $invoice_so));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function get_details_by_id($id)
    {
        $this->db->from('paste_finance_receipt');
        $this->db->where('receipt_no',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

}
