<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php $this->load->view('includes/link'); ?>
        <!--//Metis Menu -->
    </head> 
    <body class="cbp-spmenu-push">
        <div class="main-content">
            <!--left-fixed -navigation-->
            <!-- header-starts -->
            <?php $this->load->view('includes/leftmenu'); ?>
            <!-- //header-ends -->
            <!-- main content start-->
            <div id="page-wrapper">
                <?php echo form_open('sales/report', array('class' => 'form-horizontal', 'id' => 'search_form', 'method' => 'get')); ?>
                <div class="main-page">

                    <div class="admin-right-cnt">	
                        <div class="row ">
                            <div class="col-md-12"><div class="admin-order"><p>Report</p></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-4">
                                <div class="admin-select-box">                                    
                                    <select  name="user" class="search_report admin-slct">
                                        <option value="0">Sales Representative Id</option>
                                        <?php
                                        $condition = array();
                                        echo $this->obj_common->display_select('sales_representative', $condition, 'sales_representative_user_id', 'desc', '', 'sales_representative_user_id', 'sales_representative_user_id');
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="admin-select-box">
                                    <select class="search_report admin-slct" name="client">
                                        <option value="0">Client Id</option>
                                        <?php
                                        $condition = array();
                                        echo $this->obj_common->display_select('client', $condition, 'client_name', 'desc', '', 'client_user_id', 'client_user_id');
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="admin-select-box">
                                    <select class="search_report admin-slct" name="brand">
                                        <option value="0">Select Brand</option>
                                        <?php
                                        $condition = array();
                                        echo $this->obj_common->display_select('brand', $condition, 'brand_name', 'desc', '', 'brand_user_id', 'brand_user_id');
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="admin-select-box">
                                    <input name="from_date" type="text" class="birthday admn-right-form" placeholder="From Date " id="date_from">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="admin-select-box">
                                    <input name="to_date"  type="text" class="birthday admn-right-form" placeholder="To Date" id="date_to">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="admin-select-box">
                                    <input name="invoice_id" type="text" list="list_invoice_id" id="invoice_id" class="admn-right-form" placeholder="Invoice Number">
                                    <datalist id="list_invoice_id">
                                        <?php
                                        $orders_data = $this->obj_common->get_all('orders');
                                        foreach ($orders_data as $results) {
                                            ?>
                                            <option value="<?= $results['invoice_id'] ?>">

                                                <?php
                                            }
                                            ?>
                                    </datalist>
                                </div>
                            </div>  
                        </div>

                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="check-box-botm">
                                <div class="col-md-2">
                                    <input id="check1" checked="" type="checkbox" name="sort_checkbox[]" value="1">
                                    <label for="check1">Date</label>
                                </div>
                                <div class="col-md-2">
                                    <input id="check2" checked="" type="checkbox" name="sort_checkbox[]" value="2">
                                    <label for="check2">Client ID</label>
                                </div>
                                <div class="col-md-2">
                                    <input id="check3" checked="" type="checkbox" name="sort_checkbox[]" value="3">
                                    <label for="check3">Client Name</label>
                                </div>
                                <div class="col-md-2">
                                    <input id="check4" checked="" type="checkbox" name="sort_checkbox[]" value="4">
                                    <label for="check4">Invoice/CM</label>
                                </div>
                                <div class="col-md-2">
                                    <input id="check5" checked="" type="checkbox" name="sort_checkbox[]" value="5">
                                    <label for="check5">Product ID</label>
                                </div>

                                <div class="col-md-2">
                                    <input id="check6" checked="" type="checkbox" name="sort_checkbox[]" value="6">
                                    <label for="check6">Description</label>
                                </div>


                            </div>
                        </div>
                                  <div class="row">
                            <div class="check-box-botm">
                                <div class="col-md-2">
                                    <input id="check7" checked="" type="checkbox" name="sort_checkbox[]" value="8">
                                    <label for="check7">Brand Id</label>
                                </div>
                                <div class="col-md-2">
                                    <input id="check8"  checked="" type="checkbox" name="sort_checkbox[]" value="9">
                                    <label for="check8">Quantity</label>
                                </div>
                                <div class="col-md-2">
                                    <input id="check9" checked="" type="checkbox" name="sort_checkbox[]" value="10">
                                    <label for="check9">Unit Price</label>
                                </div>
                                <div class="col-md-2">
                                    <input id="check10" checked="" type="checkbox" name="sort_checkbox[]" value="11">
                                    <label for="check10">Total</label>
                                </div>
                                <div class="col-md-3">
                                    <input id="check11" checked="" type="checkbox" name="sort_checkbox[]" value="7">
                                    <label for="check11">Sales Representative ID</label>
                                </div>

                            </div>
                        </div>
  <div class="row">
                                <div class="col-md-12">
                                    <input type="button" value="submit" class="admin-right-submit" id="search_submit">
                                </div>
                            </div>

                        </div><!--bg-color-div-end------>
                        <div class="admin-right-cnt">	
                            <div class="row">
                                <div class="col-md-12"><div class="admin-order"><p>order list</p></div></div>
                                <div class="col-md-12">
                                    <div id="ajax_search_sales">
                                        <div class="table-responsive"> 
                                            <div class="tbl-grd"></div>         
                                            <table class="table table-bordered2">                                          
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Date</th>
                                                        <th>Client ID</th>
                                                        <th>Client Name</th>
                                                        <th>Invoice/CM</th>
                                                        <th>Product ID</th>
                                                        <th>Description</th>
                                                        <th>Sales Representative ID</th>
                                                        <th>Brand Id</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Price</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                                    
                                                    <?php
                                                    $i = $row;
                                                    //$per_page
                                                    $sales_count = count($sales);
                                                    if ($sales) {
                                                        foreach ($sales as $result) {
                                                            $i++;
                                                            ?>
                                                            <tr <?php
                                                    if ($i % 2 == 0) {
                                                        echo 'class="tr_stl tr-bg"';
                                                    } else {
                                                        echo 'class="tr_stl"';
                                                    }
                                                            ?>  >
                                                                <td><?= $i ?></td>
                                                                <td><?= $result['date'] ?></td>  
                                                                <td><?= $result['client_user_id'] ?></td>                                                       
                                                                <td><?= $result['client_name'] ?></td>
                                                                <td><?= $result['invoice_id'] ?></td>                                                       

                                                                <td><?= $result['product_user_id'] ?></td>                                                       
                                                                <td><?= $result['product_description'] ?></td> 
                                                                <td><?= $result['sales_representative_user_id'] ?></td>                                                       
                                                                <td><?= $result['brand_user_id'] ?></td> 
                                                                <td><?= $result['quantity'] ?></td>
                                                                <td><?= $result['price'] ?></td>                                                       
                                                                <td><?= $result['total'] ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr><td colspan="9">
                                                                <div class="alert alert-success alert-dismissable">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                                    No Records Found
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>                                               
                                                </tbody>                                              
                                            </table>
                                        </div>
                                        <div class="col-md-12" style="text-align:center;">
                                            <nav>
                                                <?php echo $this->pagination->create_links(); ?>
                                            </nav>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="order-footer-btn">
                                                    <div class="input-link-report"><p>Download as</p></div>
    <!--                                                <button class="report-file-dtn rfile-btn" type="submit" name="download_pdf" value="PDF"><span class="icon-file-pdf pdf-icon"></span>pdf</button>-->
                                                    <button class="report-file-dtn rfile-btn" type="submit" name="excel" value="excel"><span class="icon-file-excel pdf-icon"></span>Excel</button>
                                                    <button class="report-file-dtn rfile-btn" type="submit" name="print_pdf" value="PDF">Print Pdf <i class="glyphicon glyphicon-file"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    </form>
                </div>
                <!--footer-->
                <?php $this->load->view('includes/footer'); ?>
            </div>
            <!-- Classie -->
            <link href="<?php echo base_url(); ?>assets/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
            <script src="<?php echo base_url(); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/autocomplete/jquery.autocomplete.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {

                    // 2015 - 01 - 06
                    $('.birthday').datepicker({format: 'yyyy-mm-dd'});

                    // $('.birthday').datepicker({format: 'mm-yyyy'});

                });
            </script>
            <script type="text/javascript">

                $('.search_report').change(function (e) {
                    e.preventDefault();
                    $("#ajax_search_sales").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
                    // $("#ldi").show();
                    $.post('<?= site_url('sales/ajax_search_report_sales') ?>', $('#search_form').serialize(), function (data) {
                        $("#ajax_search_sales").html(data);
                        //$("#ldi").hide();

                    });
                });
                $('#search_submit').click(function (e) {
                    e.preventDefault();

                    if ($("#date_from").val() != '' && $("#date_to").val() == '') {
                        alert("Please Select To date");
                        $("#date_to").focus();
                        return false;
                    }
                    if ($("#date_from").val() == '' && $("#date_to").val() != '') {
                        alert("Please Select From date");
                        $("#date_from").focus();
                        return false;
                    }
                    $("#ajax_search_sales").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
                    // $("#ldi").show();
                    $.post('<?= site_url('sales/ajax_search_report_sales') ?>', $('#search_form').serialize(), function (data) {
                        $("#ajax_search_sales").html(data);
                        //$("#ldi").hide();

                    });
                });


                $(".pagination a").click(function (e) {
                    e.preventDefault();
                    // $("#ajax_search_sales").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
                    $.ajax({
                        type: "POST",
                        url: $(this).attr("href"),
                        success: function (data) {
                            $("#ajax_search_sales").html(data);
                        }
                    });
                    return false;
                });

            </script>
    </body>
</html>