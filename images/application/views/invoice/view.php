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
                    <div class="widget">
                        <div class="widget-header">
                            <h2><strong>Details of file: <?=$invoice_document_name?></strong></h2>
                            <div class="additional-btn">
                                <a href="<?=site_url('invoice')?>" ><i class="icon-ccw-1">back</i></a>
                               
                            </div>
                        </div>
                        <div class="widget-content padding">
                            <br>
                            <div id="ajax_search_invoice">
                                <div class="table-responsive">
                                    <form class="form-horizontal" role="form">
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
                                                  <tbody>                                                    
                                <?php
                                $i = $row;
                                //$per_page
                                $invoice_count = count($invoice);
                                if ($invoice) {
                                    foreach ($invoice as $result) {
                                        $i++;
                                        ?>
                                                                                            <tr  >
                                                                                                <td><?=$i?></td>
                                                                                                <td><?= $result['submitted_date'] ?></td>  
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
                                    <?php
                                }
                                ?>
                                                                                         <tr>
                                                   
                                                </tr>
                                                                        </tbody> 
                                               
                                              
                                            </tbody>                                                                                            
                                        </table>

                                    </form>
                                </div>
                                    <div class="box-footer clearfix">
                                                                        <ul class="pagination pagination-sm no-margin pull-right">
                                <?php echo $this->pagination->create_links(); ?>
                                                                        </ul>
                                                                    </div>
                                </div>
                        </div>
                    </div>
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
<!--        <script src="<?php echo base_url(); ?>assets/libs/jquery-icheck/icheck.min.js"></script>-->
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
    $("form#upload_csv").submit(function () {
        // $("#display_upload1").append('<img src="<?= base_url() ?>images/loader.gif" style="height: 100px; width: 100px;"  alt="" />');
        $("#display_upload").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '<?php echo site_url('invoice/import_csv'); ?>',
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
    function change(search_invoice_name)
    {
        //var search_invoice_name = $("#search_invoice_name").val();       
        $("#ajax_search_invoice").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
        if (search_invoice_name) {
            $.ajax({
                type: "POST",
                dataType: 'html',
                data: {'search_invoice_name': search_invoice_name},
                url: '<?= site_url('invoice/ajax_search_invoice_name') ?>',
                success: function (data) {

                    $("#ajax_search_invoice").html(data);
                }

            });

        } else
        {
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: '<?= site_url('invoice/ajax_search_invoice_name') ?>',
                success: function (data) {

                    $("#ajax_search_invoice").html(data);
                }

            });

        }
    }
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
                url: '<?= site_url('invoice/update_status') ?>',
                data: {'id': cat_id, 'invoice_status': status},
                success: function (users) {
                    //location.href="<?= base_url() ?>admin/invoice",'refresh';
                }
            });
        }
    }
</script>
</body>
</html>