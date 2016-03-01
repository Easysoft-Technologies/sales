<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class client extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('common_model', 'obj_common', TRUE);
        $this->load->model('client_model', 'obj_client', TRUE);
        if ($this->session->userdata('ADMIN_NAME') == FALSE) {

            redirect('/');
        }
        if($this->session->userdata('user_type')=='2'){
                      redirect('/');
                  }
    }

    function index($row = 0) {

        $limit = '20';
        $this->load->library('pagination');
        $config['base_url'] = site_url('client/index');
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
        $config['total_rows'] = $this->obj_client->countrows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['client'] = $this->obj_client->get_all_entries($row, $limit, $condition, 'client_display_order', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $this->load->view('client/list', $data);
    }

    function ajax_search_client_name($row = 0) {

        $limit = 100;
        $search_client_name = $this->input->post('search_client_name');
        if ($search_client_name) {
            $data['row'] = $row;
            $condition = array('client_name' => $search_client_name);
            $data['client'] = $this->obj_client->get_all_ajax_search_client($row, $limit, $condition, 'client_display_order', 'asc');
        } else {
            $row = 0;
            $limit = '2';
            $this->load->library('pagination');
            $config['base_url'] = site_url('client/index');
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
            $config['total_rows'] = $this->obj_client->countrows($condition);
            $config['per_page'] = $limit;
            $this->pagination->initialize($config);
            $data['links'] = $this->pagination->create_links();
            $data['client'] = $this->obj_client->get_all_entries($row, $limit, $condition, 'client_display_order', 'asc');
            $data['row'] = $row;
            $data['page_active'] = 2;
            $data['per_page'] = $limit;
        }
        $this->load->view('client/ajax_list', $data);
    }

    function add() {

        $this->form_validation->set_rules('client_name', 'Client Name', 'required|xss_clean|trim');
        $this->form_validation->set_rules('client_id', 'Client Id', 'required|xss_clean|trim|is_unique[client.client_user_id]');
//        $this->form_validation->set_rules('client_address', 'Client Address', 'xss_clean|trim');
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $this->load->view('client/add', $data);
        } else {
//            $client_url = url_title(strtolower($this->input->post('client_name')));
//            $client_url = $this->obj_client->check_url_status($client_url);
            $datas = array(
                'client_name' => $this->input->post('client_name'),
                'client_user_id' => $this->input->post('client_id'),
                'client_created_date' => time()
            );
            $this->obj_client->add($datas);
            redirect('client/index');
        }
    }

    function edit($id = '') {
        $data = array();
        $condition = array('id' => $id);
        $client_user_id = $this->obj_client->get_field_data($condition, 'client_user_id');
        if ($client_user_id == $this->input->post('client_id')) {
            $this->form_validation->set_rules('client_id', 'Client Id', 'required|xss_clean|trim');
        } else {
            $this->form_validation->set_rules('client_id', 'Client Id', 'required|xss_clean|trim|is_unique[client.client_user_id]');
        }
        $this->form_validation->set_rules('client_name', 'Client Name', 'required|xss_clean|trim');

        if ($this->form_validation->run() == FALSE) {
            $condition = array('id' => $id);
            $client_data = $this->obj_client->get_all($condition);
            if ($client_data) {
                $data['client_data'] = $client_data;
            } else {
                redirect('client', 'refresh');
            }
            $data['id'] = $id;
            $data['client_data'] = $this->obj_client->get_all($condition);
            $this->load->view('client/edit', $data);
        } else {
            //image start
            $datas = array(
                'client_name' => $this->input->post('client_name'),
                'client_user_id' => $this->input->post('client_id'),
                'client_created_date' => time()
            );
            $this->session->set_userdata(array('client_msg' => 'Update successfully'));
            $condition = array('id' => $id);
            $this->obj_client->edit($condition, $datas);
            redirect('client/edit/' . $id);
        }
    }

    function delete($id = '', $row = '') {
      
        // Delete Product image
        $condition = array('client_id'=>$id);
        $total_count=$this->obj_common->countrows('orders',$condition);
        if($total_count==0){
         $condition = array('id' => $id);
        $this->obj_client->delete($condition);
        redirect('client/index/' . $row);
        }  else {
            $this->session->set_flashdata('client_delete_message', "Can't Delete , Client  assigned to Reports ");
            redirect('client/index/' . $row);
        }
    }

    function update_status() {
        $id = $this->input->post('id');
        $client_status = $this->input->post('client_status');
        $condition = array('id' => $id);
        $data_array = array('client_status' => $client_status);
        $this->obj_client->edit($condition, $data_array);
    }

}
