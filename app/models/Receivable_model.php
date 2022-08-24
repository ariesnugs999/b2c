<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Receivable_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function view_invoice($account_id = NULL) {
        if(!$this->Admin) {
            $account_id = $this->session->userdata('account_customer');
        }
        // $this->db->select("invoice_no, invoice_date, due_date, currency, debit, total_debit, top, finance_receipt_no, finance_receipt_date, bank, credit, total_credit, cek, category");
        // $q = $this->db->get('v_so');
        
        // $this->db->where('account_customer', $this->session->userdata('account_customer'));
        $q = $this->db->query("SELECT pfii.item_id, v_so.invoice_no, invoice_date, due_date, currency, debit, total_debit, top, finance_receipt_no, finance_receipt_date, bank, credit, total_credit, v_so.cek, category FROM v_so LEFT JOIN paste_finance_invoice_items pfii ON pfii.invoice_no = v_so.invoice_no");
        // $this->db->select("invoice_no, invoice_date, due_date, currency, debit, total_debit, top, finance_receipt_no, finance_receipt_date, bank, credit, total_credit, cek, category")
        // ->where('account_customer', $account_id);
        // $q = $this->db->get('v_so');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

}
