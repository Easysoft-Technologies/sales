<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class settings_model extends CI_Model {
var $table='settings';

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
			//echo $this->db->last_query();
			
			if ($query->num_rows() > 0){
			  return $query->result_array();
			}
			 else {
			  return array();
			}
	
		}
		
		function get_all($condition=array(),$order_by_fieled='',$order_by_type="asc",$limit=0)
		{			
			$this->db->from($this->table);
			if($condition){
				$this->db->where($condition);
			}
			if($order_by_fieled){	
			$this->db->order_by($order_by_fieled,$order_by_type); 	
			}
			if($limit){
			$this->db->limit($limit);
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
				$query = $this->db->get(); 
		
			  if ($query->num_rows()>=1)
			  {
				return $query->result_array();
				
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
			$this->db->from('payments_blog');
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
}
?>
