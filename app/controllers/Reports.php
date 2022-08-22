<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller
{

    function __construct() {
        parent::__construct();


        if ( ! $this->loggedIn) {
            redirect('login');
        }

        if ( ! $this->Admin) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }

        $this->load->model('reports_model');
    }

    function daily_sales($year = NULL, $month = NULL) {
        if (!$year) { $year = date('Y'); }
        if (!$month) { $month = date('m'); }
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->lang->load('calendar');
        $config = array(
            'show_next_prev' => TRUE,
            'next_prev_url' => site_url('reports/daily_sales'),
            'month_type' => 'long',
            'day_type' => 'long'
            );
        $config['template'] = '

        {table_open}<table border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-calendar" style="min-width:522px;">{/table_open}

        {heading_row_start}<tr class="active">{/heading_row_start}

        {heading_previous_cell}<th><div class="text-center"><a href="{previous_url}">&lt;&lt;</div></a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}"><div class="text-center">{heading}</div></th>{/heading_title_cell}
        {heading_next_cell}<th><div class="text-center"><a href="{next_url}">&gt;&gt;</a></div></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td class="cl_equal"><div class="cl_wday">{week_day}</div></td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}

        {cal_cell_content}{day}<br>{content}{/cal_cell_content}
        {cal_cell_content_today}<div class="highlight">{day}</div>{content}{/cal_cell_content_today}

        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
        ';
        $this->load->library('calendar', $config);

        $sales = $this->reports_model->getDailySales($year, $month);

        if (!empty($sales)) {
            foreach ($sales as $sale) {
                $sale->date = intval($sale->date);
                $daily_sale[$sale->date] = "<table class='table table-condensed table-striped' style='margin-bottom:0;'><tr><td>".lang('total').
                "</td><td style='text-align:right;'>{$this->tec->formatMoney($sale->total)}</td></tr><tr><td><span style='font-weight:normal;'>".lang('product_tax')."<br>".lang('order_tax')."</span><br>".lang('tax').
                "</td><td style='text-align:right;'><span style='font-weight:normal;'>{$this->tec->formatMoney($sale->product_tax)}<br>{$this->tec->formatMoney($sale->order_tax)}</span><br>{$this->tec->formatMoney($sale->total_tax)}</td></tr><tr><td class='violet'>".lang('discount').
                "</td><td style='text-align:right;'>{$this->tec->formatMoney($sale->discount)}</td></tr><tr><td class='violet'>".lang('grand_total').
                "</td><td style='text-align:right;' class='violet'>{$this->tec->formatMoney($sale->grand_total)}</td></tr><tr><td class='green'>".lang('paid').
                "</td><td style='text-align:right;' class='green'>{$this->tec->formatMoney($sale->paid)}</td></tr><tr><td class='orange'>".lang('balance').
                "</td><td style='text-align:right;' class='orange'>{$this->tec->formatMoney(($sale->grand_total+$sale->rounding) - $sale->paid)}</td></tr></table>";
            }
        } else {
            $daily_sale = array();
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['calender'] = $this->calendar->generate($year, $month, $daily_sale);

        $start = $year.'-'.$month.'-01 00:00:00';
        $end = $year.'-'.$month.'-'.days_in_month($month, $year).' 23:59:59';
        $this->data['total_purchases'] = $this->reports_model->getTotalDailyPurchases();
        $this->data['total_sales'] = $this->reports_model->getTotalDailySales();
        $this->data['total_expenses'] = $this->reports_model->getTotalDailyExpenses();

        $this->data['page_title'] = $this->lang->line("daily_sales");
        $bc = array(array('link' => '#', 'page' => lang('reports')), array('link' => '#', 'page' => lang('daily_sales')));
        $meta = array('page_title' => lang('daily_sales'), 'bc' => $bc);
        $this->page_construct('reports/daily', $this->data, $meta);

    }

    function monthly_sales($year = NULL, $month = NULL) {
        if (!$year) { $year = date('Y'); }
        if (!$month) { $month = date('m'); }
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->lang->load('calendar');
        $config = array(
            'show_next_prev' => TRUE,
            'next_prev_url' => site_url('reports/monthly_sales'),
            'month_type' => 'long',
            'day_type' => 'long'
            );
        $config['template'] = '

        {table_open}<table border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-calendar" style="min-width:522px;">{/table_open}

        {heading_row_start}<tr class="active">{/heading_row_start}

        {heading_previous_cell}<th><div class="text-center"><a href="{previous_url}">&lt;&lt;</div></a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}"><div class="text-center">{heading}</div></th>{/heading_title_cell}
        {heading_next_cell}<th><div class="text-center"><a href="{next_url}">&gt;&gt;</a></div></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td class="cl_equal"><div class="cl_wday">{week_day}</div></td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}

        {cal_cell_content}{day}<br>{content}{/cal_cell_content}
        {cal_cell_content_today}<div class="highlight">{day}</div>{content}{/cal_cell_content_today}

        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
        ';
        $this->load->library('calendar', $config);

        $sales = $this->reports_model->getDailySales($year, $month);

        if (!empty($sales)) {
            foreach ($sales as $sale) {
                $sale->date = intval($sale->date);
                $daily_sale[$sale->date] = "<table class='table table-condensed table-striped' style='margin-bottom:0;'><tr><td>".lang('total').
                "</td><td style='text-align:right;'>{$this->tec->formatMoney($sale->total)}</td></tr><tr><td><span style='font-weight:normal;'>".lang('product_tax')."<br>".lang('order_tax')."</span><br>".lang('tax').
                "</td><td style='text-align:right;'><span style='font-weight:normal;'>{$this->tec->formatMoney($sale->product_tax)}<br>{$this->tec->formatMoney($sale->order_tax)}</span><br>{$this->tec->formatMoney($sale->total_tax)}</td></tr><tr><td class='violet'>".lang('discount').
                "</td><td style='text-align:right;'>{$this->tec->formatMoney($sale->discount)}</td></tr><tr><td class='violet'>".lang('grand_total').
                "</td><td style='text-align:right;' class='violet'>{$this->tec->formatMoney($sale->grand_total)}</td></tr><tr><td class='green'>".lang('paid').
                "</td><td style='text-align:right;' class='green'>{$this->tec->formatMoney($sale->paid)}</td></tr><tr><td class='orange'>".lang('balance').
                "</td><td style='text-align:right;' class='orange'>{$this->tec->formatMoney(($sale->grand_total+$sale->rounding) - $sale->paid)}</td></tr></table>";
            }
        } else {
            $daily_sale = array();
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['calender'] = $this->calendar->generate($year, $month, $daily_sale);

        $start = $year.'-'.$month.'-01 00:00:00';
        $end = $year.'-'.$month.'-'.days_in_month($month, $year).' 23:59:59';
        $this->data['total_purchases'] = $this->reports_model->getTotalPurchases($start, $end);
        $this->data['total_sales'] = $this->reports_model->getTotalSales($start, $end);
        $this->data['total_expenses'] = $this->reports_model->getTotalExpenses($start, $end);

        $this->data['page_title'] = $this->lang->line("monthly_sales");
        $bc = array(array('link' => '#', 'page' => lang('reports')), array('link' => '#', 'page' => lang('monthly_sales')));
        $meta = array('page_title' => lang('monthly_sales'), 'bc' => $bc);
        $this->page_construct('reports/monthly', $this->data, $meta);

    }

    // Harusnya Penjualan Bulanan / monthly_sales
    // function daily_sales($year = NULL, $month = NULL) {
    //     if (!$year) { $year = date('Y'); }
    //     if (!$month) { $month = date('m'); }
    //     $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
    //     $this->lang->load('calendar');
    //     $config = array(
    //         'show_next_prev' => TRUE,
    //         'next_prev_url' => site_url('reports/daily_sales'),
    //         'month_type' => 'long',
    //         'day_type' => 'long'
    //         );
    //     $config['template'] = '

    //     {table_open}<table border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-calendar" style="min-width:522px;">{/table_open}

    //     {heading_row_start}<tr class="active">{/heading_row_start}

    //     {heading_previous_cell}<th><div class="text-center"><a href="{previous_url}">&lt;&lt;</div></a></th>{/heading_previous_cell}
    //     {heading_title_cell}<th colspan="{colspan}"><div class="text-center">{heading}</div></th>{/heading_title_cell}
    //     {heading_next_cell}<th><div class="text-center"><a href="{next_url}">&gt;&gt;</a></div></th>{/heading_next_cell}

    //     {heading_row_end}</tr>{/heading_row_end}

    //     {week_row_start}<tr>{/week_row_start}
    //     {week_day_cell}<td class="cl_equal"><div class="cl_wday">{week_day}</div></td>{/week_day_cell}
    //     {week_row_end}</tr>{/week_row_end}

    //     {cal_row_start}<tr>{/cal_row_start}
    //     {cal_cell_start}<td>{/cal_cell_start}

    //     {cal_cell_content}{day}<br>{content}{/cal_cell_content}
    //     {cal_cell_content_today}<div class="highlight">{day}</div>{content}{/cal_cell_content_today}

    //     {cal_cell_no_content}{day}{/cal_cell_no_content}
    //     {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

    //     {cal_cell_blank}&nbsp;{/cal_cell_blank}

    //     {cal_cell_end}</td>{/cal_cell_end}
    //     {cal_row_end}</tr>{/cal_row_end}

    //     {table_close}</table>{/table_close}
    //     ';
    //     $this->load->library('calendar', $config);

    //     $sales = $this->reports_model->getDailySales($year, $month);

    //     if (!empty($sales)) {
    //         foreach ($sales as $sale) {
    //             $sale->date = intval($sale->date);
    //             $daily_sale[$sale->date] = "<table class='table table-condensed table-striped' style='margin-bottom:0;'><tr><td>".lang('total').
    //             "</td><td style='text-align:right;'>{$this->tec->formatMoney($sale->total)}</td></tr><tr><td><span style='font-weight:normal;'>".lang('product_tax')."<br>".lang('order_tax')."</span><br>".lang('tax').
    //             "</td><td style='text-align:right;'><span style='font-weight:normal;'>{$this->tec->formatMoney($sale->product_tax)}<br>{$this->tec->formatMoney($sale->order_tax)}</span><br>{$this->tec->formatMoney($sale->total_tax)}</td></tr><tr><td class='violet'>".lang('discount').
    //             "</td><td style='text-align:right;'>{$this->tec->formatMoney($sale->discount)}</td></tr><tr><td class='violet'>".lang('grand_total').
    //             "</td><td style='text-align:right;' class='violet'>{$this->tec->formatMoney($sale->grand_total)}</td></tr><tr><td class='green'>".lang('paid').
    //             "</td><td style='text-align:right;' class='green'>{$this->tec->formatMoney($sale->paid)}</td></tr><tr><td class='orange'>".lang('balance').
    //             "</td><td style='text-align:right;' class='orange'>{$this->tec->formatMoney(($sale->grand_total+$sale->rounding) - $sale->paid)}</td></tr></table>";
    //         }
    //     } else {
    //         $daily_sale = array();
    //     }

    //     $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
    //     $this->data['calender'] = $this->calendar->generate($year, $month, $daily_sale);

    //     $start = $year.'-'.$month.'-01 00:00:00';
    //     $end = $year.'-'.$month.'-'.days_in_month($month, $year).' 23:59:59';
    //     $this->data['total_purchases'] = $this->reports_model->getTotalPurchases($start, $end);
    //     $this->data['total_sales'] = $this->reports_model->getTotalSales($start, $end);
    //     $this->data['total_expenses'] = $this->reports_model->getTotalExpenses($start, $end);

    //     $this->data['page_title'] = $this->lang->line("daily_sales");
    //     $bc = array(array('link' => '#', 'page' => lang('reports')), array('link' => '#', 'page' => lang('daily_sales')));
    //     $meta = array('page_title' => lang('daily_sales'), 'bc' => $bc);
    //     $this->page_construct('reports/daily', $this->data, $meta);

    // }



    // Harusnya Penjualan Tahunan / yearly_sales
    // function monthly_sales($year = NULL) {
    //     if(!$year) { $year = date('Y'); }
    //     $this->load->language('calendar');
    //     $this->lang->load('calendar');
    //     $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
    //     $start = $year.'-01-01 00:00:00';
    //     $end = $year.'-12-31 23:59:59';
    //     $this->data['total_purchases'] = $this->reports_model->getTotalPurchases($start, $end);
    //     $this->data['total_sales'] = $this->reports_model->getTotalSales($start, $end);
    //     $this->data['total_expenses'] = $this->reports_model->getTotalExpenses($start, $end);
    //     $this->data['year'] = $year;
    //     $this->data['sales'] = $this->reports_model->getMonthlySales($year);
    //     $this->data['page_title'] = $this->lang->line("monthly_sales");
    //     $bc = array(array('link' => '#', 'page' => lang('reports')), array('link' => '#', 'page' => lang('monthly_sales')));
    //     $meta = array('page_title' => lang('monthly_sales'), 'bc' => $bc);
    //     $this->page_construct('reports/monthly', $this->data, $meta);
    // }

    function view_purchase($sale_id = NULL, $noprint = NULL) {
        if($this->input->get('id')){ $sale_id = $this->input->get('id'); }
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['message'] = $this->session->flashdata('message');
        $inv = $this->pos_model->getSaleByID($sale_id);
        if ( ! $this->session->userdata('store_id')) {
            $this->session->set_flashdata('warning', lang("please_select_store"));
            redirect('stores');
        } elseif ($this->session->userdata('store_id') != $inv->store_id) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('welcome');
        }
        $this->tec->view_rights($inv->created_by);
        $this->load->helper('text');
        $this->data['rows'] = $this->pos_model->getAllSaleItems($sale_id);
        $this->data['customer'] = $this->pos_model->getCustomerByID($inv->customer_id);
        $this->data['store'] = $this->site->getStoreByID($inv->store_id);
        $this->data['inv'] = $inv;
        $this->data['sid'] = $sale_id;
        $this->data['noprint'] = $noprint;
        $this->data['modal'] = $noprint ? true : false;
        $this->data['payments'] = $this->pos_model->getAllSalePayments($sale_id);
        $this->data['created_by'] = $this->site->getUser($inv->created_by);
        $this->data['printer'] = $this->site->getPrinterByID($this->Settings->printer);
        $this->data['store'] = $this->site->getStoreByID($inv->store_id);
        $this->data['page_title'] = lang("invoice");
        $this->load->view($this->theme.'pos/'.($this->Settings->print_img ? 'eview' : 'view'), $this->data);

    }

    function index() {
        if ($this->input->post('customer')) {
            $start_date = $this->input->post('start_date') ? $this->input->post('start_date') : NULL;
            $end_date = $this->input->post('end_date') ? $this->input->post('end_date') : NULL;
            $user = $this->input->post('user') ? $this->input->post('user') : NULL;
            $this->data['total_sales'] = $this->reports_model->getTotalCustomerSales($this->input->post('customer'), $user, $start_date, $end_date);
        }
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['customers'] = $this->reports_model->getAllCustomers();
        $this->data['users'] = $this->reports_model->getAllStaff();
        $this->data['page_title'] = $this->lang->line("sales_report");
        $bc = array(array('link' => '#', 'page' => lang('reports')), array('link' => '#', 'page' => lang('sales_report')));
        $meta = array('page_title' => lang('sales_report'), 'bc' => $bc);
        $this->page_construct('reports/sales', $this->data, $meta);
    }

    function get_sales() {
        $customer = $this->input->get('customer') ? $this->input->get('customer') : NULL;
        $start_date = $this->input->get('start_date') ? $this->input->get('start_date') : NULL;
        $end_date = $this->input->get('end_date') ? $this->input->get('end_date') : NULL;
        $user = $this->input->get('user') ? $this->input->get('user') : NULL;

        $this->load->library('datatables');
        $this->datatables
        ->select("id, date, customer_name, total, total_tax, total_discount, grand_total, paid, (grand_total-paid) as balance, status")
        ->from('sales');
        if ($this->session->userdata('store_id')) {
            $this->datatables->where('store_id', $this->session->userdata('store_id'));
        }
        $this->datatables->unset_column('id');
        if($customer) { $this->datatables->where('customer_id', $customer); }
        if($user) { $this->datatables->where('created_by', $user); }
        if($start_date) { $this->datatables->where('date >=', $start_date); }
        if($end_date) { $this->datatables->where('date <=', $end_date); }

        echo $this->datatables->generate();
    }

    function products() {
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['products'] = $this->reports_model->getAllProducts();
        $this->data['page_title'] = $this->lang->line("products_report");
        $this->data['page_title'] = $this->lang->line("products_report");
        $bc = array(array('link' => '#', 'page' => lang('reports')), array('link' => '#', 'page' => lang('products_report')));
        $meta = array('page_title' => lang('products_report'), 'bc' => $bc);
        $this->page_construct('reports/products', $this->data, $meta);
    }

    // function profit_products() {
    //     $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
    //     $this->data['products'] = $this->reports_model->getAllProducts();
    //     $this->data['page_title'] = $this->lang->line("product_profit_report");
    //     $this->data['page_title'] = $this->lang->line("product_profit_report");
    //     $bc = array(array('link' => '#', 'page' => lang('reports')), array('link' => '#', 'page' => lang('product_profit_report')));
    //     $meta = array('page_title' => lang('product_profit_report'), 'bc' => $bc);
    //     $this->page_construct('reports/products', $this->data, $meta);
    // }

    function get_alerts2() {
        $this->load->library('datatables');
        $this->datatables->select($this->db->dbprefix('products').".id as id, ".$this->db->dbprefix('products').".image as image, ".$this->db->dbprefix('products').".code as code, ".$this->db->dbprefix('products').".name as pname, type, ".$this->db->dbprefix('categories').".name as cname, (CASE WHEN psq.quantity IS NULL THEN 0 ELSE psq.quantity END) as quantity, alert_quantity, tax, tax_method, cost, (CASE WHEN psq.price > 0 THEN psq.price ELSE {$this->db->dbprefix('products')}.price END) as price", FALSE)
        ->from('products')
        ->join('categories', 'categories.id=products.category_id')
        ->join("( SELECT * from {$this->db->dbprefix('product_store_qty')} WHERE store_id = {$this->session->userdata('store_id')}) psq", 'products.id=psq.product_id', 'left')
        ->where("(CASE WHEN psq.quantity IS NULL THEN 0 ELSE psq.quantity END) < {$this->db->dbprefix('products')}.alert_quantity", NULL, FALSE)
        ->group_by('products.id');
        $this->datatables->add_column("Actions", "<div class='text-center'><a href='#' class='btn btn-xs btn-primary ap tip' data-id='$1' title='".lang('add_to_purcahse_order')."'><i class='fa fa-plus'></i></a></div>", "id");
        // $this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

    function get_products() {
      $product = $this->input->get('product') ? $this->input->get('product') : NULL;
        $start_date = $this->input->get('start_date') ? $this->input->get('start_date') : NULL;
        $end_date = $this->input->get('end_date') ? $this->input->get('end_date') : NULL;
        //COALESCE(sum(".$this->db->dbprefix('sale_items').".quantity)*".$this->db->dbprefix('products').".cost, 0) as cost,
        $this->load->library('datatables');
        $avg = "(SELECT SUM(".$this->db->dbprefix('purchase_items').".subtotal) / SUM(".$this->db->dbprefix('purchase_items').".quantity) AS avg_purchase_price FROM ".$this->db->dbprefix('purchase_items')." GROUP BY ".$this->db->dbprefix('purchase_items').".product_id) AS avg";

        $this->datatables
        ->select($this->db->dbprefix('products').".id as id, ".$this->db->dbprefix('products').".name, ".$this->db->dbprefix('products').".code,
        sum(".$this->db->dbprefix('purchase_items').".subtotal) as total_pembelian,
        sum(si.quantity) as sold,
        sum(si.subtotal) as income,
        ".$this->db->dbprefix('product_store_qty').".quantity as sisa,
        sum(".$this->db->dbprefix('purchase_items').".quantity) as purchase,
        ROUND(COALESCE(((sum(si.subtotal) * ".$this->db->dbprefix('products').".tax)/100), 0), 2) as tax, 
        coalesce(sum(".$this->db->dbprefix('purchase_items').".subtotal) / sum(".$this->db->dbprefix('purchase_items').".quantity),0) AS avg_purchase_price,
        jpsi.tot_profit_items", FALSE)

        ->from('products')
        ->join('product_store_qty', 'product_store_qty.product_id=products.id', 'left')
        ->join('purchase_items', 'purchase_items.product_id=product_store_qty.product_id', 'left')
        ->join('purchases', 'purchases.id=purchase_items.purchase_id', 'left')
        ->join('sale_items si', 'si.product_id=product_store_qty.product_id', 'left')
        // ->join('v_sale_items_products vsip', 'vsip.product_id=product_store_qty.product_id', 'left')
        ->join('sales', 'sales.id=si.sale_id', 'left')
        ->join('v_profit_sale_items jpsi', 'products.id=jpsi.product_id', 'left');
        // ->join($avg, 'avg.product_id=product_store_qty.product_id', 'left');
        if ($this->session->userdata('store_id')) {
            $this->datatables->where('product_store_qty.store_id', $this->session->userdata('store_id'));
        }
        $this->datatables->group_by('products.id');
        $this->db->order_by('products.name');

        if($product) { $this->datatables->where('purchase_items.product_id', $product);
                        $this->datatables->where('si.product_id', $product); }
        if($start_date) { $this->datatables->where('purchases.date >=', $start_date);
                        $this->datatables->where('sales.date >=', $start_date); }
        if($end_date) { $this->datatables->where('purchases.date <=', $end_date);
                        $this->datatables->where('sales.date <=', $end_date); }
        echo $this->datatables->generate();
    }

    // function get_profit_products() {
    //   $product = $this->input->get('product') ? $this->input->get('product') : NULL;
    //     $start_date = $this->input->get('start_date') ? $this->input->get('start_date') : NULL;
    //     $end_date = $this->input->get('end_date') ? $this->input->get('end_date') : NULL;
    //     //COALESCE(sum(".$this->db->dbprefix('sale_items').".quantity)*".$this->db->dbprefix('products').".cost, 0) as cost,
    //     $this->load->library('datatables');
    //     $avg = "(SELECT SUM(".$this->db->dbprefix('purchase_items').".subtotal) / SUM(".$this->db->dbprefix('purchase_items').".quantity) AS avg_purchase_price FROM ".$this->db->dbprefix('purchase_items')." GROUP BY ".$this->db->dbprefix('purchase_items').".product_id) AS avg";

    //     $this->datatables
    //     ->select($this->db->dbprefix('products').".id as id, ".$this->db->dbprefix('products').".name, ".$this->db->dbprefix('products').".code,
    //     sum(".$this->db->dbprefix('purchase_items').".subtotal) as total_pembelian,
    //     vsip.sold,
    //     vsip.grandtotal as income,
    //     ".$this->db->dbprefix('product_store_qty').".quantity as sisa,
    //     sum(".$this->db->dbprefix('purchase_items').".quantity) as purchase,
    //     ROUND(COALESCE(((vsip.grandtotal * ".$this->db->dbprefix('products').".tax)/100), 0), 2) as tax, 
    //     coalesce(sum(".$this->db->dbprefix('purchase_items').".subtotal) / sum(".$this->db->dbprefix('purchase_items').".quantity),0) AS avg_purchase_price,
    //     jpsi.tot_profit_items", FALSE)

    //     ->from('products')
    //     ->join('product_store_qty', 'product_store_qty.product_id=products.id', 'left')
    //     ->join('purchase_items', 'purchase_items.product_id=product_store_qty.product_id', 'left')
    //     ->join('purchases', 'purchases.id=purchase_items.purchase_id', 'left')
    //     // ->join('sale_items si', 'si.product_id=product_store_qty.product_id', 'left')
    //     ->join('v_sale_items_products vsip', 'vsip.product_id=product_store_qty.product_id', 'left')
    //     ->join('sales', 'sales.id=vsip.sale_id', 'left')
    //     ->join('v_profit_sale_items jpsi', 'products.id=jpsi.product_id', 'left');
    //     // ->join($avg, 'avg.product_id=product_store_qty.product_id', 'left');
    //     if ($this->session->userdata('store_id')) {
    //         $this->datatables->where('product_store_qty.store_id', $this->session->userdata('store_id'));
    //     }
    //     $this->datatables->group_by('products.id');
    //     $this->db->order_by('products.name');

    //     if($product) { $this->datatables->where('purchase_items.product_id', $product);
    //                     $this->datatables->where('vsip.product_id', $product); }
    //     if($start_date) { $this->datatables->where('purchases.date >=', $start_date);
    //                     $this->datatables->where('vsip.date >=', $start_date); }
    //     if($end_date) { $this->datatables->where('purchases.date <=', $end_date);
    //                     $this->datatables->where('vsip.date <=', $end_date); }
    //     echo $this->datatables->generate();
    // }
    
    function profit( $income, $cost, $tax) {
        return floatval($income)." - ".floatval($cost)." - ".floatval($tax);
    }

    function top_products() {
        $this->data['topProducts'] = $this->reports_model->topProducts();
        $this->data['topProducts1'] = $this->reports_model->topProducts1();
        $this->data['topProducts3'] = $this->reports_model->topProducts3();
        $this->data['topProducts12'] = $this->reports_model->topProducts12();
        $this->data['page_title'] = $this->lang->line("top_products");
        $bc = array(array('link' => '#', 'page' => lang('reports')), array('link' => '#', 'page' => lang('top_products')));
        $meta = array('page_title' => lang('top_products'), 'bc' => $bc);
        $this->page_construct('reports/top', $this->data, $meta);
    }

    function registers() {
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['users'] = $this->reports_model->getAllStaff();
        $bc = array(array('link' => '#', 'page' => lang('reports')), array('link' => '#', 'page' => lang('registers_report')));
        $meta = array('page_title' => lang('registers_report'), 'bc' => $bc);
        $this->page_construct('reports/registers', $this->data, $meta);
    }

    function get_register_logs() {
        $user = $this->input->get('user') ? $this->input->get('user') : NULL;
        $start_date = $this->input->get('start_date') ? $this->input->get('start_date') : NULL;
        $end_date = $this->input->get('end_date') ? $this->input->get('end_date') : NULL;

        $this->load->library('datatables');
        if ($this->db->dbdriver == 'sqlite3') {
            $this->datatables->select("{$this->db->dbprefix('registers')}.id as id, date, closed_at, ({$this->db->dbprefix('users')}.first_name || ' ' || {$this->db->dbprefix('users')}.last_name || '<br>' || {$this->db->dbprefix('users')}.email) as user, cash_in_hand, (total_cc_slips || ' (' || total_cc_slips_submitted || ')') as cc_slips, (total_cheques || ' (' || total_cheques_submitted || ')') as total_cheques, (total_cash || ' (' || total_cash_submitted || ')') as total_cash, note", FALSE);
        } else {
            $this->datatables->select("{$this->db->dbprefix('registers')}.id as id, date, closed_at, CONCAT(" . $this->db->dbprefix('users') . ".first_name, ' ', " . $this->db->dbprefix('users') . ".last_name, '<br>', " . $this->db->dbprefix('users') . ".email) as user, cash_in_hand, CONCAT(total_cc_slips, ' (', total_cc_slips_submitted, ')') as cc_slips, CONCAT(total_cheques, ' (', total_cheques_submitted, ')') as total_cheques, CONCAT(total_cash, ' (', total_cash_submitted, ')') as total_cash, note", FALSE);
        }
        $this->datatables->from("registers")
        ->join('users', 'users.id=registers.user_id', 'left');

        if ($user) {
            $this->datatables->where('registers.user_id', $user);
        }
        if ($start_date) {
            $this->datatables->where('date BETWEEN "' . $start_date . '" and "' . $end_date . '"');
        }
        if ($this->session->userdata('store_id')) {
            $this->datatables->where('registers.store_id', $this->session->userdata('store_id'));
        }

        echo $this->datatables->generate();


    }

    function payments() {
        if ($this->input->post('customer')) {
            $start_date = $this->input->post('start_date') ? $this->input->post('start_date') : NULL;
            $end_date = $this->input->post('end_date') ? $this->input->post('end_date') : NULL;
            $user = $this->input->post('user') ? $this->input->post('user') : NULL;
            $this->data['total_sales'] = $this->reports_model->getTotalCustomerSales($this->input->post('customer'), $user, $start_date, $end_date);
        }
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['users'] = $this->reports_model->getAllStaff();
        $this->data['customers'] = $this->reports_model->getAllCustomers();
        $bc = array(array('link' => '#', 'page' => lang('reports')), array('link' => '#', 'page' => lang('payments_report')));
        $meta = array('page_title' => lang('payments_report'), 'bc' => $bc);
        $this->page_construct('reports/payments', $this->data, $meta);
    }

    function get_payments() {
        $user = $this->input->get('user') ? $this->input->get('user') : NULL;
        $ref = $this->input->get('payment_ref') ? $this->input->get('payment_ref') : NULL;
        $sale_id = $this->input->get('sale_no') ? $this->input->get('sale_no') : NULL;
        $customer = $this->input->get('customer') ? $this->input->get('customer') : NULL;
        $paid_by = $this->input->get('paid_by') ? $this->input->get('paid_by') : NULL;
        $start_date = $this->input->get('start_date') ? $this->input->get('start_date') : NULL;
        $end_date = $this->input->get('end_date') ? $this->input->get('end_date') : NULL;

        $this->load->library('datatables');
        $this->datatables
        ->select("{$this->db->dbprefix('payments')}.id as id, {$this->db->dbprefix('payments')}.date, {$this->db->dbprefix('payments')}.reference as ref, {$this->db->dbprefix('sales')}.id as sale_no, paid_by, amount")
        ->from('payments')
        ->join('sales', 'payments.sale_id=sales.id', 'left')
        ->group_by('payments.id');

        if ($this->session->userdata('store_id')) {
            $this->datatables->where('payments.store_id', $this->session->userdata('store_id'));
        }
        if ($user) {
            $this->datatables->where('payments.created_by', $user);
        }
        if ($ref) {
            $this->datatables->where('payments.reference', $ref);
        }
        if ($paid_by) {
            $this->datatables->where('payments.paid_by', $paid_by);
        }
        if ($sale_id) {
            $this->datatables->where('sales.id', $sale_id);
        }
        if ($customer) {
            $this->datatables->where('sales.customer_id', $customer);
        }
        if ($start_date) {
            $this->datatables->where($this->db->dbprefix('payments').'.date BETWEEN "' . $start_date . '" and "' . $end_date . '"');
        }

        echo $this->datatables->generate();

    }

    function alerts() {
        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['page_title'] = lang('stock_alert');
        $bc = array(array('link' => '#', 'page' => lang('stock_alert')));
        $meta = array('page_title' => lang('stock_alert'), 'bc' => $bc);
        $this->page_construct('reports/alerts', $this->data, $meta);

    }

    function get_alerts() {
        $this->load->library('datatables');
        $this->datatables->select($this->db->dbprefix('products').".id as id, ".$this->db->dbprefix('products').".image as image, ".$this->db->dbprefix('products').".code as code, ".$this->db->dbprefix('products').".name as pname, type, ".$this->db->dbprefix('categories').".name as cname, (CASE WHEN psq.quantity IS NULL THEN 0 ELSE psq.quantity END) as quantity, alert_quantity, tax, tax_method, cost, (CASE WHEN psq.price > 0 THEN psq.price ELSE {$this->db->dbprefix('products')}.price END) as price", FALSE)
        ->from('products')
        ->join('categories', 'categories.id=products.category_id')
        ->join("( SELECT * from {$this->db->dbprefix('product_store_qty')} WHERE store_id = {$this->session->userdata('store_id')}) psq", 'products.id=psq.product_id', 'left')
        ->where("(CASE WHEN psq.quantity IS NULL THEN 0 ELSE psq.quantity END) < {$this->db->dbprefix('products')}.alert_quantity", NULL, FALSE)
        ->group_by('products.id');
        $this->datatables->add_column("Actions", "<div class='text-center'><a href='#' class='btn btn-xs btn-primary ap tip' data-id='$1' title='".lang('add_to_purcahse_order')."'><i class='fa fa-plus'></i></a></div>", "id");
        // $this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

    // Laporan Pembelian
    function purchase_report() {
        if ($this->input->post('supplier')) {
            $start_date = $this->input->post('start_date') ? $this->input->post('start_date') : NULL;
            $end_date = $this->input->post('end_date') ? $this->input->post('end_date') : NULL;
            $user = $this->input->post('user') ? $this->input->post('user') : NULL;
            $this->data['total_purchase'] = $this->reports_model->getTotalSupplierPurchases($this->input->post('supplier'), $user, $start_date, $end_date);
        }
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['suppliers'] = $this->reports_model->getAllSuppliers();
        $this->data['users'] = $this->reports_model->getAllStaff();
        $this->data['page_title'] = $this->lang->line("purchase_report");
        $bc = array(array('link' => '#', 'page' => lang('reports')), array('link' => '#', 'page' => lang('purchase_report')));
        $meta = array('page_title' => lang('purchase_report'), 'bc' => $bc);
        $this->page_construct('reports/purchases', $this->data, $meta);
    }

    function get_purchases() {
        $supplier = $this->input->get('supplier') ? $this->input->get('supplier') : NULL;
        $start_date = $this->input->get('start_date') ? $this->input->get('start_date') : NULL;
        $end_date = $this->input->get('end_date') ? $this->input->get('end_date') : NULL;
        $user = $this->input->get('user') ? $this->input->get('user') : NULL;

        $this->load->library('datatables');
        $this->datatables
        ->select("purchases.id, purchases.date, suppliers.name AS sname, purchases.total, purchases.total_tax, purchases.total_discount, purchases.grand_total, purchases.paid, purchases.status")
        ->from('purchases')
            ->join('suppliers', 'suppliers.id=purchases.supplier_id', 'left');
        if ($this->session->userdata('store_id')) {
            $this->datatables->where('purchases.store_id', $this->session->userdata('store_id'));
        }
       
        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'>
        <a href='".site_url('purchases/view/$1')."' title='" . lang("view_purchase") . "' class='tip btn btn-primary btn-xs' data-toggle='ajax'><i class='fa fa-shopping-cart '></i></a>
        </div></div>", "id");

        // $this->datatables->unset_column('id');
        if($supplier) { $this->datatables->where('purchases.supplier_id', $supplier); }
        if($user) { $this->datatables->where('purchases.created_by', $user); }
        if($start_date) { $this->datatables->where('date >=', $start_date); }
        if($end_date) { $this->datatables->where('date <=', $end_date); }

        echo $this->datatables->generate();
    }

    // function profitProducts(){
    //     // $this->loadViews("report_profit_products/bodyLaporanProfitProducts",$this->global,$data,"laporan/purchaseorder/footerProfitProducts");

    //     $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
    //     $this->data['products'] = $this->reports_model->getAllProducts();
    //     $this->data['page_title'] = $this->lang->line("product_profit_report");
    //     $bc = array(array('link' => '#', 'page' => lang('reports')), array('link' => '#', 'page' => lang('product_profit_report')));
    //     $meta = array('page_title' => lang('product_profit_report'), 'bc' => $bc);
    //     $this->page_construct('report_profit_products/bodyLaporanProfitProducts', $this->data, $meta);
    // }

    // function viewReportProfitProducts(){
    //     $dateStart = $_POST['dateStart'];
    //     $dateEnd = $_POST['dateEnd'];
    //     // $supplier = $_POST['supplier'];
    //     // $status = $_POST['status'];

    //     $this->data['viewReport'] = $this->reports_model->viewReportProfitProducts($dateStart,$dateEnd);
    //     $this->data['dateStart'] = date_format(date_create($dateStart),'d M Y');
    //     $this->data['dateEnd'] = date_format(date_create($dateEnd),'d M Y');
    //     $this->page_construct("report_profit_products/viewReportProfitProducts",$this->data);
    // }

    function profit_products() {
        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['products'] = $this->reports_model->getAllProducts();
        $this->data['page_title'] = $this->lang->line("products_report");
        $this->data['page_title'] = $this->lang->line("products_report");
        $bc = array(array('link' => '#', 'page' => lang('reports')), array('link' => '#', 'page' => lang('products_report')));
        $meta = array('page_title' => lang('products_report'), 'bc' => $bc);
        $this->page_construct('reports/profit_products2', $this->data, $meta);
    }

    function get_profit_products() {
        $product = $this->input->get('product') ? $this->input->get('product') : NULL;
        $start_date = $this->input->get('start_date') ? $this->input->get('start_date') : NULL;
        $end_date = $this->input->get('end_date') ? $this->input->get('end_date') : NULL;
        //COALESCE(sum(".$this->db->dbprefix('sale_items').".quantity)*".$this->db->dbprefix('products').".cost, 0) as cost,
        // $this->load->library('datatables');
        // $avg = "(SELECT SUM(".$this->db->dbprefix('purchase_items').".subtotal) / SUM(".$this->db->dbprefix('purchase_items').".quantity) AS avg_purchase_price FROM ".$this->db->dbprefix('purchase_items')." GROUP BY ".$this->db->dbprefix('purchase_items').".product_id) AS avg";

        // $this->datatables
        // ->select($this->db->dbprefix('products').".id as id, ".$this->db->dbprefix('products').".name, ".$this->db->dbprefix('products').".code,
        // sum(".$this->db->dbprefix('purchase_items').".subtotal) as total_pembelian,
        // sum(si.quantity) as sold,
        // sum(si.subtotal) as income,
        // ".$this->db->dbprefix('product_store_qty').".quantity as sisa,
        // sum(".$this->db->dbprefix('purchase_items').".quantity) as purchase,
        // ROUND(COALESCE(((sum(si.subtotal) * ".$this->db->dbprefix('products').".tax)/100), 0), 2) as tax, 
        // coalesce(sum(".$this->db->dbprefix('purchase_items').".subtotal) / sum(".$this->db->dbprefix('purchase_items').".quantity),0) AS avg_purchase_price,
        // jpsi.tot_profit_items", FALSE)

        // ->from('products')
        // ->join('product_store_qty', 'product_store_qty.product_id=products.id', 'left')
        // ->join('purchase_items', 'purchase_items.product_id=product_store_qty.product_id', 'left')
        // ->join('purchases', 'purchases.id=purchase_items.purchase_id', 'left')
        // ->join('sale_items si', 'si.product_id=product_store_qty.product_id', 'left')
        // // ->join('v_sale_items_products vsip', 'vsip.product_id=product_store_qty.product_id', 'left')
        // ->join('sales', 'sales.id=si.sale_id', 'left')
        // ->join('v_profit_sale_items jpsi', 'products.id=jpsi.product_id', 'left');
        // // ->join($avg, 'avg.product_id=product_store_qty.product_id', 'left');
        // if ($this->session->userdata('store_id')) {
        //     $this->datatables->where('product_store_qty.store_id', $this->session->userdata('store_id'));
        // }
        // $this->datatables->group_by('products.id');
        // $this->db->order_by('products.name');

        // if($product) { $this->datatables->where('purchase_items.product_id', $product);
        //                 $this->datatables->where('si.product_id', $product); }
        // if($start_date) { $this->datatables->where('purchases.date >=', $start_date);
        //                 $this->datatables->where('sales.date >=', $start_date); }
        // if($end_date) { $this->datatables->where('purchases.date <=', $end_date);
        //                 $this->datatables->where('sales.date <=', $end_date); }
        // echo $this->datatables->generate();

        $this->datatables->query("SELECT * FROM tec_products");

        echo $this->datatables->generate(); 
    }

}
