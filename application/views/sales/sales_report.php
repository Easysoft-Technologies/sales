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
                <?php echo form_open('sales/sales_report', array('class' => '', 'id' => 'search_form','method'=>'get')); ?>
                <div class="main-page">
                    <div class="admin-right-cnt">	
                        <div class="row ">
                            <div class="col-md-12"><div class="admin-order"><p>Report</p></div>
                            </div>
                            <div class="clearfix"></div>
                            <?php
                            if ($report_type == 1) {
                                ?>
                                <div class="col-md-4">
                                    <div class="admin-select-box">                                    
                                        <select  name="user" class="search_report admin-slct">
                                            <option value="0">Sales Representative Id</option>
                                            <?php
                                            $condition = array();
                                            echo $this->obj_common->display_select('sales_representative', $condition, 'sales_representative_user_id', 'desc', '', 'id', 'sales_representative_user_id');
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <?php
                            }
                            if ($report_type == 3) {
                                ?>
                                <div class="col-md-4">
                                    <div class="admin-select-box">
                                        <select class="search_report admin-slct" name="client">
                                            <option value="0">Client Id</option>
                                            <?php
                                            $condition = array();
                                            echo $this->obj_common->display_select('client', $condition, 'client_name', 'desc', '', 'id', 'client_user_id');
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <?php
                            }
                            if ($report_type == 2) {
                                ?>
                                <div class="col-md-4">
                                    <div class="admin-select-box">
                                        <select class="search_report admin-slct" name="brand">
                                            <option value="0">Select Brand</option>
                                            <?php
                                            $condition = array();
                                            echo $this->obj_common->display_select('brand', $condition, 'brand_name', 'desc', '', 'id', 'brand_user_id');
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
    
                            $month_array = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
                            ?>
                            <div class="col-md-4">
                                <div class="admin-select-box">
                                    <select class="search_report admin-slct" name="from_month" required="">
                                        <option value="">From Month</option>
                                        <?php
                                        for ($i = 1; $i <= 12; $i++) {
                                            ?>
                                            <option value="<?= $i ?>"><?= $month_array[$i] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="admin-select-box">
                                    <select class="search_report admin-slct" name="to_month" required="">
                                        <option value="">To Month</option>                                    
                                        <?php
                                        for ($i = 1; $i <= 12; $i++) {
                                            ?>
                                            <option value="<?= $i ?>"><?= $month_array[$i] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                     <input type="hidden" name="search_report_type" value="<?= $report_type ?>" id="search_report_type">
<!--                                    <input name="to_date"  type="text" class="birthday admn-right-form" placeholder="To Date" id="date_to">-->
                                </div>
                            </div>


                        </div>
                        <div class="row">


                            <?php
                            // display_checkbox_list($table, $condition = array(), $order_by_fieled = '', $order_by_type = "desc", $select_name = '', $select_id = '', $select_value = '', $option_name) {
                            //echo $this->obj_common->display_checkbox_list('sales_report_display','' , '','', '', 'id',  'name', 'sort_checkbox[]')
                            ?>
                            <?php
                            $start_year = 2010;
                            $end_year = date('Y') + 2;
                            ?>
                            <div class="col-md-4">
                                <div class="admin-select-box">
                                    <select class="search_report admin-slct" name="year" required="">
                                        <option value="">Year</option>                                    
                                        <?php
                                        for ($i = $start_year; $i <= $end_year; $i++) {
                                            ?>
                                            <option value="<?= $i ?>"><?=$i?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
<!--                                    <input name="to_date"  type="text" class="birthday admn-right-form" placeholder="To Date" id="date_to">-->
                                </div>
                            </div>
                            <div class="col-md-8">
                                <input type="submit" value="submit" class="admin-right-submit" style=" margin-top: 0px;"  name="print_pdf" >
                            </div>
                        </div>
                    </div><!--bg-color-div-end------>
                    <div class="admin-right-cnt">	
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $condition_report = array('id' => $report_type);
                                $report_name = $this->obj_common->get_field_data('sales_report_type', $condition_report, 'name');
                                ?>
                                <div class="admin-order"><p>Reports - <?= $report_name ?></p></div>
                                <!--                                <div class="order-menu right-sife-serch">
                                                                    <div class="input-group">
                                                                        <input type="text"  name="search_report_name"  id="search_report_name" class="form-control report-form"  placeholder="<?= $report_name ?> ID">
                                                                        <input type="hidden" name="search_report_type" value="<?= $report_type ?>" id="search_report_type">
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-default report-btn" type="button" id="search_report">Search</button>
                                                                        </span>
                                                                    </div> /input-group 
                                                                </div>-->

                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row report-page-toppdng">
                            <div class="col-md-12">
                                <div id="ajax_search_sales">
                                    <div class="table-responsive">          
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
<!--                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="order-footer-btn">
                                                <div class="input-link-report"><p>Download as</p></div>
                                                <button class="report-file-dtn rfile-btn" type="submit" name="download_pdf" value="PDF"><span class="icon-file-pdf pdf-icon"></span>pdf</button>
                                                <button class="report-file-dtn rfile-btn" type="submit" name="excel" value="excel"><span class="icon-file-excel pdf-icon"></span>Excel</button>
                                                <button class="report-file-dtn rfile-btn" type="submit" name="print_pdf" value="PDF">Print Pdf <i class="glyphicon glyphicon-file"></i></button>
                   
                                            </div>
                                        </div>
                                    </div>        -->
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
        <!-- Classie -->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#search_report_name").autocomplete('<?php echo site_url('sales/autocomplete/' . $report_type); ?>', {
                    minChars: 2
                });
            });
        </script>
        <script type="text/javascript">
            $("form#upload_csv").submit(function () {
                // $("#display_upload1").append('<img src="<?= base_url() ?>images/loader.gif" style="height: 100px; width: 100px;"  alt="" />');
                $("#display_upload").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: '<?php echo site_url('sales/import_csv'); ?>',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        $("#display_upload").html(data);
                        // $('#exampleInputFile').val('');
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

                return false;
            });
            $('#upload').on('hidden.bs.modal', function () {
                location.reload();
            })
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
            $("#search_report").click(function (e) {
                e.preventDefault();
                var search_report_name = $("#search_report_name").val();
                var search_report_type = $("#search_report_type").val();
                $("#ajax_search_sales").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    data: {'search_report_name': search_report_name, 'search_report_type': search_report_type},
                    url: '<?= site_url('sales/ajax_search_report_sales') ?>',
                    success: function (data) {
                        $("#ajax_search_sales").html(data);
                    }

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
            function update_status(cat_id, status)
            {
                var status_type;
                if (status == 'N') {
                    status_type = 'Deactivate';
                } else
                {
                    status_type = 'Activate';
                }
                if (confirm('Are you sure you want to  ' + status_type)) {
                    $.ajax({
                        type: "POST",
                        dataType: 'html',
                        url: '<?= site_url('sales/update_status') ?>',
                        data: {'id': cat_id, 'sales_status': status},
                        success: function (users) {
                            //location.href="<?= base_url() ?>admin/sales",'refresh';
                        }
                    });
                }
            }
        </script>
    </body>
</html>