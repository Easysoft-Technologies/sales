<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Users_model', 'obj_users', TRUE);
    }

    function index() {

        if ($this->session->userdata('ADMIN_NAME') == TRUE) {
            redirect('sales');
        }
        $data['error_message']='';
        $this->form_validation->set_rules('username', 'Username', 'trim|required|prep_for_form');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|prep_for_form');
        $data['error_message'] = '';
        if ($this->form_validation->run() == TRUE) {
            if ($this->obj_users->check_login() == TRUE) {
                  if($this->session->userdata('user_type')=='1'){                     
                      redirect('sales');
                  }  else {
                       redirect('invoice');
                  }
                
            }
            $data['error_message'] = 'Invalid Username or Password';
        }
        $this->load->view('login', $data);
    }

    function change_password() {

        $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('password', 'New Password', 'trim|required|matches[password_re]');
        $this->form_validation->set_rules('password_re', 'Re enter Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {

            $data = array();
            $this->load->view('change_password', $data);
        } else {

            $status = $this->obj_users->change_password();

            $data['status'] = $status;

            $this->load->view('change_password', $data);
        }
    }

}
