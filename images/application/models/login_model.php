<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class login_model extends CI_Model {
var $table='user_login';
                                             
		public function __construct() {
			parent::__construct();
			$this->load->database();
		}
	   function edit($condition=array(),$data_array=array()){
	
		if($condition){
			$this->db->where($condition);
		}
		if($this->db->update($this->table,$data_array)){
				return true;
			}
			else{
				return false;
				}
		}
	
		 function get_all_entries($row,$limit,$condition=array(),$order_by_fieled,$order_by_type="asc")
		{   
			//$this->db->where('blog_status','E');
			if($condition)
			{
			$this->db->where($condition);
			}
			if($order_by_fieled){	
			$this->db->order_by($order_by_fieled,$order_by_type); 	
			}
			$query = $this->db->get($this->table,$limit,$row);
			
			if ($query->num_rows() > 0){
			  return $query->result_array();
			}
			 else {
			  return array();
			}
	
		}
		
		function get_all($condition=array(),$order_by_fieled='',$order_by_type="asc")
		{			
			$this->db->from($this->table);
			if($condition){
				$this->db->where($condition);
			}
			if($order_by_fieled){	
			$this->db->order_by($order_by_fieled,$order_by_type); 	
			}
			$query=$this->db->get();
			if($query->num_rows()>0){
					return $query->result_array();
				}
				else{
					return array();
				}
		}		
		function countrows($condition=array()){
		
			$this->db->from($this->table);
			if($condition){
					$this->db->where($condition);
				}
			$query = $this->db->get();
			$row=$query->num_rows();
			return $row;
		}
		
		function add($data_array=array()){
		
			$this->db->insert($this->table,$data_array);
			return $this->db->insert_id();
		}
		
		 function get_entry($condition=array()){
		 
			 $this->db->from($this->table);
			 if($condition)
				{
				$this->db->where($condition);
				}
			  
			  if ($query->num_rows() == 1)
			  {
				return $query->row();
				
			  }
			   else {
				return false; 
			  }
		}
		function delete($condition=array()){
		
			$this->db->where($condition);
			$this->db->delete($this->table);
		}
		function get_all_blog($condition=array(),$order_by_fieled='',$order_by_type="asc")
		{			
			$this->db->from('userss_blog');
			if($condition){
				$this->db->where($condition);
			}
			if($order_by_fieled){	
			$this->db->order_by($order_by_fieled,$order_by_type); 	
			}
			$query=$this->db->get();
			if($query->num_rows()>0){
					return $query->result_array();
				}
				else{
					return array();
				}
		}
                function get_field_data($condition=array(),$field_name='') {
		
		
		$this->db->select($field_name);
		$this->db->from($this->table);
		$this->db->where($condition);
		$query =$this->db->get();
		if($query->num_rows()>0)
			{
       $firstname=$query->row();
	   
	   	    $return_value=$firstname->$field_name;
			return $return_value;
		}
		
    }	
    function check_login() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $salt = sha1($password);
        $password = md5($salt . $password);
        $return = FALSE;
        $condition = array('users_username' => $username,
            'users_password' => $password,
            'users_active' => 'Y'
        );
       $this->db->from($this->table);
        if ($condition) {
            $this->db->where($condition);
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            $result = $query->result();
            $this->session->set_userdata('ADMIN_NAME', $result[0]->users_username);
            $this->session->set_userdata('user_type', $result[0]->users_usertype);
            $this->session->set_userdata('users_id', $result[0]->users_id);
            $return = TRUE;
        }

        return $return;
    }
    function change_password() {
        $password = $this->input->post('password');
        $old = $this->input->post('old_password');
        $salt = sha1($password);
        $password = md5($salt . $password);
        $salt = sha1($old);
        $old = md5($salt . $old);
        $this->db->where(array("users_id" => $this->session->userdata('users_id'), 'users_password' => $old));
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            $this->db->where(array("users_id" => $this->session->userdata('users_id')));
            $this->db->update('users', array('users_password' => $password));
            return 1;
        } else {
            return 0;
        }
    }

		
}
?>
