<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function topProducts($user_id = NULL) {
        $m = date('Y-m');
        if(!$this->Admin) {
            $user_id = $this->session->userdata('user_id');
        }
        $this->db->select($this->db->dbprefix('products').".code as product_code, ".$this->db->dbprefix('products').".name as product_name, sum(".$this->db->dbprefix('sale_items').".quantity) as quantity")
        ->join('products', 'products.id=sale_items.product_id', 'left')
        ->join('sales', 'sales.id=sale_items.sale_id', 'left')
        ->order_by("sum(".$this->db->dbprefix('sale_items').".quantity)", 'desc')
        ->group_by('sale_items.product_id')
        ->limit(10)
        ->like("{$this->db->dbprefix('sales')}.date", $m, 'both');
        if($user_id) {
            $this->db->where('created_by', $user_id);
        }
        if ($this->session->userdata('store_id')) {
            $this->db->where('store_id', $this->session->userdata('store_id'));
        }
        $q = $this->db->get('sale_items');
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function getChartData($user_id = NULL) {
        if(!$this->Admin) {
            $user_id = $this->session->userdata('user_id');
        }
        if ($this->db->dbdriver == 'sqlite3') {
            $this->db->select("strftime('%Y-%m', date) as month, SUM(total) as total, SUM(total_tax) as tax, SUM(total_discount) as discount")
            ->where("date >= datetime('now','-6 month')", NULL, FALSE)
            // ->order_by("strftime('%Y-%m', date)", 'asc')
            ->group_by("strftime('%Y-%m', date)");
        } else {
            $this->db->select("date_format(date, '%Y-%m') as month, SUM(total) as total, SUM(total_tax) as tax, SUM(total_discount) as discount")
            ->where("date >= date_sub( now() , INTERVAL 6 MONTH)", NULL, FALSE)
            // ->order_by("date_format(date, '%Y-%m')", 'asc')
            ->group_by("date_format(date, '%Y-%m')");
        }
        if($user_id) {
            $this->db->where('created_by', $user_id);
        }
        if ($store_id = $this->session->userdata('store_id')) {
            $this->db->where('store_id', $store_id);
        }
        $q = $this->db->get('sales');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getUserGroups() {
        $this->db->order_by('id', 'desc');
        $q = $this->db->get("users_groups");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function userGroups() {
        $ugs = $this->getUserGroups();
        if ($ugs) {
            foreach ($ugs as $ug) {
                $this->db->update('users', array('group_id' => $ug->group_id), array('id' => $ug->user_id));
            }
            return true;
        }
        return false;
    }

    public function getAllProducts() {
        $q = $this->db->get('products');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function syncStoreQty() {
        $products = $this->getAllProducts();
        foreach ($products as $product) {
            $this->db->insert('product_store_qty', array('product_id' => $product->id, 'store_id' => 1, 'quantity' => $product->quantity));
        }
        $this->db->update('settings', array('version' => '4.0.6'), array('setting_id' => 1));
    }

    public function view_invoice() {
        // $this->db->select("invoice_no, invoice_date, due_date, currency, debit, total_debit, top, finance_receipt_no, finance_receipt_date, bank, credit, total_credit, cek, category");
        // $q = $this->db->get('v_so');
        $this->db->where('account_customer', $this->session->userdata('account_customer'));
        $q = $this->db->query("SELECT pfii.item_id, v_so.invoice_no, invoice_date, due_date, currency, debit, total_debit, top, finance_receipt_no, finance_receipt_date, bank, credit, total_credit, v_so.cek, category FROM v_so LEFT JOIN paste_finance_invoice_items pfii ON pfii.invoice_no = v_so.invoice_no");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

}
