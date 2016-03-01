<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class invoice extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('common_model', 'obj_common', TRUE);
        $this->load->model('invoice_model', 'obj_invoice', TRUE);
        $this->load->model('client_model', 'obj_client', TRUE);
        $this->load->model('product_model', 'obj_product', TRUE);
        $this->load->model('brand_model', 'obj_brand', TRUE);
        $this->load->model('sales_representative_model', 'obj_sales_representative', TRUE);
        $this->max_size = 152048; //2MB
        $this->load->library('table');
        if ($this->session->userdata('ADMIN_NAME') == FALSE) {
           // redirect('/');
        }
    }

//    function index($row = 0) {
//        $limit = '2';
//        $this->load->library('pagination');
//        $config['base_url'] = site_url('invoice/index');
//        $config['full_tag_open'] = '<li>';
//        $config['full_tag_close'] = '</li>';
//        $config['uri_segment'] = 3;
//        $condition = array();
//        $config['total_rows'] = $this->obj_invoice->countrows($condition);
//        $config['per_page'] = $limit;
//        $this->pagination->initialize($config);
//        $data['links'] = $this->pagination->create_links();
//        $data['invoice'] = $this->obj_invoice->get_all_entries($row, $limit, $condition, 'invoice_created_date', 'asc');
//        $data['row'] = $row;
//        $data['page_active'] = 2;
//        $data['per_page'] = $limit;
//        $this->load->view('invoice/list', $data);
//    }
    function index($row = 0) {
        
        $this->session->unset_userdata('cart_brand_id');
        $limit = '2';
        $config['base_url'] = site_url('invoice/ajax_search_report_invoice');
        $config['full_tag_open'] = '<ul class="pagination custom-pagntion">';
        $config['full_tag_close'] = '</ul>';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_link'] = 'First';

        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['last_link'] = 'Last';

        $config['num_tag_open'] = '<li class="num_tag_open">';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="cur_tag_open">';
        $config['cur_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li class="pagnton-arow">';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '';

        $config['prev_tag_open'] = '<li class="pagnton-arow-left">';
        $config['prev_tag_close'] = '';
        $config['prev_link'] = '';
        $config['uri_segment'] = 3;
       
        if ($this->session->userdata('user_type') == 2) {
           
            $condition = array('users_id' => $this->session->userdata('users_id'));            
        } else {
            $condition = array();
        }
        $config['total_rows'] = $this->obj_invoice->count_rows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['invoice'] = $this->obj_invoice->get_all_data($row, $limit, $condition, 'invoice_orders.id', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $this->load->view('invoice/invoice_report_list', $data);
    }

    function ajax_search_report_invoice($row = 0) {
//        $family_id = $this->session->userdata('search_family'); 
        $this->session->unset_userdata('invoice_date_to');
        $this->session->unset_userdata('invoice_date_from');
        $this->session->unset_userdata('invoice_brand');
        $this->session->unset_userdata('invoice_user');
        $this->session->unset_userdata('invoice_client');
        $this->session->unset_userdata('invoice_orders_id');
        $condition = array();
        $user = $this->input->post('user');
        $client = $this->input->post('client');
        $brand = $this->input->post('brand');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $invoice_id = $this->input->post('invoice_id');
        // $from_date = strtotime($from_date . '00:00:00');
        // $to_date = strtotime($to_date . '23:59:59');
       if ($this->session->userdata('user_type') == 2) {
          
            $condition = array('users_id' => $this->session->userdata('users_id'));            
        } else {
            $condition = array();
        }
        $sess_data = array();
        if ($from_date && $to_date) {
            $condition = array('date <=' => $to_date,
                'date >= ' => $from_date);
            $sess_data = array('invoice_date_to' => $to_date,
                'invoice_date_from' => $from_date);
        }
//        if ($brand) {
//            $condition['brand_user_id'] = $brand;
//            $sess_data['invoice_brand'] = $brand;
//        }
        if ($user) {
            $condition['sales_representative_id'] = $user;
            $sess_data['invoice_user'] = $user;
        }
        if ($client) {
            $condition['client_id'] = $client;
            $sess_data['invoice_client'] = $client;
        }
        if ($invoice_id) {
            $condition_order = array('invoice_id' => $invoice_id);
            $order_id = $this->obj_common->get_field_data('invoice_orders', $condition_order, 'id');
            $condition['invoice_orders.id'] = $order_id;
            $sess_data['invoice_orders_id'] = $order_id;
        }

        if ($sess_data) {
            $this->session->set_userdata($sess_data);
        }
        $limit = '2';
        $config['base_url'] = site_url('invoice/ajax_pagination');
        $config['full_tag_open'] = '<ul class="pagination custom-pagntion">';
        $config['full_tag_close'] = '</ul>';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_link'] = 'First';

        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['last_link'] = 'Last';

        $config['num_tag_open'] = '<li class="num_tag_open">';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="cur_tag_open">';
        $config['cur_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li class="pagnton-arow">';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '';

        $config['prev_tag_open'] = '<li class="pagnton-arow-left">';
        $config['prev_tag_close'] = '';
        $config['prev_link'] = '';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->obj_invoice->count_rows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['invoice'] = $this->obj_invoice->get_all_data($row, $limit, $condition, 'invoice_orders.id', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $this->load->view('invoice/ajax_invoice_report', $data);
    }

    function ajax_pagination($row = 0) {
        $condition = array();
        $user = $this->session->userdata('invoice_user');
        $client = $this->session->userdata('invoice_client');
        $brand = $this->session->userdata('invoice_brand');
        $from_date = $this->session->userdata('invoice_from_date');
        $to_date = $this->session->userdata('invoice_to_date');
        $order_id = $this->session->userdata('invoice_orders_id');
        // $from_date = strtotime($from_date . '00:00:00');
        // $to_date = strtotime($to_date . '23:59:59');
       if ($this->session->userdata('user_type') == 2) {
       
            $condition = array('users_id' => $this->session->userdata('users_id'));            
        } else {
            $condition = array();
        }
        if ($from_date && $to_date) {
            $condition = array('invoice_date <=' => $to_date,
                'invoice_date >= ' => $from_date);
        }
//        if ($brand) {
//            $condition['brand_user_id'] = $brand;
//        }
        if ($user) {
            $condition['sales_representative_id'] = $user;
        }
        if ($client) {
            $condition['client_id'] = $client;
        }
        if ($order_id) {
            $condition['invoice_orders.id'] = $order_id;
            $sess_data['invoice_id'] = $order_id;
        }
        $limit = '2';
        $config['base_url'] = site_url('invoice/ajax_pagination');
        $config['full_tag_open'] = '<ul class="pagination custom-pagntion">';
        $config['full_tag_close'] = '</ul>';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_link'] = 'First';

        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['last_link'] = 'Last';

        $config['num_tag_open'] = '<li class="num_tag_open">';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="cur_tag_open">';
        $config['cur_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li class="pagnton-arow">';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '';

        $config['prev_tag_open'] = '<li class="pagnton-arow-left">';
        $config['prev_tag_close'] = '';
        $config['prev_link'] = '';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->obj_invoice->count_rows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['invoice'] = $this->obj_invoice->get_all_data($row, $limit, $condition, 'invoice_orders.id', 'asc');
        $data['row'] = $row;

        $data['per_page'] = $limit;
        $this->load->view('invoice/ajax_invoice_report', $data);
    }

    function add($row = 0) {
        // $this->session->unset_userdata('cart_brand_id');
        $limit = '2';
        $config['base_url'] = site_url('invoice/ajax_search_report_invoice/3');
        $config['full_tag_open'] = '<ul class="pagination custom-pagntion">';
        $config['full_tag_close'] = '</ul>';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_link'] = 'First';

        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['last_link'] = 'Last';

        $config['num_tag_open'] = '<li class="num_tag_open">';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="cur_tag_open">';
        $config['cur_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li class="pagnton-arow">';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '';

        $config['prev_tag_open'] = '<li class="pagnton-arow-left">';
        $config['prev_tag_close'] = '';
        $config['prev_link'] = '';
        $config['uri_segment'] = 3;
        $condition = array();
        $config['total_rows'] = $this->obj_invoice->count_rows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['invoice'] = $this->obj_invoice->get_all_data($row, $limit, $condition, 'invoice_orders.id', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $data['report_type'] = 3;
        $this->load->view('invoice/add', $data);
    }

    function add_product($brand_id) {
        $data = array();
        $data['brand_id'] = $brand_id;
        $sess_data = array('cart_brand_id' => $brand_id);
        $this->session->set_userdata($sess_data);
        $this->load->view('invoice/add_product', $data);
    }

    function model_report_list($order_url = '') {
        $data = array();
        $condition = array('order_url' => $order_url);
        // $id=$this->obj_common->get_field_data('invoice_orders',$condition,'id');
        // $condition = array('id' => $id);
        $data['invoice'] = $this->obj_invoice->get_all_invoice_data('', '', $condition);
        $this->load->view('invoice/model_report_list', $data);
    }

    function delete($order_url = '', $row = '') {
        // Delete Product image
        $condition = array('order_url' => $order_url);
        $id = $this->obj_common->get_field_data('invoice_orders', $condition, 'id');
        $this->obj_common->delete('invoice_orders', $condition);
        $condition = array('order_id' => $id);
        $this->obj_common->delete('invoice_order_items', $condition);
        redirect('invoice/index/' . $row);
    }

    function update_status() {
        $id = $this->input->post('id');
        $invoice_status = $this->input->post('invoice_status');
        $condition = array('id' => $id);
        $data_array = array('invoice_status' => $invoice_status);
        $this->obj_invoice->edit($condition, $data_array);
    }

    function view($invoice_url = '', $row = 0) {
        $limit = '3';
        $this->load->library('pagination');
        $condition = array('invoice_url' => $invoice_url);
        $data['invoice_document_name'] = $this->obj_invoice->get_field_data($condition, 'invoice_document_name');
        $id = $this->obj_invoice->get_field_data($condition, 'id');
        $config['base_url'] = site_url('invoice/view/' . $invoice_url);
        $config['full_tag_open'] = '<ul class="pagination custom-pagntion">';
        $config['full_tag_close'] = '</ul>';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_link'] = 'First';

        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['last_link'] = 'Last';

        $config['num_tag_open'] = '<li class="num_tag_open">';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="cur_tag_open">';
        $config['cur_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li class="pagnton-arow">';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '';

        $config['prev_tag_open'] = '<li class="pagnton-arow-left">';
        $config['prev_tag_close'] = '';
        $config['prev_link'] = '';
        $config['uri_segment'] = 4;
        $condition = array('orders.invoice_document_id' => $id);
        $config['total_rows'] = $this->obj_invoice->count_rows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['invoice'] = $this->obj_invoice->get_all_data($row, $limit, $condition, 'orders.id', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $this->load->view('invoice/view', $data);
    }

//    function report_client($row = 0) {
//
//        $this->session->unset_userdata('search_report_type');
//        $this->session->unset_userdata('search_report_name');
//        $limit = '2';
//        $config['base_url'] = site_url('invoice/ajax_search_report_invoice/3');
//        $config['full_tag_open'] = '<li>';
//        $config['full_tag_close'] = '</li>';
//        $config['uri_segment'] = 3;
//        $condition = array();
//        $config['total_rows'] = $this->obj_invoice->count_rows($condition);
//        $config['per_page'] = $limit;
//        $this->pagination->initialize($config);
//        $data['links'] = $this->pagination->create_links();
//        $data['invoice'] = $this->obj_invoice->get_all_data($row, $limit, $condition, 'orders.id', 'asc');
//        $data['row'] = $row;
//        $data['page_active'] = 2;
//        $data['per_page'] = $limit;
//        $data['report_type'] = 3;
//        $this->load->view('invoice/invoice_report', $data);
//    }
}
