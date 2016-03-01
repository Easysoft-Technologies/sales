<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
//Load Library and model.
        $this->load->library('cart');
        $this->load->model('cart_model');
        $this->load->model('invoice_model', 'obj_invoice', TRUE);
        $this->load->model('client_model', 'obj_client', TRUE);
        $this->load->model('product_model', 'obj_product', TRUE);
        $this->load->model('brand_model', 'obj_brand', TRUE);
        $this->load->model('sales_representative_model', 'obj_sales_representative', TRUE);
        $this->load->model('common_model', 'obj_common', TRUE);
    }

    public function index() {
//Get all data from database
        $data = array();
//send all product data to "cart_view", which fetch from database.
        $this->load->view('web/cart_view', $data);
    }

    function add() {

        $this->form_validation->set_rules('product_id', 'Product Id', 'required|xss_clean|trim');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|xss_clean|trim|numeric');
        $this->form_validation->set_rules('price', 'Price', 'required|xss_clean|trim|numeric');
        if ($this->form_validation->run() == FALSE) {

            $message = '<br/><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . validation_errors() . '</div>';
            $status = array('cart_message' => $message,
                'status' => 'false');
        } else {
// Set array for send data.
            $product_id = $this->input->post('product_id');
            $quantity = $this->input->post('quantity');
            $condition = array('id' => $product_id);
            $products = $this->obj_product->get_all($condition);
            $insert_data = array(
                'id' => $product_id,
                'name' => $products[0]['product_user_id'],
                'price' => $products[0]['unit_price'],
                'qty' => $quantity
            );
// This function add items into cart.
            $this->cart->insert($insert_data);
            $status = array('cart_message' => '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Add Sucessfully </div>',
                'status' => 'true');
            //  echo '<br/><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Add Product Successfully</div>';
// This will show insert data in cart.
            // redirect('cart');
        }

        echo json_encode($status);
    }

    function update() {

        $this->form_validation->set_rules('quantity', 'Quantity', 'required|xss_clean|trim|numeric');
        $this->form_validation->set_rules('price', 'Price', 'required|xss_clean|trim|numeric');
        if ($this->form_validation->run() == FALSE) {
            $message = '<br/><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . validation_errors() . '</div>';
            $status = array('cart_message' => $message,
                'status' => 'false');
        } else {
            $qty = $this->input->post('quantity');
            $rowid = $this->input->post('rowid');
            $data = array(
                'rowid' => $rowid,
                'qty' => $qty
            );
            $this->cart->update($data);

            $status = array('cart_message' => '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Update Sucessfully </div>',
                'status' => 'true');
        }
        echo json_encode($status);
    }

    function remove($rowid) {
// Check rowid value.
        if ($rowid === "all") {
// Destroy data which store in session.
            $this->cart->destroy();
        } else {
// Destroy selected rowid in session.
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
// Update cart data, after cancel.
            $this->cart->update($data);
        }

// This will show cancel data in cart.
        redirect('invoice/add');
    }

    function edit($product_id = '', $row_id = '') {
        $data = array();
        $product_id = $product_id;
        $condition = array('id' => $product_id);
        $data['row_id'] = $row_id;
        $data['products'] = $this->obj_product->get_all($condition);
        $this->load->view('invoice/edit_product', $data);
    }

    function cart_content() {
        $this->load->view('invoice/cart_content');
    }

    function save() {

        if ($this->cart->total_items()) {
// Recieve post values,calcute them and update
            $this->form_validation->set_rules('client_id', 'Client Id', 'required|xss_clean|trim', array('required' => 'Please Select Client'));
            $this->form_validation->set_rules('sales_representative_id', 'Sales Representative', 'required|xss_clean|trim', array('required' => 'Please Select Sales Representativ'));
            if ($this->form_validation->run() == FALSE) {
                $data = array();
                $this->load->view('invoice/add', $data);
            } else {
                $order_url = md5(time());
                // $total=number_format($this->cart->total(),2);                   
                $data = array(
                    'order_url' => $order_url,
                    'submitted_date' => time(),
                    'date' => date("Y-m-d"),
                    'sales_representative_id' => $this->input->post('sales_representative_id'),
                    'client_id' => $this->input->post('client_id')
                );
                $order_id = $this->obj_common->add('invoice_orders', $data);
                $invoice_id = $this->config->item('order') . $order_id;
                $condition = array('id' => $order_id);
                $data = array('invoice_id' => $invoice_id);
                $this->obj_common->edit('invoice_orders', $condition, $data);
                $total_amount = 0;
                if ($cart = $this->cart->contents()) {
                    foreach ($cart as $item) {
                        $total = $item['qty'] * $item['price'];
                        $total_q_p = number_format($total, 2, '.', '');
                        $total_amount+=$total_q_p;
                        $order_detail = array(
                            'order_id' => $order_id,
                            'product_id' => $item['id'],
                            'quantity' => $item['qty'],
                            'price' => $item['price'],
                            'total' => $total_q_p
                        );
                        $this->obj_common->add('invoice_order_items', $order_detail);
                    }
                }
                $total_amount = number_format($total_amount, 2, '.', '');
                $data = array('total_price' => $total_amount);
                $this->obj_common->edit('invoice_orders', $condition, $data);
//                $data = array();
//                $msg = $this->load->view('invoice/cart_message', $data, true);
//                $this->send_invoice($msg);
                $this->cart->destroy();
                redirect('invoice');
            }
        } else {
            redirect('invoice/add');
        }
    }

    function send_invoice($msg='') {
        $subject = 'New Order';       
        $config['charset'] = 'iso-8859-1';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from($this->config->item('from_mail'));
        $this->email->to($this->config->item('to_mail'));
        $this->email->subject($subject);
        $this->email->message($msg);        
        @$this->email->send();
    }
//    function message($condition = array()) {                
//        $data = array();
//        $condition = array('order_url' => $order_url);      
//        $data['invoice'] = $this->obj_invoice->get_all_invoice_data('', '', $condition);
//        $msg = $this->load->view('invoice/model_report_list', $data);        
//        return $msg;
//    }
    function remove_all() {
        $this->cart->destroy();
        redirect('cart');
    }

    function send_mail($message = '', $toaddress = '', $subject = '') {
        $this->load->library('email');
        $config['charset'] = 'iso-8859-1';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from($this->config->item('from_mail'), $this->config->item('name'));
        $this->email->to($toaddress);
        // $this->email->to('sibin@easysoftindia.com'); 
        $this->email->subject($subject);
        $this->email->message($message);
        @$this->email->send();
    }

    function get_price() {
        $product_id = $this->input->post('product_id');
        $condition = array('product_user_id' => $product_id);
        $products = $this->obj_product->get_all($condition);
        if ($products) {
            echo $products[0]['unit_price'];
        }
    }
        function get_product_id() {
        $product_id = $this->input->post('product_id');
        $condition = array('product_user_id' => $product_id);
        $products = $this->obj_product->get_all($condition);
        if ($products) {
            echo $products[0]['id'];
        }
    }

}

?>