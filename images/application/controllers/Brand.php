<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class brand extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('common_model', 'obj_common', TRUE);
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
        $config['base_url'] = site_url('brand/index');
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
        $config['total_rows'] = $this->obj_brand->countrows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['brand'] = $this->obj_brand->get_all_entries($row, $limit, $condition, 'brand_display_order', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $this->load->view('brand/list', $data);
    }

    function ajax_search_brand_name($row = 0) {

        $limit = 100;
        $search_brand_name = $this->input->post('search_brand_name');
        if ($search_brand_name) {
            $data['row'] = $row;
            $condition = array('brand_user_id' => $search_brand_name);
            $data['brand'] = $this->obj_brand->get_all_ajax_search_brand($row, $limit, $condition, 'brand_display_order', 'asc');
        } else {
            $row = 0;
            $limit = '2';
            $this->load->library('pagination');
            $config['base_url'] = site_url('brand/index');
            $config['full_tag_open'] = '<ul class="pagination custom-pagntion">';
            $config['full_tag_close'] = '</ul>';

            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['first_url'] = 'First';

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
            $config['total_rows'] = $this->obj_brand->countrows($condition);
            $config['per_page'] = $limit;
            $this->pagination->initialize($config);
            $data['links'] = $this->pagination->create_links();
            $data['brand'] = $this->obj_brand->get_all_entries($row, $limit, $condition, 'brand_display_order', 'asc');
            $data['row'] = $row;
            $data['page_active'] = 2;
            $data['per_page'] = $limit;
        }
        $this->load->view('brand/ajax_list', $data);
    }

    function add() {

        $this->form_validation->set_rules('brand_name', 'brand Name', 'required|xss_clean|trim');
        $this->form_validation->set_rules('brand_id', 'brand Id', 'required|xss_clean|trim|is_unique[brand.brand_user_id]');
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $this->load->view('brand/add', $data);
        } else {
//            $brand_url = url_title(strtolower($this->input->post('brand_name')));
//            $brand_url = $this->obj_brand->check_url_status($brand_url);
            $datas = array(
                'brand_name' => $this->input->post('brand_name'),
                'brand_user_id' => $this->input->post('brand_id'),
                'brand_created_date' => time()
            );
            $this->obj_brand->add($datas);
            redirect('brand/index');
        }
    }

    function edit($id = '') {
        $data = array();
        $condition = array('id' => $id);
        $brand_user_id = $this->obj_brand->get_field_data($condition, 'brand_user_id');
        if ($brand_user_id == $this->input->post('brand_id')) {
            $this->form_validation->set_rules('brand_id', 'brand Id', 'required|xss_clean|trim');
        } else {
            $this->form_validation->set_rules('brand_id', 'brand Id', 'required|xss_clean|trim|is_unique[brand.brand_user_id]');
        }
        $this->form_validation->set_rules('brand_name', 'brand Name', 'required|xss_clean|trim');

        if ($this->form_validation->run() == FALSE) {
            $condition = array('id' => $id);
            $brand_data = $this->obj_brand->get_all($condition);
            if ($brand_data) {
                $data['brand_data'] = $brand_data;
            } else {
                redirect('brand', 'refresh');
            }
            $data['id'] = $id;
            $data['brand_data'] = $this->obj_brand->get_all($condition);
            $this->load->view('brand/edit', $data);
        } else {
            //image start
            $datas = array(
                'brand_name' => $this->input->post('brand_name'),
                'brand_user_id' => $this->input->post('brand_id'),
                'brand_created_date' => time()
            );
            $this->session->set_userdata(array('brand_msg' => 'Update successfully'));
            $condition = array('id' => $id);
            $this->obj_brand->edit($condition, $datas);
            redirect('brand/edit/' . $id);
        }
    }
    function delete($id = '', $row = '') {
        // Delete Product image
        $condition = array('brand_id' => $id);
        $total_count = $this->obj_common->countrows('product', $condition);
        if ($total_count == 0) {
            $condition = array('id' => $id);
            $this->obj_brand->delete($condition);
            redirect('brand/index/' . $row);
        } else {
            $this->session->set_flashdata('brand_delete_message', "Can't Delete , Brand  assigned to Product ");
           redirect('brand/index/' . $row);
        }
    }

    function update_status() {
        $id = $this->input->post('id');
        $brand_status = $this->input->post('brand_status');
        $condition = array('id' => $id);
        $data_array = array('brand_status' => $brand_status);
        $this->obj_brand->edit($condition, $data_array);
    }

}
