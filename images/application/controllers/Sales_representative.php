<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class sales_representative extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('common_model', 'obj_common', TRUE);
        $this->load->model('sales_representative_model', 'obj_sales_representative', TRUE);
        $this->load->model('users_model', 'obj_users', TRUE);
        if ($this->session->userdata('ADMIN_NAME') == FALSE) {
            redirect('/');
        }
        if($this->session->userdata('user_type')=='2'){
                      redirect('/');
                  }
    }
    
//      $config['base_url'] = site_url() . '/travel_ideas/page';
//       $config['full_tag_open'] = '<li>';
//       $config['full_tag_close'] = '</li>';
//       $config['attributes'] = array('class' => 'active-li');
//       $config['uri_segment'] = 3;
//       $config['total_rows'] = $this->obj_blog->countrows($condition);
//       $config['per_page'] = 6;
//       $config['num_links'] = 1;
//       $config['prev_link'] = 'Prev';
//       $config['next_link'] = 'Next';
//       $config['last_link'] = FALSE;
//       $config['cur_tag_open'] = '<span class="active-link">';
//       $config['cur_tag_close'] = '</span>';
//       return $config;
    

    function index($row = 0) {
        $limit = '2';
        $this->load->library('pagination');
        $config['base_url'] = site_url('sales_representative/index');
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
        $config['total_rows'] = $this->obj_sales_representative->countrows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['sales_representative'] = $this->obj_sales_representative->get_all_entries($row, $limit, $condition, 'sales_representative_display_order', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $this->load->view('sales_representative/list', $data);
    }

    function ajax_search_sales_representative_name($row = 0) {
        $limit = 100;
        $search_sales_representative_name = $this->input->post('search_sales_representative_name');
        if ($search_sales_representative_name) {
            $data['row'] = $row;
            $condition = array('sales_representative_user_id' => $search_sales_representative_name);
            $data['sales_representative'] = $this->obj_sales_representative->get_all_ajax_search_sales_representative($row, $limit, $condition, 'sales_representative_display_order', 'asc');
        } else {
            $row = 0;
            $limit = '2';
            $this->load->library('pagination');
            $config['base_url'] = site_url('sales_representative/index');
            $config['full_tag_open'] = '<li>';
            $config['full_tag_close'] = '</li>';
            $config['uri_segment'] = 3;
            $condition = array();
            $config['total_rows'] = $this->obj_sales_representative->countrows($condition);
            $config['per_page'] = $limit;
            $this->pagination->initialize($config);
            $data['links'] = $this->pagination->create_links();
            $data['sales_representative'] = $this->obj_sales_representative->get_all_entries($row, $limit, $condition, 'sales_representative_display_order', 'asc');
            $data['row'] = $row;
            $data['page_active'] = 2;
            $data['per_page'] = $limit;
        }
        $this->load->view('sales_representative/ajax_list', $data);
    }

    function add() {
        $this->form_validation->set_rules('sales_representative_name', 'Sales Representative Name', 'required|xss_clean|trim');
        $this->form_validation->set_rules('sales_representative_id', 'Sales Representative Id', 'required|xss_clean|trim|is_unique[sales_representative.sales_representative_user_id]');
        $this->form_validation->set_rules('sales_representative_address', 'Sales Representative Address', 'xss_clean|trim');
        if ($this->input->post('username')) {
            $this->form_validation->set_rules('username', 'Username', 'required|xss_clean|trim|is_unique[users.users_username]');
        }
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $this->load->view('sales_representative/add', $data);
        } else {
//            $sales_representative_url = url_title(strtolower($this->input->post('sales_representative_name')));
//            $sales_representative_url = $this->obj_sales_representative->check_url_status($sales_representative_url);
            $datas = array(
                'sales_representative_name' => $this->input->post('sales_representative_name'),
                'sales_representative_address' => $this->input->post('sales_representative_address'),
                'sales_representative_user_id' => $this->input->post('sales_representative_id'),
                'sales_representative_created_date' => time()
            );
            $sales_representative_id = $this->obj_sales_representative->add($datas);
            if ($this->input->post('username')) {
                $password = $this->input->post('password');
                $salt = sha1($password);
                $password = md5($salt . $password);
                $datas = array(
                    'users_usertype' => '2',
                    'users_username' => $this->input->post('username'),
                    'users_password' => $password,
                    'users_active' => 'Y',
                    'users_full_name' => $this->input->post('sales_representative_name'));
                $user_id = $this->obj_users->add($datas);
                $datas = array('users_id' => $user_id);
                $condition = array('id' => $sales_representative_id);
                $this->obj_sales_representative->edit($condition, $datas);
            }
            redirect('sales_representative/index');
        }
    }
    function edit($id = '') {
        $data = array();
        $condition = array('id' => $id);
        $sales_representative_user_id = $this->obj_sales_representative->get_field_data($condition, 'sales_representative_user_id');
        if ($sales_representative_user_id == $this->input->post('sales_representative_id')) {
            $this->form_validation->set_rules('sales_representative_id', 'Sales Representative Id', 'required|xss_clean|trim');
        } else {
            $this->form_validation->set_rules('sales_representative_id', 'Sales Representative Id', 'required|xss_clean|trim|is_unique[sales_representative.sales_representative_user_id]');
        }
        $this->form_validation->set_rules('sales_representative_name', 'Sales Representative Name', 'required|xss_clean|trim');
        $this->form_validation->set_rules('sales_representative_address', 'Sales Representative Address', 'xss_clean|trim');
        if ($this->form_validation->run() == FALSE) {
            $condition = array('id' => $id);
            $sales_representative_data = $this->obj_sales_representative->get_all($condition);
            if ($sales_representative_data) {
                $data['sales_representative_data'] = $sales_representative_data;
            } else {
                redirect('sales_representative', 'refresh');
            }
            $data['id'] = $id;
            $data['sales_representative_data'] = $this->obj_sales_representative->get_all($condition);
            $this->load->view('sales_representative/edit', $data);
        } else {
            //image start
            $datas = array(
                'sales_representative_name' => $this->input->post('sales_representative_name'),
                'sales_representative_address' => $this->input->post('sales_representative_address'),
                'sales_representative_user_id' => $this->input->post('sales_representative_id'),
                'sales_representative_created_date' => time()
            );
            $this->session->set_userdata(array('sales_representative_msg' => 'Update successfully'));
            $condition = array('id' => $id);
            $this->obj_sales_representative->edit($condition, $datas); 
                        
            if ($this->input->post('password') && $this->input->post('username')) { 
                $user_id=$this->obj_sales_representative->get_field_data($condition,'users_id');
                if($user_id){
                $condition=array('users_id'=>$user_id);
                $password = $this->input->post('password');
                $salt = sha1($password);
                $password = md5($salt . $password);
                $datas = array('users_password' => $password);
                $this->obj_users->edit($condition,$datas);
                }  else {
                     $password = $this->input->post('password');
                $salt = sha1($password);
                $password = md5($salt . $password);
                $datas = array(
                    'users_usertype' => '2',
                    'users_username' => $this->input->post('username'),
                    'users_password' => $password,
                    'users_active' => 'Y',
                    'users_full_name' => $this->input->post('sales_representative_name'));
                $user_id = $this->obj_users->add($datas);
                $datas = array('users_id' => $user_id);
                $condition = array('id' => $id);
                $this->obj_sales_representative->edit($condition, $datas);
                }
            } 
            redirect('sales_representative/edit/' . $id);
        }
    }

    function delete($id = '', $row = '') {
        // Delete Product image
        $condition = array('sales_representative_id'=>$id);
        $total_count=$this->obj_common->countrows('orders',$condition);
        if($total_count==0){
        $condition = array('id' => $id);
        $this->obj_sales_representative->delete($condition);
        redirect('sales_representative/index/' . $row);
        }  else {
            $this->session->set_flashdata('sales_delete_message', "Can't Delete , Sales Representative  assigned to Reports ");
            redirect('sales_representative/index/' . $row);
        }
    }

    function update_status() {
        $id = $this->input->post('id');
        $sales_representative_status = $this->input->post('sales_representative_status');
        $condition = array('id' => $id);
        $data_array = array('sales_representative_status' => $sales_representative_status);
        $this->obj_sales_representative->edit($condition, $data_array);
    }

}
