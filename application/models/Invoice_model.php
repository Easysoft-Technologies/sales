<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class invoice_model extends CI_Model {

    var $table = 'indus_invoice_document';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function edit($condition = array(), $data_array = array()) {

        if ($condition) {
            $this->db->where($condition);
        }
        if ($this->db->update($this->table, $data_array)) {
            return true;
        } else {
            return false;
        }
    }

    function count_rows($condition = array()) {
        $this->db->from('invoice_orders'); 
        $this->db->join('sales_representative', 'sales_representative.id=invoice_orders.sales_representative_id', 'left');
        if ($condition) {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        $row = $query->num_rows();
        return $row;
    }

    //invoice_order_items   start
    function get_all_data_csv($row, $limit, $condition = array(), $order_by_fieled, $order_by_type = "asc") {
        //$this->db->where('blog_status','E');       

        $this->db->select('date As Date,client_user_id as Customer ID,client_name as Customer Name,invoice_id as Invoice/CM,quantity as Quantity,product_user_id ProductID,product_description as Description,sales_representative_user_id as invoice Representative ID,brand_user_id as Brand Name,price as Unit Price ,total Total');
        $this->db->select('date,submitted_date,client_user_id,client_name,invoice_id,quantity,product_user_id,product_description,sales_representative_user_id,brand_user_id,price,total');
        $this->db->from('invoice_order_items');
        $this->db->join('invoice_orders', 'invoice_order_items.order_id=invoice_orders.id', 'left');
        $this->db->join('product', 'invoice_order_items.product_id=product.id', 'left');
        $this->db->join('client', 'client.id=invoice_orders.client_id', 'left');
        $this->db->join('brand', 'brand.id=product.brand_id', 'left');
        $this->db->join('sales_representative', 'sales_representative.id=invoice_orders.sales_representative_id', 'left');
        //$this->db->join('user_payment','brand.brand_id=user_payment.brand_id','left');
        if ($condition) {
            $this->db->where($condition);
        }
        if ($order_by_fieled) {
            $this->db->order_by($order_by_fieled, $order_by_type);
        }
        if ($limit) {
            $this->db->limit($limit, $row);
        }

        $query = $this->db->get();
        $return_query = $query;
        return $return_query;
    }

    //invoice_order_items   start
    function get_all_data($row, $limit, $condition = array(), $order_by_fieled, $order_by_type = "asc") {
        //$this->db->where('blog_status','E');        
        //$this->db->select('product_item_id as Product Id,product_name as Product Name,product_family_name as Family,	product_category_name as Category,product_sub_category_name	 as Sub Category ,unit_price as Unit Price,unit_size as Unit Size ,specification as Specification,product_description as Product Description,manufacturer_name as Manufacturer Name');
        //$this->db->select('date As Date,client_user_id as Customer ID,client_name as Customer Name,invoice_id as Invoice/CM,quantity as Quantity,product_user_id ProductID,product_description as Description,sales_representative_user_id as invoice Representative ID,brand_user_id as Brand Name,price as Unit Price ,total Total');             
        $this->db->select('order_url,date,submitted_date,client_user_id,client_name,invoice_id,sales_representative_user_id,total_price,users_id');
        $this->db->from('invoice_orders');      
        //$this->db->join('product', 'invoice_order_items.product_id=product.id', 'left');
        $this->db->join('client', 'client.id=invoice_orders.client_id', 'left');
       // $this->db->join('brand', 'brand.id=product.brand_id', 'left');
        $this->db->join('sales_representative', 'sales_representative.id=invoice_orders.sales_representative_id', 'left');
        //$this->db->join('user_payment','brand.brand_id=user_payment.brand_id','left');
        if ($condition) {
            $this->db->where($condition);
        }
        if ($order_by_fieled) {
            $this->db->order_by($order_by_fieled, $order_by_type);
        }
        if ($limit) {
            $this->db->limit($limit, $row);
        }
        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
     //invoice_order_items   start
    function get_all_invoice_data($row='', $limit='', $condition = array(), $order_by_fieled='', $order_by_type = "asc") {
        $this->db->select('total_price,invoice_orders.id as id,date,client_user_id as Customer ID,client_name as Customer Name,submitted_date,client_user_id,client_name,invoice_id,sales_representative_user_id');
        $this->db->from('invoice_orders'); 
        $this->db->join('client', 'client.id=invoice_orders.client_id', 'left');
        $this->db->join('sales_representative', 'sales_representative.id=invoice_orders.sales_representative_id', 'left');      
        if ($condition) {
            $this->db->where($condition);
        }
        if ($order_by_fieled) {
            $this->db->order_by($order_by_fieled, $order_by_type);
        }
        if ($limit) {
            $this->db->limit($limit, $row);
        }
        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    //invoice_order_items   start
    function get_all_items_model($condition = array(), $order_by_fieled='', $order_by_type = "asc") {       
       // $this->db->select('order_url,date,submitted_date,client_user_id,client_name,invoice_id,sales_representative_user_id,total_price');
        $this->db->from('invoice_order_items');      
        $this->db->join('product', 'invoice_order_items.product_id=product.id', 'left');      
        $this->db->join('brand', 'brand.id=product.brand_id', 'left');
       
        if ($condition) {
            $this->db->where($condition);
        }
        if ($order_by_fieled) {
            $this->db->order_by($order_by_fieled, $order_by_type);
        }
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    function get_all_entries($row, $limit, $condition = array(), $order_by_fieled, $order_by_type = "asc") {
        //$this->db->where('blog_status','E');
        if ($condition) {
            $this->db->where($condition);
        }
        if ($order_by_fieled) {
            $this->db->order_by($order_by_fieled, $order_by_type);
        }
        $query = $this->db->get($this->table, $limit, $row);
        //echo $this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    function get_all_ajax_search_invoice($row, $limit, $condition = array(), $order_by_fieled, $order_by_type = "asc") {
        //$this->db->where('blog_status','E');
        if ($condition) {
            $this->db->like($condition);
            //$this->db->where($condition);
        }
        if ($order_by_fieled) {
            $this->db->order_by($order_by_fieled, $order_by_type);
        }
        $query = $this->db->get($this->table, $limit, $row);
        //echo $this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    function get_all($condition = array(), $order_by_fieled = '', $order_by_type = "asc", $limit = 0) {
        $this->db->from($this->table);
        if ($condition) {
            $this->db->where($condition);
        }
        if ($order_by_fieled) {
            $this->db->order_by($order_by_fieled, $order_by_type);
        }
        if ($limit) {
            $this->db->limit($limit);
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return $query->result_array();
        } else {
            return array();
        }
    }

    function countrows($condition = array()) {

        $this->db->from($this->table);
        if ($condition) {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        $row = $query->num_rows();
        return $row;
    }

    function check_url_status($gallery_url = '', $status = '1') {
//                       Add=1;
//                       Edit=2;		
        $this->db->from($this->table);
        $condition = array('invoice_url' => $gallery_url);
        if ($condition) {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        $row = $query->num_rows();
      

        if ($row == 0 && $status == '1') {
            return $gallery_url;
        }
        if ($row == 1 && $status == '1') {
            $url = time() . '' . $gallery_url;
            return $url;
        }
        if ($row == 1 && $status == '2') {
            return $gallery_url;
        }
        if ($row == 2 && $status == '2') {
            $url = time() . '' . $gallery_url;
            return $url;
        }
    }

    function add($data_array = array()) {

        $this->db->insert($this->table, $data_array);
        return $this->db->insert_id();
    }

    function get_entry($condition = array()) {

        $this->db->from($this->table);
        if ($condition) {
            $this->db->where($condition);
        }
        $query = $this->db->get();

        if ($query->num_rows() >= 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    function delete($condition = array()) {

        $this->db->where($condition);
        $this->db->delete($this->table);
    }

    function get_all_blog($condition = array(), $order_by_fieled = '', $order_by_type = "asc") {
        $this->db->from('invoices_blog');
        if ($condition) {
            $this->db->where($condition);
        }
        if ($order_by_fieled) {
            $this->db->order_by($order_by_fieled, $order_by_type);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
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
