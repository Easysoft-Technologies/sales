<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');


class Logout extends CI_Controller{

	function index(){	
		
		$this->session->unset_userdata('ADMIN_NAME');
		$this->session->unset_userdata('ADMIN_ID');
	
		redirect('login');
	}
} 