<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('software_title'); ?></title>   
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" content="">
        <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
        <meta name="author" content="Huban Creative">  
        <?php
        $this->load->view('header');
        ?>
        <!-- Modal -->
    <div class="content-page">
        <!-- ============================================================== -->
        <!-- Start Content here -->
        <!-- ============================================================== -->
        <div class="content">
            <!-- Page Heading Start -->

            <!-- Page Heading End-->				<!-- Your awesome content goes here -->
            <div class="row">
                <div class="col-md-12">
                    <?php echo form_open('invoice/report', array('class' => 'form-horizontal', 'id' => 'search_form')); ?>
                    <div class="widget">
                        <div class="widget-header">
                            <?php
                            $condition_report = array('id' => $report_type);
                            $report_name = $this->obj_common->get_field_data('invoice_report_type', $condition_report, 'name');
                            ?>
                            <h2><strong>Reports - <?= $report_name ?></strong></h2>
                            <div class="additional-btn">
                                <a href="<?= site_url('invoice') ?>" ><i class="icon-ccw-1">back</i></a>
                            </div>
                        </div>
                        <div class="widget-content padding">
                            <div class="row">
                                <div class="col-sm-3">
                                    <select class="search_report form-control" name="user">
                                        <option value="0">invoice Representative Id</option>
                                        <?php
                                        $condition = array();
                                        echo $this->obj_common->display_select('invoice_representative', $condition, 'invoice_representative_user_id', 'desc', '', 'invoice_representative_user_id', 'invoice_representative_user_id');
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="search_report form-control" name="client">
                                         <option value="0">Client Id</option>
                                        <?php
                                        $condition = array();
                                        echo $this->obj_common->display_select('client', $condition, 'client_name', 'desc', '', 'client_user_id', 'client_user_id');
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="search_report form-control" name="brand">
                                        <option value="0">Select Brand</option>
                                        <?php
                                        $condition = array();
                                        echo $this->obj_common->display_select('brand', $condition, 'brand_name', 'desc', '', 'brand_user_id', 'brand_user_id');
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <input name="from_date"   type="text" class="birthday form-control"  placeholder="Date From">
                                </div>
                                <div class="col-sm-3">
                                    <input name="to_date"  type="text" class="birthday form-control" value="" placeholder="Date To">
                                </div>
                                <div class="col-sm-3">
                                    <input name="invoice_id" id="search" type="text" class="form-control" value="" placeholder="Invoice Id">
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary" type="button" id="search_submit">Search</button>
                                </div>
                            </div>
                        </div>


                        <div class="widget-content padding">

                            <div id="ajax_search_invoice">
                                <div class="table-responsive">
                                    <table class="table table-bordered" cellspacing="0" width="100%">                                                
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Date</th>
                                                <th>Customer ID</th>
                                                <th>Customer Name</th>
                                                <th>Invoice/CM</th>
                                                <th>Quantity</th>
                                                <th>Product ID</th>
                                                <th>Description</th>
                                                <th>invoice Representative ID</th>
                                                <th>Brand Name</th>
                                                <th>Unit Price</th>
                                                <th>Total</th>
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
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $result['date'] ?></td>  
                                                        <td><?= $result['client_user_id'] ?></td>                                                       
                                                        <td><?= $result['client_name'] ?></td>
                                                        <td><?= $result['invoice_id'] ?></td>                                                       
                                                        <td><?= $result['quantity'] ?></td>
                                                        <td><?= $result['product_user_id'] ?></td>                                                       
                                                        <td><?= $result['product_description'] ?></td> 
                                                        <td><?= $result['invoice_representative_user_id'] ?></td>                                                       
                                                        <td><?= $result['brand_user_id'] ?></td> 
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
                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <?php echo $this->pagination->create_links(); ?>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-8">
                                        <h4>
                                            <button class="btn btn-primary" type="submit" name="download_pdf" value="PDF">Pdf <i class="glyphicon glyphicon-file"></i></button>
                                            <button class="btn btn-primary" type="submit" name="print_pdf" value="PDF">Print Pdf <i class="glyphicon glyphicon-file"></i></button>
                                            <button class="btn btn-primary" name="excel" value="excel">Excel <span class="fa fa-calendar"></span></button>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- Footer Start -->
            <?php
            $this->load->view('footer');
            ?> 
            <!-- Footer End -->			
        </div>
        <!-- ============================================================== -->
        <!-- End content here -->
        <!-- ============================================================== -->
    </div>
    <!-- End right content -->
</div>
<!-- End of page -->
<!-- the overlay modal element -->
<div class="md-overlay"></div>
<!-- End of eoverlay modal -->
<script>
    var resizefunc = [];
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>assets/libs/jquery/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/jquery-detectmobile/detect.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/jquery-animate-numbers/jquery.animateNumbers.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/ios7-switch/ios7.switch.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/fastclick/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/jquery-blockui/jquery.blockUI.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/bootstrap-bootbox/bootbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/jquery-sparkline/jquery-sparkline.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/nifty-modal/js/classie.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/nifty-modal/js/modalEffects.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/sortable/sortable.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/bootstrap-fileinput/bootstrap.file-input.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/bootstrap-select2/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/libs/pace/pace.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/jquery-icheck/icheck.min.js"></script>
<!-- Demo Specific JS Libraries -->
<script src="<?php echo base_url(); ?>assets/libs/prettify/prettify.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/jquery-notifyjs/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/jquery-notifyjs/styles/metro/notify-metro.js"></script>
<script src="<?php echo base_url(); ?>assets/js/init.js"></script>        <!-- Page Specific JS Libraries -->
<script src="<?php echo base_url(); ?>assets/libs/jquery-datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/jquery-datatables/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/datatables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/autocomplete/jquery.autocomplete.js"></script>

<script type="text/javascript">
//            $(document).ready(function () {
//                
//            });
</script>

<script type="text/javascript">
    $(document).ready(function () {

2015-01-06
        $('.birthday').datepicker({format: 'yyyy-mm-dd'});

    });
</script>
<script type="text/javascript">

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
        $("#ajax_search_invoice").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
        // $("#ldi").show();
        $.post('<?= site_url('invoice/ajax_search_report_invoice') ?>', $('#search_form').serialize(), function (data) {
            $("#ajax_search_invoice").html(data);
            //$("#ldi").hide();

        });
    });


    $(".pagination a").click(function (e) {
        e.preventDefault();
        // $("#ajax_search_invoice").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
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