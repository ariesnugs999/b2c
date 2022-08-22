<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Purchases_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function getProductByID($id) {
        $q = $this->db->get_where('products', array('id' => $id), 1);
        if( $q->num_rows() > 0 ) {
            return $q->row();
        }
        return FALSE;
    }

    public function getPurchaseByID($id) {
        $q = $this->db->get_where('purchases', array('id' => $id), 1);
        if( $q->num_rows() > 0 ) {
            return $q->row();
        }
        return FALSE;
    }

    public function getAllPurchaseItems($purchase_id) {
        $this->db->select('purchase_items.*, products.code as product_code, purchases.reference as purchase_no,purchases.date as date, products.name as product_name, purchases.total as total')
            ->join('products', 'products.id=purchase_items.product_id', 'left')
            ->join('purchases', 'purchases.id=purchase_items.purchase_id', 'left')
            ->group_by('purchase_items.id')
            ->order_by('id', 'asc');
        $q = $this->db->get_where('purchase_items', array('purchase_id' => $purchase_id));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function addPurchase($data, $items) {
        if ($this->db->insert('purchases', $data)) {
            $purchase_id = $this->db->insert_id();
            foreach ($items as $item) {
                $item['purchase_id'] = $purchase_id;
                if ($this->db->insert('purchase_items', $item)) {
                    if ($data['received']) {
                        $this->setStoreQuantity($item['product_id'], $data['store_id'], $item['quantity']);
                    }
                }
            }
            return true;
        }
        return false;
    }

    public function setStoreQuantity($product_id, $store_id, $quantity) {
        if ($store_qty = $this->getStoreQuantity($product_id, $store_id)) {
            $this->db->update('product_store_qty', array('quantity' => ($store_qty->quantity+$quantity)), array('product_id' => $product_id, 'store_id' => $store_id));
        } else {
            $this->db->insert('product_store_qty', array('product_id' => $product_id, 'store_id' => $store_id, 'quantity' => $quantity));
        }
    }

    public function getStoreQuantity($product_id, $store_id) {
        $q = $this->db->get_where('product_store_qty', array('product_id' => $product_id, 'store_id' => $store_id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function updatePurchase($id, $data = NULL, $items = array()) {
        $purchase = $this->getPurchaseByID($id);
        if ($purchase->received) {
            $oitems = $this->getAllPurchaseItems($id);
            foreach ($oitems as $oitem) {
                if ($product = $this->site->getProductByID($oitem->product_id)) {
                    $this->setStoreQuantity($oitem->product_id, $purchase->store_id, (0-$oitem->quantity));
                }
            }
        }
        if ($this->db->update('purchases', $data, array('id' => $id)) && $this->db->delete('purchase_items', array('purchase_id' => $id))) {
            foreach ($items as $item) {
                $item['purchase_id'] = $id;
                if ($this->db->insert('purchase_items', $item)) {
                    if ($data['received'] && $product = $this->site->getProductByID($item['product_id'])) {
                        $this->setStoreQuantity($item['product_id'], $purchase->store_id, $item['quantity']);
                    }
                }
            }
            return true;
        }
        return false;
    }

    public function deletePurchase($id) {
        $purchase = $this->getPurchaseByID($id);
        if ($purchase->received) {
            $oitems = $this->getAllPurchaseItems($id);
            foreach ($oitems as $oitem) {
                if ($product = $this->site->getProductByID($oitem->product_id)) {
                    $this->setStoreQuantity($oitem->product_id, $purchase->store_id, (0-$oitem->quantity));
                }
            }
        }
        if ($this->db->delete('purchases', array('id' => $id)) && $this->db->delete('purchase_items', array('purchase_id' => $id))) {
            return true;
        }
        return FALSE;
    }

    public function getProductNames($term, $limit = 10) {
        if ($this->db->dbdriver == 'sqlite3') {
            $this->db->where("type != 'combo' AND (name LIKE '%" . $term . "%' OR code LIKE '%" . $term . "%' OR  (name || ' (' || code || ')') LIKE '%" . $term . "%')");
        } else {
            $this->db->where("type != 'combo' AND (name LIKE '%" . $term . "%' OR code LIKE '%" . $term . "%' OR  concat(name, ' (', code, ')') LIKE '%" . $term . "%')");
        }
        $this->db->limit($limit);
        $q = $this->db->get('products');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getExpenseByID($id) {
        $q = $this->db->get_where('expenses', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function addExpense($data = array()) {
        if ($this->db->insert('expenses', $data)) {
            return true;
        }
        return false;
    }

    public function updateExpense($id, $data = array()) {
        if ($this->db->update('expenses', $data, array('id' => $id))) {
            return true;
        }
        return false;
    }

    public function deleteExpense($id) {
        if ($this->db->delete('expenses', array('id' => $id))) {
            return true;
        }
        return FALSE;
    }

    public function getPurchasePayments($purchase_id) {
        $this->db->order_by('id', 'asc');
        $q = $this->db->get_where('purchase_payments', array('purchase_id' => $purchase_id));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function getPaymentByID($id) {
        $q = $this->db->get_where('purchase_payments', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function addPayment($data = array()) {
        if ($this->db->insert('purchase_payments', $data)) {
            if ($data['paid_by'] == 'gift_card') {
                $gc = $this->site->getGiftCard($data['gc_no']);
                $this->db->update('gift_cards', array('balance' => ($gc->balance - $data['amount'])), array('card_no' => $data['gc_no']));
            }
            $this->syncPurchasePayments($data['purchase_id']);
            return true;
        }
        return false;
    }

    public function updatePayment($id, $data = array()) {
        $payment = $this->getPaymentByID($id);
        if ($payment->paid_by == 'gift_card') {
            $gc = $this->site->getGiftCard($payment->gc_no);
            $this->db->update('gift_cards', array('balance' => ($gc->balance + $payment->amount)), array('card_no' => $payment->gc_no));
        }
        if ($this->db->update('purchase_payments', $data, array('id' => $id))) {
            if ($data['paid_by'] == 'gift_card') {
                $gc = $this->site->getGiftCard($data['gc_no']);
                $this->db->update('gift_cards', array('balance' => ($gc->balance - $data['amount'])), array('card_no' => $data['gc_no']));
            }
            $this->syncPurchasePayments($data['purchase_id']);
            return true;
        }
        return false;
    }

    public function deletePayment($id) {
        $payment = $this->getPaymentByID($id);
        if ($payment->paid_by == 'gift_card') {
            $gc = $this->site->getGiftCard($payment->gc_no);
            $this->db->update('gift_cards', array('balance' => ($gc->balance + $payment->amount)), array('card_no' => $payment->gc_no));
        }
        if ($this->db->delete('purchase_payments', array('id' => $id))) {
            $this->syncPurchasePayments($payment->purchase_id);
            return true;
        }
        return FALSE;
    }

    public function syncPurchasePayments($id) {
        $purchase = $this->getPurchaseByID($id);
        $payments = $this->getPurchasePayments($id);
        $paid = 0;
        if($payments) {
            foreach ($payments as $payment) {
                $paid += $payment->amount;
            }
        }
        $status = $paid <= 0 ? 'unpaid' : ($sale->grand_total <= $paid ? 'paid' : 'partial');
        if ($this->db->update('purchases', array('paid' => $paid, 'status' => $status), array('id' => $id))) {
            return true;
        }

        return FALSE;
    }

    public function updateStatus($id, $status) {
        if ($this->db->update('purchases', array('status' => $status), array('id' => $id))) {
            return true;
        }
        return false;
    }

}
