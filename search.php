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
    }
    public function index() {
//Get all data from database
        $data = array();
//send all product data to "cart_view", which fetch from database.
        $this->load->view('web/cart_view', $data);
    }
    function add() {

        $this->form_validation->set_rules('product_id', 'Product Id', 'required|xss_clean|trim');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|xss_clean|trim|integer');
        $this->form_validation->set_rules('price', 'Price', 'required|xss_clean|trim|decimal');
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
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|xss_clean|trim|integer');
        $this->form_validation->set_rules('price', 'Price', 'required|xss_clean|trim|decimal');
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

            $status = array('cart_message' => '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Add Sucessfully </div>',
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
    function update_cart() {
        if ($this->cart->total_items()) {
// Recieve post values,calcute them and update
                $this->form_validation->set_rules('institution_id', 'Institution Id', 'required|xss_clean|trim', array('required' => 'Please Select institution'));           
                if ($this->form_validation->run() == FALSE) {
                    $data = array();
                    $this->load->view('invoice/add', $data);
                } else {                    
                    $order_url=md5(time());
                    $data = array(                       
                        'order_url' => $order_url,
                        'submitted_date' => time(),
                        'order_status' => $order_status,
                        'total_price' => $this->cart->total(),                     
                        'sales_representative_id'=> $this->input->post('sales_representative_id'),
                        'client_id'=>$this->input->post('client_id')
                    );
                    $order_id = $this->obj_orders->add($data);
                    $invoice_id = $this->config->item('order') . $order_id;
                    $condition = array('order_id' => $order_id);
                    $data = array('invoice_id'=>$invoice_id);
                    $this->obj_orders->edit($condition, $data);
                    if ($cart = $this->cart->contents()) {
                        foreach ($cart as $item) {
                            $total = $item['qty'] * $item['price'];
                            $order_detail = array(
                                'order_id' => $order_id,
                                'product_id' => $item['id'],
                                'quantity' => $item['qty'],
                                'price' => $item['price'],
                                'total' => $total                                
                            );
                            $this->obj_orders->add_order($order_detail);
                        }
                    }
                    $this->cart->destroy();
                    redirect('orders/index/' . $group_url);
                }              
           
        } else {
            redirect('orders/index/' . $this->session->userdata('group_url'));
        }
    }
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
        $condition = array('id' => $product_id);
        $products = $this->obj_product->get_all($condition);
        if ($products) {
            echo $products[0]['unit_price'];
        }
    }
}

?>