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

    public function view_data(){
        return $this->db->query("SELECT 
    fi.invoice_no AS invoice_no,
    fi.invoice_date AS invoice_date,
    fi.reference_no AS delivery_order_no,
    fi.due_date AS due_date,
    fi.currency AS currency,
    fi.amount_total AS debit,
    fi.amount_total AS total_debit,
    fi.top AS top,
    '' AS sales_order_no,
    '' AS finance_receipt_no,
    '' AS finance_receipt_date,
    '' AS bank,
    '' AS credit,
    (IFNULL(fri.total_credit1, 0) + IFNULL(nr.total_credit2, 0)) AS total_credit,
    'SI' AS cek,
    '' AS category
                
                FROM paste_finance_invoice AS fi
                LEFT JOIN
                        (SELECT f1.invoice_no,SUM(fr1.amount) AS total_credit1
                        FROM paste_finance_receipt_items AS fr1
                        INNER JOIN paste_finance_receipt AS fr ON fr1.receipt_no=fr.receipt_no
                        INNER JOIN paste_finance_invoice AS f1 ON f1.invoice_no=fr1.invoice_no
                        
                        WHERE fr.status_id='3'
                        GROUP BY f1.invoice_no) AS fri ON fri.invoice_no=fi.invoice_no
                        
                LEFT JOIN
                        (SELECT f1.invoice_no,SUM(nru.amount) AS total_credit2
                        FROM paste_finance_sales_return_used AS nru
                        INNER JOIN paste_finance_sales_return AS nr ON nr.sales_return_no=nru.sales_return_no
                        INNER JOIN paste_finance_invoice AS f1 ON f1.invoice_no=nru.invoice_no
                        
                        WHERE nr.status_id='3' 
                        GROUP BY f1.invoice_no) AS nr ON nr.invoice_no=fi.invoice_no
                        
                WHERE fi.category='SALES' AND fi.status_id='3'
                
UNION ALL

SELECT  
    f.invoice_no AS invoice_no,
    f.invoice_date AS invoice_date,
    '' AS delivery_order_no,
    '' AS due_date,
    '' AS currency,
    '' AS debit,
    f.amount_total AS total_debit,
    '' AS top,
    '' AS sales_order_no,
    r.receipt_no AS finance_receipt_no,
    r.receipt_date AS finance_receipt_date,
    '' AS bank,
    SUM(ri.amount) AS credit,
    IFNULL(fri.total_credit, 0) AS total_credit,
    'SR' AS cek,
    'BANK' AS category
                
                FROM paste_finance_receipt_items AS ri
                INNER JOIN paste_finance_receipt AS r ON r.receipt_no=ri.receipt_no
                INNER JOIN paste_finance_invoice AS f ON f.invoice_no=ri.invoice_no
                LEFT JOIN
                        (SELECT f1.invoice_no,SUM(fr1.amount) AS total_credit
                        FROM paste_finance_receipt_items AS fr1
                        INNER JOIN paste_finance_receipt AS fr ON fr1.receipt_no=fr.receipt_no
                        INNER JOIN paste_finance_invoice AS f1 ON f1.invoice_no=fr1.invoice_no
                        
                        WHERE fr.status_id='3'
                        GROUP BY f1.invoice_no) AS fri ON fri.invoice_no=f.invoice_no
                
                WHERE r.status_id='3'
                AND f.category='SALES' AND f.status_id='3'
                GROUP BY r.receipt_no,f.invoice_no
                
UNION ALL

SELECT  
    f.invoice_no AS invoice_no,
    f.invoice_date AS invoice_date,
    '' AS delivery_order_no,
    '' AS due_date,
    '' AS currency,
    '' AS debit,
    f.amount_total AS total_debit,
    '' AS top,
    '' AS sales_order_no,
    r.receipt_no AS finance_receipt_no,
    r.receipt_date AS finance_receipt_date,
    '' AS bank,
    SUM(ri.amount) AS credit,
    IFNULL(fri.total_credit, 0) AS total_credit,
    'SR' AS cek,
    'CASH' AS category
                
                FROM paste_finance_receipt_items AS ri
                INNER JOIN paste_finance_receipt AS r ON r.receipt_no=ri.receipt_no
                INNER JOIN paste_finance_invoice AS f ON f.invoice_no=ri.invoice_no
                LEFT JOIN
                        (SELECT f1.invoice_no,SUM(fr1.amount) AS total_credit
                        FROM paste_finance_receipt_items AS fr1
                        INNER JOIN paste_finance_receipt AS fr ON fr1.receipt_no=fr.receipt_no
                        INNER JOIN paste_finance_invoice AS f1 ON f1.invoice_no=fr1.invoice_no
                        
                        WHERE fr.status_id='3'
                        GROUP BY f1.invoice_no) AS fri ON fri.invoice_no=f.invoice_no
                
                WHERE r.status_id='3'
                AND f.category='SALES' AND f.status_id='3'
                GROUP BY r.receipt_no,f.invoice_no
                
UNION ALL

SELECT  
    fn.invoice_no AS invoice_no,
    fn.invoice_date AS invoice_date,
    '' AS delivery_order_no,
    '' AS due_date,
    '' AS currency,
    '' AS debit,
    fn.amount_total AS total_debit,
    '' AS top,
    '' AS sales_order_no,
    nr.sales_return_no AS finance_receipt_no,
    nr.sales_return_date AS finance_receipt_date,
    '' AS bank,
    SUM(nru.amount) AS credit,
    IFNULL(nri.total_credit, 0) AS total_credit,
    'SR' AS cek,
    'RETURN' AS category
                
                FROM paste_finance_sales_return_used AS nru
                INNER JOIN paste_finance_sales_return AS nr ON nr.sales_return_no=nru.sales_return_no
                INNER JOIN paste_finance_invoice AS fn ON fn.invoice_no=nru.invoice_no
                LEFT JOIN
                        (SELECT fn.invoice_no,SUM(nru.amount) AS total_credit
                        FROM paste_finance_sales_return_used AS nru
                        INNER JOIN paste_finance_sales_return AS nr ON nr.sales_return_no=nru.sales_return_no
                        INNER JOIN paste_finance_invoice AS fn ON fn.invoice_no=nru.invoice_no
                        
                        WHERE nr.status_id='3'
                        GROUP BY fn.invoice_no) AS nri ON nri.invoice_no=fn.invoice_no
                
                WHERE   
                        nr.status_id='3' AND
                        fn.category='SALES' AND
                        fn.status_id='3'
                GROUP BY nr.sales_return_no,fn.invoice_no
                
                ORDER BY invoice_no,finance_receipt_no ASC");
    }

}
