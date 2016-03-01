<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class product extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('common_model', 'obj_common', TRUE);
        $this->load->model('product_model', 'obj_product', TRUE);
        $this->load->model('brand_model', 'obj_brand', TRUE);
        if ($this->session->userdata('ADMIN_NAME') == FALSE) {
            redirect('/');
        }
        if($this->session->userdata('user_type')=='2'){
                      redirect('/');
                  }
    }

    function index($row = 0) {

        $limit = '2';
        $this->load->library('pagination');
        $config['base_url'] = site_url('product/index');
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
        $config['total_rows'] = $this->obj_product->countrows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['product'] = $this->obj_product->get_all_entries($row, $limit, $condition, 'id', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $this->load->view('product/list', $data);
    }

    function ajax_search_product_name($row = 0) {

        $limit = 100;
        $search_product_name = $this->input->post('search_product_name');
        if ($search_product_name) {
            $data['row'] = $row;
            $condition = array('product_user_id' => $search_product_name);
            $data['product'] = $this->obj_product->get_all_ajax_search_product($row, $limit, $condition, 'id', 'asc');
        } else {
            $row = 0;
            $limit = '2';
            $this->load->library('pagination');
            $config['base_url'] = site_url('product/index');
            $config['full_tag_open'] = '<li>';
            $config['full_tag_close'] = '</li>';
            $config['uri_segment'] = 3;
            $condition = array();
            $config['total_rows'] = $this->obj_product->countrows($condition);
            $config['per_page'] = $limit;
            $this->pagination->initialize($config);
            $data['links'] = $this->pagination->create_links();
            $data['product'] = $this->obj_product->get_all_entries($row, $limit, $condition, 'id', 'asc');
            $data['row'] = $row;
            $data['page_active'] = 2;
            $data['per_page'] = $limit;
        }
        $this->load->view('product/ajax_list', $data);
    }

    function add() {

        $this->form_validation->set_rules('product_name', 'product Name', 'required|xss_clean|trim');
        $this->form_validation->set_rules('product_user_id', 'product Id', 'required|xss_clean|trim|is_unique[product.product_user_id]');
        $this->form_validation->set_rules('product_description', 'product Address', 'xss_clean|trim');
        $this->form_validation->set_rules('unit_price', 'Unit Price', 'xss_clean|trim');
        $this->form_validation->set_rules('um_id', 'Um Id', 'xss_clean|trim');
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $this->load->view('product/add', $data);
        } else {
//            $product_url = url_title(strtolower($this->input->post('product_name')));
//            $product_url = $this->obj_product->check_url_status($product_url);
            $datas = array(
                'product_name' => $this->input->post('product_name'),
                'product_description' => $this->input->post('product_description'),
                'product_user_id' => $this->input->post('product_user_id'),
                'product_created_date' => time(),
                'brand_id' => $this->input->post('brand_id'),
                'unit_price' => $this->input->post('unit_price'),
                'um_id' => $this->input->post('um_id'),
            );
            $this->obj_product->add($datas);
            redirect('product/index');
        }
    }

    function edit($id = '') {
        $data = array();
        $condition = array('id' => $id);
        $product_user_id = $this->obj_product->get_field_data($condition, 'product_user_id');
        if ($product_user_id == $this->input->post('product_user_id')) {
            $this->form_validation->set_rules('product_user_id', 'product Id', 'required|xss_clean|trim');
        } else {
            $this->form_validation->set_rules('product_user_id', 'product Id', 'required|xss_clean|trim|is_unique[product.product_user_id]');
        }
        $this->form_validation->set_rules('product_name', 'product Name', 'required|xss_clean|trim');
        $this->form_validation->set_rules('product_description', 'product Address', 'xss_clean|trim');
        if ($this->form_validation->run() == FALSE) {
            $condition = array('id' => $id);
            $product_data = $this->obj_product->get_all($condition);
            if ($product_data) {
                $data['product_data'] = $product_data;
            } else {
                redirect('product', 'refresh');
            }
            $data['id'] = $id;
            $data['product_data'] = $this->obj_product->get_all($condition);
            $this->load->view('product/edit', $data);
        } else {
            //image start
            $datas = array(
                'product_name' => $this->input->post('product_name'),
                'product_description' => $this->input->post('product_description'),
                'product_user_id' => $this->input->post('product_user_id'),
                'product_created_date' => time(),
                'brand_id' => $this->input->post('brand_id'),
                'unit_price' => $this->input->post('unit_price'),
                'um_id' => $this->input->post('um_id'),
            );
            $this->session->set_userdata(array('product_msg' => 'Update successfully'));
            $condition = array('id' => $id);
            $this->obj_product->edit($condition, $datas);
            redirect('product/edit/' . $id);
        }
    }

    function delete($id = '', $row = '') {
        // Delete Product image

        $condition = array('product_id' => $id);
        $total_count = $this->obj_common->countrows('order_items', $condition);
        if ($total_count == 0) {
            $condition = array('id' => $id);
            $this->obj_product->delete($condition);
            redirect('product/index/' . $row);
        } else {
            $this->session->set_flashdata('product_delete_message', "Can't Delete , Product  assigned to Report ");
            redirect('product/index/' . $row);
        }
    }

    function update_status() {
        $id = $this->input->post('id');
        $product_status = $this->input->post('product_status');
        $condition = array('id' => $id);
        $data_array = array('product_status' => $product_status);
        $this->obj_product->edit($condition, $data_array);
    }

}
