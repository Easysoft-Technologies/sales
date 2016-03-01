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
                <?php echo form_open('invoice/ajax_search_report_invoice', array('class' => 'form-horizontal', 'id' => 'search_form')); ?>
                <div class="main-page">                      
                    <div class="admin-right-cnt">	
                        <div class="row ">
                            <div class="col-md-12"><div class="admin-order"><p>Sales</p></div>
                            </div>
                            <div class="clearfix"></div>
                            <?php
                             if ($this->session->userdata('user_type') == '1') {
                            ?>
                            <div class="col-md-4">
                                <div class="admin-select-box">                                    
                                    <select  name="user" class="search_report admin-slct">
                                        <option value="0">Sales Representative Id</option>
                                        <?php
                                        $condition = array('users_id' => $this->session->userdata('users_id'));
                                        $sales_representative_id = $this->obj_sales_representative->get_field_data($condition, 'id');
                                        if ($this->session->userdata('user_type') == '2') {
                                            $condition = array('id' => $sales_representative_id);
                                            echo $this->obj_common->display_select('sales_representative', $condition, 'sales_representative_user_id', 'desc', $sales_representative_id, 'id', 'sales_representative_user_id');
                                        } else {
                                            $condition = array();
                                            echo $this->obj_common->display_select('sales_representative', $condition, 'sales_representative_user_id', 'desc', '', 'id', 'sales_representative_user_id');
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <?php
                             }
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
                            <div class="col-md-4">
                                <div class="admin-select-box">
                                    <input name="invoice_id" type="text" class="admn-right-form" placeholder="Invoice Number">
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="admin-select-box">
                                    <input name="from_date" type="text" class="birthday admn-right-form" placeholder="From Date"  id="date_from">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="admin-select-box">
                                    <input name="to_date"  type="text" class="birthday admn-right-form" placeholder="To Date" id="date_to">
                                </div>
                            </div>

                            <!--                            <div class="col-md-4">
                                                            <input type="button" value="submit" class="admin-right-submit" id="search_submit">
                                                        </div>-->

                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 inbox-btncol6"><input type="submit" value="submit" class="admin-right-submit" id="search_submit"></div>

                                    <div class="col-md-6 inbox-btncol6"> <div class="input-link link-btn"><a href="<?= site_url('invoice/add') ?>">New Order</a></div></div>
                                </div>
                            </div>

                        </div>
                    </div><!--bg-color-div-end------>
                    <div class="admin-right-cnt">	
                        <div class="row">
                            <div class="col-md-12"><div class="admin-order"><p>order list</p></div></div>
                            <div class="col-md-12">
                                <div id="ajax_search_invoice">
                                    <div class="table-responsive">
                                        <form class="form-horizontal" role="form">
                                            <table class="table table-striped table-bordered table-center" cellspacing="0" width="100%" id="shop_list">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Order No</th>
                                                        <th>Date</th>
                                                        <th>Client ID</th>
                                                        <th>Sales Representative ID</th>                                                      
                                                        <th>Total Amount</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <?php
                                                    $i = $row;
                                                    //$per_page
                                                    $invoice_count = count($invoice);
                                                    if ($invoice) {
                                                        foreach ($invoice as $result) {
                                                            $i++;
                                                            ?>
                                                            <tr cust_id="233" <?php
                                                            if ($i == 1) {
                                                                echo 'class="active"';
                                                            }
                                                            ?>>
                                                                <td><?= $i ?></td>
                                                                <td><?= $result['invoice_id'] ?></td>                                                       
                                                                <td><?= $result['date'] ?></td>
                                                                <td><?= $result['client_user_id'] ?></td>    
                                                                <td><?= $result['sales_representative_user_id'] ?></td>                                              
                                                                <td><?= $result['total_price'] ?></td>   

                                                                <td><a rel="<?= site_url('invoice/model_report_list/' . $result['order_url']) ?>"   data-toggle="modal" data-target=".modal"><span class="icon-file table-icon" ></span></a></td>

                        <!--                                                            <td><a href="<?= site_url('invoice/model_report_list/' . $result['order_url']) ?>" data-toggle="modal" data-target=".modal" ><span class="glyphicon  icon-doc"></span></a></td>-->
                                                                <td><a href="<?= site_url('invoice/delete/' . $result['order_url'] . '/' . $row) ?>" ><i class="glyphicon glyphicon-trash"></i></a></td>
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

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                </form>
            </div>

            <!-----table popup-------->  
            <div id="myModalorder" tabindex="-1" class="modal fade report-fade-bg" role="dialog">
                <div class="modal-dialog ">
                    <!-- Modal content-->
                    <div class="modal-content order-popup-bg">
                        <div class="modal-header order-popup-hd ">
                            <button type="button" class="close close1" data-dismiss="modal">&times;</button>
                            <h4>Order Details</h4>
                        </div>
                        <div class="modal-body ">


                        </div>
                    </div>
                </div>
            </div>
            <!-----table popup--end------>   
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

            });
        </script>

        <script type="text/javascript">

            $('a[data-toggle="modal"]').on('click', function (e) {
                e.preventDefault();
                $("#myLargeModalLabel").html('Edit Product');
                var target_modal = $(e.currentTarget).data('target');
                // also get the remote content's URL
                var remote_content = e.currentTarget.rel;
                var modal = $(target_modal);
                // Find the modal's <div class="modal-body"> so we can populate it
                var modalBody = $(target_modal + ' .modal-body');
                modal.on('show.bs.modal', function () {
                    modalBody.load(remote_content);
                }).modal();
                return false;
            });

            $('#model_add_product').on('hidden.bs.modal', function () {
                location.reload();
            })


            $('.search_report').change(function (e) {
                e.preventDefault();
                $("#ajax_search_invoice").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
                // $("#ldi").show();
                $.post('<?= site_url('invoice/ajax_search_report_invoice') ?>', $('#search_form').serialize(), function (data) {
                    $("#ajax_search_invoice").html(data);
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
                $("#ajax_search_invoice").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
                // $("#ldi").show();
                $.post('<?= site_url('invoice/ajax_search_report_invoice') ?>', $('#search_form').serialize(), function (data) {
                    $("#ajax_search_invoice").html(data);
                    //$("#ldi").hide();

                });
            });
            $(".pagination a").click(function (e) {
                e.preventDefault();
                $("#ajax_search_invoice").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
                $.ajax({
                    type: "POST",
                    url: $(this).attr("href"),
                    success: function (data) {
                        $("#ajax_search_invoice").html(data);
                    }
                });
                return false;
            });


        </script>
    </body>
</html>