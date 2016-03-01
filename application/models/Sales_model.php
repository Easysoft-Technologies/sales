<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class sales_model extends CI_Model {

    var $table = 'sales_document';

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
        $this->db->from('order_items');
        $this->db->join('orders', 'order_items.order_id=orders.id', 'left');
        $this->db->join('product', 'order_items.product_id=product.id', 'left');
        $this->db->join('client', 'client.id=orders.client_id', 'left');
        $this->db->join('brand', 'brand.id=product.brand_id', 'left');
        $this->db->join('sales_representative', 'sales_representative.id=orders.sales_representative_id', 'left');
        if ($condition) {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        $row = $query->num_rows();
        return $row;
    }

    //order_items   start
    function get_all_data_csv($row, $limit, $condition = array(), $order_by_fieled, $order_by_type = "asc", $sort_checkbox = array()) {
        //$this->db->where('blog_status','E');  
        $select_data = '';
        if (in_array("1", $sort_checkbox)) {
            $select_data.="date As Date,";
        } if (in_array("2", $sort_checkbox)) {
            $select_data.="client_user_id as Customer ID,";
        } if (in_array("3", $sort_checkbox)) {
            $select_data.="client_name as Customer Name,";
        } if (in_array("4", $sort_checkbox)) {
            $select_data.="invoice_id as Invoice/CM,";
        } if (in_array("5", $sort_checkbox)) {
            $select_data.="product_user_id ProductID,";
        } if (in_array("6", $sort_checkbox)) {
            $select_data.="product_description as Description,";
        } if (in_array("7", $sort_checkbox)) {
            $select_data.="sales_representative_user_id as Sales Representative ID,";
        } if (in_array("8", $sort_checkbox)) {
            $select_data.="brand_user_id as Brand Name,";
        } if (in_array("9", $sort_checkbox)) {
            $select_data.="quantity as Quantity,";
        } if (in_array("10", $sort_checkbox)) {
            $select_data.="price as Unit Price,";
        }
        if (in_array("11", $sort_checkbox)) {
            $select_data.="total Total,";
        }



        // $this->db->select('date As Date,client_user_id as Customer ID,client_name as Customer Name,invoice_id as Invoice/CM,quantity as Quantity,product_user_id ProductID,product_description as Description,sales_representative_user_id as Sales Representative ID,brand_user_id as Brand Name,price as Unit Price ,total Total');
        // $this->db->select('date,submitted_date,client_user_id,client_name,invoice_id,quantity,product_user_id,product_description,sales_representative_user_id,brand_user_id,price,total');
        $this->db->select($select_data);
        $this->db->from('order_items');
        $this->db->join('orders', 'order_items.order_id=orders.id', 'left');
        $this->db->join('product', 'order_items.product_id=product.id', 'left');
        $this->db->join('client', 'client.id=orders.client_id', 'left');
        $this->db->join('brand', 'brand.id=product.brand_id', 'left');
        $this->db->join('sales_representative', 'sales_representative.id=orders.sales_representative_id', 'left');
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

    //order_items   start
    function get_all_data($row, $limit, $condition = array(), $order_by_fieled, $order_by_type = "asc") {
        //$this->db->where('blog_status','E');        
        //$this->db->select('product_item_id as Product Id,product_name as Product Name,product_family_name as Family,	product_category_name as Category,product_sub_category_name	 as Sub Category ,unit_price as Unit Price,unit_size as Unit Size ,specification as Specification,product_description as Product Description,manufacturer_name as Manufacturer Name');
        //$this->db->select('date As Date,client_user_id as Customer ID,client_name as Customer Name,invoice_id as Invoice/CM,quantity as Quantity,product_user_id ProductID,product_description as Description,sales_representative_user_id as Sales Representative ID,brand_user_id as Brand Name,price as Unit Price ,total Total');             
        $this->db->select('date,submitted_date,client_user_id,client_name,invoice_id,quantity,product_user_id,product_description,sales_representative_user_id,brand_user_id,price,total');
        $this->db->from('order_items');
        $this->db->join('orders', 'order_items.order_id=orders.id', 'left');
        $this->db->join('product', 'order_items.product_id=product.id', 'left');
        $this->db->join('client', 'client.id=orders.client_id', 'left');
        $this->db->join('brand', 'brand.id=product.brand_id', 'left');
        $this->db->join('sales_representative', 'sales_representative.id=orders.sales_representative_id', 'left');
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
        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    function get_all_representative_count($condition = array()) {
        //$this->db->where('blog_status','E');        
        //$this->db->select('product_item_id as Product Id,product_name as Product Name,product_family_name as Family,	product_category_name as Category,product_sub_category_name	 as Sub Category ,unit_price as Unit Price,unit_size as Unit Size ,specification as Specification,product_description as Product Description,manufacturer_name as Manufacturer Name');
        //$this->db->select('date As Date,client_user_id as Customer ID,client_name as Customer Name,invoice_id as Invoice/CM,quantity as Quantity,product_user_id ProductID,product_description as Description,sales_representative_user_id as Sales Representative ID,brand_user_id as Brand Name,price as Unit Price ,total Total');             
        $this->db->select('client_id,sales_representative_user_id,client_user_id,client_name');
        $this->db->from('orders');
        $this->db->join('sales_representative', 'sales_representative.id=orders.sales_representative_id', 'left');
        $this->db->join('client', 'client.id=orders.client_id', 'left');
        //$this->db->join('user_payment','brand.brand_id=user_payment.brand_id','left');
        if ($condition) {
            $this->db->where($condition);
        }
        $this->db->distinct('client_id');
        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    //order_items   start
    function get_all_data2($condition = array(), $order_by_fieled, $order_by_type = "asc") {
        //$this->db->where('blog_status','E');        
        //$this->db->select('product_item_id as Product Id,product_name as Product Name,product_family_name as Family,	product_category_name as Category,product_sub_category_name	 as Sub Category ,unit_price as Unit Price,unit_size as Unit Size ,specification as Specification,product_description as Product Description,manufacturer_name as Manufacturer Name');
        //$this->db->select('date As Date,client_user_id as Customer ID,client_name as Customer Name,invoice_id as Invoice/CM,quantity as Quantity,product_user_id ProductID,product_description as Description,sales_representative_user_id as Sales Representative ID,brand_user_id as Brand Name,price as Unit Price ,total Total');             
        //$this->db->select('date,submitted_date,client_user_id,client_name,invoice_id,quantity,product_user_id,product_description,sales_representative_user_id,brand_user_id,price,total');
        $this->db->select_sum('total');
        $this->db->select('client_user_id,client_name');
        $this->db->from('order_items');
        $this->db->join('orders', 'order_items.order_id=orders.id', 'left');
//        $this->db->join('product', 'order_items.product_id=product.id', 'left');
        $this->db->join('client', 'client.id=orders.client_id', 'left');
//        $this->db->join('brand', 'brand.id=product.brand_id', 'left');
        $this->db->join('sales_representative', 'sales_representative.id=orders.sales_representative_id', 'left');
        //$this->db->join('user_payment','brand.brand_id=user_payment.brand_id','left');
        if ($condition) {
            $this->db->where($condition);
        }
        if ($order_by_fieled) {
            $this->db->order_by($order_by_fieled, $order_by_type);
        }
        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    //order_items   start
    function get_all_data_client($condition = array(), $order_by_fieled, $order_by_type = "asc") {
        //$this->db->where('blog_status','E');        
        //$this->db->select('product_item_id as Product Id,product_name as Product Name,product_family_name as Family,	product_category_name as Category,product_sub_category_name	 as Sub Category ,unit_price as Unit Price,unit_size as Unit Size ,specification as Specification,product_description as Product Description,manufacturer_name as Manufacturer Name');
        //$this->db->select('date As Date,client_user_id as Customer ID,client_name as Customer Name,invoice_id as Invoice/CM,quantity as Quantity,product_user_id ProductID,product_description as Description,sales_representative_user_id as Sales Representative ID,brand_user_id as Brand Name,price as Unit Price ,total Total');             
        //$this->db->select('date,submitted_date,client_user_id,client_name,invoice_id,quantity,product_user_id,product_description,sales_representative_user_id,brand_user_id,price,total');
        $this->db->select_sum('total');
        $this->db->select('client_user_id,client_name');
        $this->db->from('order_items');
        $this->db->join('orders', 'order_items.order_id=orders.id', 'left');
//        $this->db->join('product', 'order_items.product_id=product.id', 'left');
        $this->db->join('client', 'client.id=orders.client_id', 'left');
//        $this->db->join('brand', 'brand.id=product.brand_id', 'left');      
        //$this->db->join('user_payment','brand.brand_id=user_payment.brand_id','left');
        if ($condition) {
            $this->db->where($condition);
        }
        if ($order_by_fieled) {
            $this->db->order_by($order_by_fieled, $order_by_type);
        }
        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    function get_all_brand_product($condition = array()) {
        //$this->db->where('blog_status','E');        
        //$this->db->select('product_item_id as Product Id,product_name as Product Name,product_family_name as Family,	product_category_name as Category,product_sub_category_name	 as Sub Category ,unit_price as Unit Price,unit_size as Unit Size ,specification as Specification,product_description as Product Description,manufacturer_name as Manufacturer Name');
        //$this->db->select('date As Date,client_user_id as Customer ID,client_name as Customer Name,invoice_id as Invoice/CM,quantity as Quantity,product_user_id ProductID,product_description as Description,sales_representative_user_id as Sales Representative ID,brand_user_id as Brand Name,price as Unit Price ,total Total');             
        $this->db->select('product.id,product_name,product_user_id');
        $this->db->from('product');
        $this->db->join('brand', 'brand.id=product.brand_id', 'left');
        //$this->db->join('user_payment','brand.brand_id=user_payment.brand_id','left');
        if ($condition) {
            $this->db->where($condition);
        }
        // $this->db->distinct('client_id');
        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    function get_all_data_brand($condition = array(), $order_by_fieled, $order_by_type = "asc") {
        //$this->db->where('blog_status','E');        
        //$this->db->select('product_item_id as Product Id,product_name as Product Name,product_family_name as Family,	product_category_name as Category,product_sub_category_name	 as Sub Category ,unit_price as Unit Price,unit_size as Unit Size ,specification as Specification,product_description as Product Description,manufacturer_name as Manufacturer Name');
        //$this->db->select('date As Date,client_user_id as Customer ID,client_name as Customer Name,invoice_id as Invoice/CM,quantity as Quantity,product_user_id ProductID,product_description as Description,sales_representative_user_id as Sales Representative ID,brand_user_id as Brand Name,price as Unit Price ,total Total');             
        //$this->db->select('date,submitted_date,client_user_id,client_name,invoice_id,quantity,product_user_id,product_description,sales_representative_user_id,brand_user_id,price,total');
        $this->db->select_sum('total');
        $this->db->select('product_user_id,product_name');
        $this->db->from('order_items');
        $this->db->join('orders', 'order_items.order_id=orders.id', 'left');
        $this->db->join('product', 'order_items.product_id=product.id', 'left');
        $this->db->join('brand', 'brand.id=product.brand_id', 'left');

        //$this->db->join('user_payment','brand.brand_id=user_payment.brand_id','left');
        if ($condition) {
            $this->db->where($condition);
        }
        if ($order_by_fieled) {
            $this->db->order_by($order_by_fieled, $order_by_type);
        }
        $query = $this->db->get();
        // echo $this->db->last_query();
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

    function get_all_ajax_search_sales($row, $limit, $condition = array(), $order_by_fieled, $order_by_type = "asc") {
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
        $condition = array('sales_url' => $gallery_url);
        if ($condition) {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        $row = $query->num_rows();
        echo $row;
        echo "ggggg";

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
        $this->db->from('saless_blog');
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

    function get_autocomplete($condition = array(), $select = 'id,brand_user_id') {
        $this->db->select('id as value,sales_representative_user_id as name');
        $this->db->from($this->table);
        $this->db->like($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

}

?>
