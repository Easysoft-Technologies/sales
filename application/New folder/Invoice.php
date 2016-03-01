<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class invoice extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('common_model', 'obj_common', TRUE);
        $this->load->model('invoice_model', 'obj_invoice', TRUE);
        $this->load->model('client_model', 'obj_client', TRUE);
        $this->load->model('product_model', 'obj_product', TRUE);
        $this->load->model('brand_model', 'obj_brand', TRUE);
        $this->load->model('sales_representative_model', 'obj_sales_representative', TRUE);
        $this->max_size = 152048; //2MB
        $this->load->library('table');
        if ($this->session->userdata('ADMIN_NAME') == FALSE) {
            redirect('/');
        }
    }

    function index($row = 0) {
        $limit = '2';
        $this->load->library('pagination');
        $config['base_url'] = site_url('invoice/index');
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['uri_segment'] = 3;
        $condition = array();
        $config['total_rows'] = $this->obj_invoice->countrows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['invoice'] = $this->obj_invoice->get_all_entries($row, $limit, $condition, 'invoice_created_date', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $this->load->view('invoice/list', $data);
    }

    function reports_all($row = 0) {
        $limit = '2';
        $config['base_url'] = site_url('invoice/ajax_search_report_invoice/3');
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['uri_segment'] = 3;
        $condition = array();
        $config['total_rows'] = $this->obj_invoice->count_rows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['invoice'] = $this->obj_invoice->get_all_data($row, $limit, $condition, 'invoice_orders.id', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $data['report_type'] = 3;
        $this->load->view('invoice/invoice_report_list', $data);
    }

    function delete($id = '', $row = '') {
        // Delete Product image
        $condition = array('id' => $id);
        $this->obj_invoice->delete($condition);
        redirect('invoice/index/' . $row);
    }

    function update_status() {
        $id = $this->input->post('id');
        $invoice_status = $this->input->post('invoice_status');
        $condition = array('id' => $id);
        $data_array = array('invoice_status' => $invoice_status);
        $this->obj_invoice->edit($condition, $data_array);
    }

    function readCSV($csvFile) {
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 1024);
        }
        fclose($file_handle);
        return $line_of_text;
    }

    function view($invoice_url = '', $row = 0) {
        $limit = '3';
        $this->load->library('pagination');
        $condition = array('invoice_url' => $invoice_url);
        $data['invoice_document_name'] = $this->obj_invoice->get_field_data($condition, 'invoice_document_name');
        $id = $this->obj_invoice->get_field_data($condition, 'id');
        $config['base_url'] = site_url('invoice/view/' . $invoice_url);
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['uri_segment'] = 4;
        $condition = array('orders.invoice_document_id' => $id);
        $config['total_rows'] = $this->obj_invoice->count_rows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['invoice'] = $this->obj_invoice->get_all_data($row, $limit, $condition, 'orders.id', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $this->load->view('invoice/view', $data);
    }

    function report_client($row = 0) {

        $this->session->unset_userdata('search_report_type');
        $this->session->unset_userdata('search_report_name');
        $limit = '2';
        $config['base_url'] = site_url('invoice/ajax_search_report_invoice/3');
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['uri_segment'] = 3;
        $condition = array();
        $config['total_rows'] = $this->obj_invoice->count_rows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['invoice'] = $this->obj_invoice->get_all_data($row, $limit, $condition, 'orders.id', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $data['report_type'] = 3;
        $this->load->view('invoice/invoice_report', $data);
    }

    function report_brand($row = 0) {
        $this->session->unset_userdata('search_report_type');
        $this->session->unset_userdata('search_report_name');
        $limit = '2';
        $config['base_url'] = site_url('invoice/ajax_search_report_invoice/2');
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['uri_segment'] = 3;
        $condition = array();
        $config['total_rows'] = $this->obj_invoice->count_rows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['invoice'] = $this->obj_invoice->get_all_data($row, $limit, $condition, 'orders.id', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $data['report_type'] = 2;
        $this->load->view('invoice/invoice_report', $data);
    }

    function report_user($row = 0) {
        $this->session->unset_userdata('search_report_type');
        $this->session->unset_userdata('search_report_name');
        $limit = '2';
        $config['base_url'] = site_url('invoice/ajax_search_report_invoice/2');
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['uri_segment'] = 3;
        $condition = array();
        $config['total_rows'] = $this->obj_invoice->count_rows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['invoice'] = $this->obj_invoice->get_all_data($row, $limit, $condition, 'orders.id', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $data['report_type'] = 1;
        $this->load->view('invoice/invoice_report', $data);
    }

    function ajax_search_report_invoice($search_report_type = '', $row = 0) {

//        $family_id = $this->session->userdata('search_family');
        $this->session->unset_userdata('search_report_type');
        $this->session->unset_userdata('search_report_name');

        $this->session->unset_userdata('date_to');
        $this->session->unset_userdata('date_from');

        $this->session->unset_userdata('brand');
        $this->session->unset_userdata('user');

        $this->session->unset_userdata('client');
        $this->session->unset_userdata('order_id');

        $condition = array();
        $search_report_type = $this->input->post('search_report_type');
        $search_report_name = $this->input->post('search_report_name');
        $user = $this->input->post('user');
        $client = $this->input->post('client');
        $brand = $this->input->post('brand');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $invoice_id = $this->input->post('invoice_id');

        // $from_date = strtotime($from_date . '00:00:00');
        // $to_date = strtotime($to_date . '23:59:59');
        if ($from_date && $to_date) {
            $condition = array('date <=' => $to_date,
                'date >= ' => $from_date);
            $sess_data = array('date_to' => $to_date,
                'date_from' => $from_date);
        }
        if ($brand) {
            $condition['brand_user_id'] = $brand;
            $sess_data['brand'] = $brand;
        }
        if ($user) {
            $condition['invoice_representative_user_id'] = $user;
            $sess_data['user'] = $user;
        }
        if ($client) {
            $condition['client_user_id'] = $client;
            $sess_data['client'] = $client;
        }
        if ($invoice_id) {
            $condition_order = array('invoice_id' => $invoice_id);
            $order_id = $this->obj_common->get_field_data('orders', $condition_order, 'id');
            $condition['order_items.order_id'] = $order_id;
            $sess_data['order_id'] = $order_id;
        }

        if ($search_report_type == 2) {
            $condition = array('brand_user_id' => $search_report_name);
            $sess_data = array('search_report_type' => $search_report_type,
                'search_report_name' => $search_report_name);
        }
        if ($search_report_type == 1) {
            $condition = array('invoice_representative_user_id' => $search_report_name);
            $sess_data = array('search_report_type' => $search_report_type,
                'search_report_name' => $search_report_name);
        }
        if ($search_report_type == 3) {
            $condition = array('client_user_id' => $search_report_name);
            $sess_data = array('search_report_type' => $search_report_type,
                'search_report_name' => $search_report_name);
        }
        if ($sess_data) {
            $this->session->set_userdata($sess_data);
        }
        $limit = '2';
        $config['base_url'] = site_url('invoice/ajax_pagination');
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['uri_segment'] = 4;
        $config['total_rows'] = $this->obj_invoice->count_rows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['invoice'] = $this->obj_invoice->get_all_data($row, $limit, $condition, 'orders.id', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $data['report_type'] = 3;
        $this->load->view('invoice/ajax_invoice_report', $data);
    }

    function ajax_pagination($row = 0) {
        $condition = array();

        if ($this->session->userdata('search_report_name')) {
            $search_report_name = $this->session->userdata('search_report_name');
            $search_report_type = $this->session->userdata('search_report_type');
            if ($search_report_type == 2) {
                $condition = array('brand_user_id' => $search_report_name);
            }
            if ($search_report_type == 1) {
                $condition = array('invoice_representative_user_id' => $search_report_name);
            }
            if ($search_report_type == 3) {
                $condition = array('client_user_id' => $search_report_name);
            }
        }
        $user = $this->session->userdata('user');
        $client = $this->session->userdata('client');
        $brand = $this->session->userdata('brand');
        $from_date = $this->session->userdata('from_date');
        $to_date = $this->session->userdata('to_date');
        $order_id = $this->session->userdata('order_id');
        // $from_date = strtotime($from_date . '00:00:00');
        // $to_date = strtotime($to_date . '23:59:59');
        if ($from_date && $to_date) {
            $condition = array('date <=' => $to_date,
                'date >= ' => $from_date);
        }
        if ($brand) {
            $condition['brand_user_id'] = $brand;
        }
        if ($user) {
            $condition['invoice_representative_user_id'] = $user;
        }
        if ($client) {
            $condition['client_user_id'] = $client;
        }
        if ($order_id) {
            $condition['order_items.order_id'] = $order_id;
            $sess_data['order_id'] = $order_id;
        }
        $limit = '2';
        $config['base_url'] = site_url('invoice/ajax_pagination');
        $config['full_tag_open'] = '<li>';
        $config['full_tag_close'] = '</li>';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->obj_invoice->count_rows($condition);
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['invoice'] = $this->obj_invoice->get_all_data($row, $limit, $condition, 'orders.id', 'asc');
        $data['row'] = $row;
        $data['page_active'] = 2;
        $data['per_page'] = $limit;
        $data['report_type'] = $search_report_type;
        $this->load->view('invoice/ajax_invoice_report', $data);
    }

    function import_csv() {

        //image start          
        $file_name_image = '';
        $extension = '';
        $error = '';
        if ($_FILES['image']['name'] != '') {

            $config['upload_path'] = 'uploads/invoice/csv/';
            $config['allowed_types'] = 'csv';
            $config['max_size'] = $this->max_size;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = $this->upload->display_errors();
                echo '<br/><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error . '</div>';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $file_name_image = $data['upload_data']['file_name'];
                $filename = base_url() . 'uploads/invoice/csv/' . $file_name_image;

                $csv = $this->readCSV($filename);

                $error_status = 0;
                $i = 0;
                $no_of_records = 0;
                foreach ($csv as $row) {
                    if ($i == 0) {
                        $i++;
                        continue;
                    } else {

                        if ($row[0] && $row[1] && $row[3] && $row[2] && $row[6] && $row[8]) {


                            if ($i == 1) {
                                $datas = array(
                                    'invoice_document_name' => $file_name_image,
                                    'invoice_created_date' => time(),
                                    'invoice_url' => md5(time())
                                );
                                $invoice_document_id = $this->obj_invoice->add($datas);
                            }
                            /* Customer ID(0) *
                              Customer Name(1) *
                              Invoice/CM(2) *
                              Date(3)
                              invoice Representative ID(4)
                              Quantity(5)
                              Item ID(6) *
                              Description	(7)
                              G/L Account(8) *
                              Unit Price (9)
                              Amount (10)
                              U/M ID (11)
                              Ship to City(12)
                             */
                            //start customer
                            $condition_customer = array('client_user_id' => $row[0]);
                            $count_customer = $this->obj_client->countrows($condition_customer);
                            if ($count_customer == 0) {
                                $datas = array(
                                    'client_name' => $row[1],
                                    'client_user_id' => $row[0],
                                    'client_created_date' => time()
                                );
                                $customer_id = $this->obj_client->add($datas);
                            } else {
                                $customer_id = $this->obj_client->get_field_data($condition_customer, 'id');
                            }
                            //end customer 
                            //start invoice_representative
                            $condition_invoice_representative = array('invoice_representative_user_id' => $row[4]);
                            $count_invoice_representative = $this->obj_sales_representative->countrows($condition_invoice_representative);
                            if ($count_invoice_representative == 0) {
                                $datas = array(
                                    'invoice_representative_user_id' => $row[4],
                                    'invoice_representative_created_date' => time()
                                );
                                $invoice_representative_id = $this->obj_sales_representative->add($datas);
                            } else {
                                $invoice_representative_id = $this->obj_sales_representative->get_field_data($condition_invoice_representative, 'id');
                            }
                            //end invoice_representative
                            //start brand
                            $condition_brand = array('brand_user_id' => $row[8]);
                            $count_brand = $this->obj_brand->countrows($condition_brand);
                            if ($count_brand == 0) {
                                $datas = array(
                                    'brand_user_id' => $row[8],
                                    'brand_created_date' => time()
                                );
                                $brand_id = $this->obj_brand->add($datas);
                            } else {
                                $brand_id = $this->obj_brand->get_field_data($condition_brand, 'id');
                            }
                            //end brand
                            //start product

                            $unit_price = filter_var($row[9], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                            $condition_product = array('product_user_id' => $row[6]);
                            $count_product = $this->obj_product->countrows($condition_product);
                            if ($count_product == 0) {
                                $datas = array(
                                    'product_user_id' => $row[6],
                                    'product_created_date' => time(),
                                    'product_description' => $row[7],
                                    'um_id' => $row[11],
                                    'unit_price' => $unit_price,
                                    'brand_id' => $brand_id
                                );
                                $product_id = $this->obj_product->add($datas);
                            } else {
                                $product_id = $this->obj_product->get_field_data($condition_product, 'id');
                            }


                            //end product
                            $condition_order = array('invoice_id' => $row[2]);
                            $count_order = $this->obj_common->countrows('orders', $condition_order);

                            $newDate = date("Y-m-d", strtotime($row[3]));

                            //comment
                            //comment
                            //comment//comment
                            //comment//comment


                            if ($count_order == 0) {
                                $data = array(
                                    'submitted_date' => time(),
                                    'invoice_id' => $row[2],
                                    'invoice_document_id' => $invoice_document_id,
                                    'client_id' => $customer_id,
                                    'invoice_representative_id' => $invoice_representative_id,
                                    'date' => $newDate
                                );
                                $order_id = $this->obj_common->add('orders', $data);
                                $order_url = md5($order_id);
                                $condition = array('id' => $order_id);
                                $data = array('order_url' => $order_url);
                                $this->obj_common->edit('orders', $condition, $data);
                            } else {
                                $order_id = $this->obj_common->get_field_data('orders', $condition_order, 'id');
                            }
                            //order                            
                            $condition_order_product = array('order_id' => $order_id, 'product_id' => $product_id);

                            $order_item_id = $this->obj_common->countrows('order_items', $condition_order_product);
                            if ($order_item_id == 0) {

                                $total = $row[9] * $row[5];
                                $order_detail = array(
                                    'order_id' => $order_id,
                                    'product_id' => $product_id,
                                    'quantity' => $row[5],
                                    'price' => $row[9],
                                    'total' => $total
                                );
                                $this->obj_common->add('order_items', $order_detail);
                                $no_of_records++;
                            }
                        } else {

                            $size_of_row = sizeof($row);
                            if ($size_of_row > 2) {
                                $error_array[$i] = $row;
                                $error_status = 1;
                            }
                        }
                        $i++;
                    }
                    $condition = array('id' => $invoice_document_id);

                    $datas = array(
                        'invoice_no_of_records' => $no_of_records
                    );
                    $this->obj_invoice->edit($condition, $datas);
                }
                if ($error_status == 1) {

                    echo '<br/><div class="alert alert-danger" role="alert"> Not uploaded Rows</div>';
                    echo '<div class="table-responsive">';
                    $this->table->set_heading('Customer ID', 'Customer Name', 'Invoice/CM #', 'Date', 'invoice Representative ID', 'Quantity', 'Item ID', 'Description', 'G/L Account', 'Unit Price', 'U/M ID', 'Ship to City');

                    $template = array(
                        'table_open' => '<table class="table table-bordered" >');

                    $this->table->set_template($template);

                    echo $this->table->generate($error_array);
                }
                echo '<br/><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>File Upload Sucessfully </div>';
            }
        } else {
            echo '<br/><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Please Select a File</div>';
        }

//        // Load the spreadsheet reader library
//$this->load->library('excel_reader');
//
//// Read the spreadsheet via a relative path to the document
//// for example $this->excel_reader->read('./uploads/file.xls');
//
////$this->excel_reader->read('http://localhost/cloudkrate/uploads/excel.xls');
//$data=$this->excel_reader->read('./uploads/invoice/main/Book1.xlsx');
//
//// Get the contents of the first worksheet
//$worksheet = $this->excel_reader->sheets[0];
//
//$numRows = $worksheet['numRows']; // ex: 14
//$numCols = $worksheet['numCols']; // ex: 4
//$cells = $worksheet['cells']; // the 1st row are usually the field's name
//
//for($index = 1;$index <= $data->sheets[0]['numCols']; $index++){
//        $sql.= strtolower($data->sheets[0]['cells'][1][$index]) . ", ";
//    }
//
//    $sql = rtrim($sql, ", ")." ) VALUES ( ";
//    for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
//        $valuesSQL = '';
//        for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
//            $valuesSql .= "\"" . $data->sheets[0]['cells'][$i][$j] . "\", ";
//        }
//        echo $sql . rtrim($valuesSql, ", ")." ) <br>";
//    }
//
//
//print_r($cells);
    }

    function download_csv() {
        $condition = array();
        $row = 0;
        $limit = '';
        $query = $this->obj_invoice->get_all_data_csv($row, '', $condition, 'orders.id', 'asc');
        $filename = time() . '.csv';
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
        force_download($filename, $data);
    }

    function report() {
//        1 User
//        2 Brand
//        3 Client
        $status = 0;
        $search_report_name = $this->input->post('search_report_name');
        $search_report_type = $this->input->post('search_report_type');
        //echo $search_report_type;
        //exit;
        $condition = array();
              if ($search_report_name) {
                if ($search_report_type == 2) {
                    $condition = array('brand_user_id' => $search_report_name);
                    $title = 'User Wise Report';
                }
                if ($search_report_type == 1) {
                    $condition = array('invoice_representative_user_id' => $search_report_name);
                    $title = 'Brand Wise Report';
                }
                if ($search_report_type == 3) {
                    $condition = array('client_user_id' => $search_report_name);
                    $title = 'Client Wise Report';
                }
            }
            $user = $this->input->post('user');
            $client = $this->input->post('client');
            $brand = $this->input->post('brand');
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
            $invoice_id = $this->input->post('invoice_id');
            // $from_date = strtotime($from_date . '00:00:00');
            // $to_date = strtotime($to_date . '23:59:59');
            if ($from_date && $to_date) {
                $condition = array('date <=' => $to_date,
                    'date >= ' => $from_date);
            }
            if ($brand) {
                $condition['brand_user_id'] = $brand;
            }
            if ($user) {
                $condition['invoice_representative_user_id'] = $user;
            }
            if ($client) {
                $condition['client_user_id'] = $client;
            }
            if ($invoice_id) {
                $condition_order = array('invoice_id' => $invoice_id);
                $order_id = $this->obj_common->get_field_data('orders', $condition_order, 'id');
                $condition['order_items.order_id'] = $order_id;
            }
        if ($this->input->post('download_pdf')) {
            //redirect('invoice/download_pdf');

      
            $message = $this->message($condition, '');
            $status = 1;
            //echo $message;
            $this->generate_pdf($message, 'Report');
        } 

        if ($this->input->post('print_pdf')) {
            // redirect('invoice/print_pdf');
           
            $message = $this->message($condition);
            echo $message;
            $status = 1;
        }

        if ($this->input->post('excel')) {
            
            $row = 0;
            $limit = '';
            $query = $this->obj_invoice->get_all_data_csv($row, '', $condition, 'orders.id', 'asc');
            $filename = time() . '.csv';
            $this->load->dbutil();
            $this->load->helper('file');
            $this->load->helper('download');
            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
            force_download($filename, $data);
            $status = 1;
        }
        if ($status == 0) {
            redirect('invoice/report_user');
        }
    }

    function download_pdf() {
        ini_set('max_execution_time', 0);
        $message = $this->message();
        $this->generate_pdf($message);
    }

    function print_pdf() {
        ini_set('max_execution_time', 0);
        $message = $this->message();

        echo $message;
    }

    function message($condition = array()) {
        $row = 0;
        $limit = '';
        $data['row'] = 0;
        $data['invoice'] = $this->obj_invoice->get_all_data($row, '', $condition, 'orders.id', 'asc');
        $msg = $this->load->view('invoice/invoice_message', $data, true);
        return $msg;
    }

    function generate_pdf($message = '', $title = 'Report', $head = '') {
        $this->load->library('Pdf');
        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Receipt');
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '', '', array(0, 64, 255), array(255, 255, 255));
        $pdf->SetPrintFooter(false);
        $pdf->setPrintHeader(false);
        //$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        //$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        //$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        $pdf->setFontSubsetting(true);

        $pdf->SetFont('dejavusans', '', 7, '', true);
        $pdf->AddPage();

        // $pdf->writeHTMLCell(211, 17, '0', 10, '<h2 style="text-align:center;">name</h2>', 0, 1, 0, true, '', true);

        $style = array('width' => 0.1, 'color' => array(0, 0, 0));
        $pdf->Line(0, 25, 220, 25, $style);

        $pdf->writeHTMLCell(0, 0, '', '', '<h2 style="text-align:center;">' . $title . '</h2>', 0, 1, 0, true, '', true);

        $style = array('width' => 0.1, 'color' => array(0, 0, 0));
        $pdf->Line(0, 35, 220, 35, $style);

        $pdf->writeHTMLCell(35, 0, 10, 40, '<strong style="text-align:center;">Period : ' . date('M Y', time()) . '</strong>', 0, 1, 0, true, '', true);

        $pdf->writeHTMLCell(35, 0, 168, 40, '<strong style="text-align:center;">Date : ' . date('d-m-Y') . '</strong>', 0, 1, 0, true, '', true);
        $html = '<br/><br/>';
        $html .= $message;

        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->Output('receipt.pdf', 'I');
    }

    function autocomplete($type = '') {
        //$select='id,name';

        $search_query = $this->input->get('q');
        // $search_query='iii';
        $condition = array('brand_user_id' => $search_query);
        if ($type == 2) {
            $condition = array('brand_user_id' => $search_query);
            $results = $this->obj_brand->get_autocomplete($condition);
        }
        if ($type == 1) {
            $condition = array('invoice_representative_user_id' => $search_query);
            $results = $this->obj_sales_representative->get_autocomplete($condition);
        }

        if ($type == 3) {
            $condition = array('client_user_id' => $search_query);
            $results = $this->obj_client->get_autocomplete($condition);
        }

        /*
         * Autocomplete formatter
         */

        function autocomplete_format($results) {
            foreach ($results as $result) {
                echo $result['name'] . '|' . $result['value'] . "\n";
            }
        }

        /*
         * Output format
         */
        $output = 'autocomplete';
        if (isset($_GET['output'])) {
            $output = strtolower($_GET['output']);
        }

        /*
         * Output results
         */
        if ($output === 'json') {
            echo json_encode($results);
        } else {
            echo autocomplete_format($results);
        }
    }

    function download_document($invoice_url = '') {
        $this->load->helper('download');
        $condition = array('invoice_url' => $invoice_url);
        $document_name = $this->obj_invoice->get_field_data($condition, 'invoice_document_name');

        if ($document_name) {

            $image_name = $document_name;
            $image_path = base_url() . '/uploads/invoice/csv/' . $image_name;

            $data = file_get_contents($image_path); // Read the file's contents
            force_download($image_name, $data);
        }
    }

}
