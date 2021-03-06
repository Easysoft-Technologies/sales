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
                <?php echo form_open('sales/report', array('class' => 'form-horizontal', 'id' => 'search_form')); ?>
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
                                    <input name="invoice_id" type="text" class="admn-right-form" placeholder="Invoice Number">
                                </div>
                            </div>  
                            <div class="clearfix"></div>
                            <?php
                           // display_checkbox_list($table, $condition = array(), $order_by_fieled = '', $order_by_type = "desc", $select_name = '', $select_id = '', $select_value = '', $option_name) {
                           //echo $this->obj_common->display_checkbox_list('sales_report_display','' , '','', '', 'id',  'name', 'sort_checkbox[]')
                                ?>
                        
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
                                                <button class="report-file-dtn rfile-btn" type="submit" name="download_pdf" value="PDF"><span class="icon-file-pdf pdf-icon"></span>pdf</button>
                                                <button class="report-file-dtn rfile-btn" type="submit" name="excel" value="excel"><span class="icon-file-excel pdf-icon"></span>Excel</button>
                                                <button class="btn btn-primary" type="submit" name="print_pdf" value="PDF">Print Pdf <i class="glyphicon glyphicon-file"></i></button>
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
               // $('.birthday').datepicker({format: 'yyyy-mm-dd'});
               
               $('.birthday').datepicker({format: 'mm-yyyy'});

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