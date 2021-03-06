<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class cart_model extends CI_Model {
var $table='order_items';

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
                
                
                function check_url_status($cart_products_url='',$status='1'){                    
//                       Add=1;
//                       Edit=2;		
			$this->db->from($this->table);
                        $condition = array('cart_url' => $cart_products_url);
			if($condition){
					$this->db->where($condition);
				}
			$query = $this->db->get();
			$row=$query->num_rows();
                        echo $row;
                       echo "ggggg" ;
                       
                        if($row==0 && $status=='1'){
                          return  $cart_products_url;
                        }
			 if($row==1 && $status=='1'){
                             $url=time().''.$cart_products_url;
                          return   $url;
                        }
                         if($row==1 && $status=='2'){
                           return  $cart_products_url;
                          
                        }
                         if($row==2 && $status=='2'){
                          $url=time().''.$cart_products_url;
                          return   $url;
                        }
		}
		
		function add($data_array=array()){
		
			$this->db->insert($this->table,$data_array);
			return $this->db->insert_id();
		}
                function add_order($data_array=array()){
		
			$this->db->insert('order_items',$data_array);
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
		function get_all_category($condition=array(),$order_by_fieled='',$order_by_type="asc")
		{			
			$this->db->from('carts_category');
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
                
    function get_field_data($condition = array(), $field = '') {


        $this->db->select($field);
        $this->db->from($this->table);
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $firstname = $query->row();

            $return_value = $firstname->$field;
            return $return_value;
        }
    }

}
?>
