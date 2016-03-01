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
    <div class="modal fade" id="upload"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="fa fa-remove"></span></button>
                    <h4 class="modal-title" id="myModalLabel">Upload invoice Report</h4>
                </div>
                <div class="modal-body">
                    <?php
                    $attributes = array('class' => 'upload_csv', 'id' => 'upload_csv', 'name' => 'upload_csv');
                    echo form_open_multipart('invoice/import_csv', $attributes);
                    ?>
                    <div class="form-group">
                        ( maximum file upload size 2 Mb width )
                        <input  class="new-order-form"  type="file" name="image" id="exampleInputFile" class="new-order-form" ><br/>
                        <button type="submit" class="btn btn-default" id="submit_upload">Submit</button>
                        <div id="display_upload"><br/>
                        </div>
                    </div>
                </div>
                </form>      

                <div class="modal-footer">

                </div>
            </div>

        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Format</h4>
                </div>
              
                      <div class="modal-body">
                        <div class="col-mod-8">
                            <h4 class="pull-right">Total Amount: 2,000</h4>
                            
                        </div>
                        <h4>Order ID: INV-0112</h4>
                        <p class="pull-right">Date: 11-Jan-2016</p>
                        <p>User's ID: User 1</p>
                        
                        <p class="pull-right">Shop Name: Shop 1</p>
                        <p>User's Name: Test User</p>
                        
                        
                        <hr>

                        <h4>Order Descriptions</h4>
                        <p>
                        <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="shop_list">

                            <thead>
                                <tr>
                                    <th width="15%">No</th>
                                    <th>Brand Name</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>                                                    

                                <tr cust_id="233">
                                    <td>1</td>
                                    <td>Test Brand</td>
                                    <td>Test Product</td>
                                    <td>1</td>
                                    <td>1000</td>
                                </tr>
                                <tr cust_id="233">
                                    <td>2</td>
                                    <td>Test Brand 1</td>
                                    <td>Test Product with test</td>
                                    <td>1</td>
                                    <td>1000</td>
                                </tr>
                                
                                <tr>
                                    <td colspan="4"><h4><b>Grand Total</b></h4></td>
                                    <td colspan="1"><h4><b>5500</b></h4></td>
                                </tr>

                            </tbody>                                              

                        </table>
                        </p>
                    </div>
             
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
                            <h2><strong>invoice</strong></h2>
                            <div class="additional-btn">
                                <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                                <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>

                            </div>
                        </div>
                        <div class="widget-content padding">



                            <div class="row">

                                <a href="" data-toggle="modal" data-target=".bs-example-modal-lg">Click here</a>

                                <div class="col-sm-3">
                                    <a href="#" data-toggle="modal"  data-target="#upload">Upload</a>
<!--                                    <a href="<?php echo site_url('invoice/add'); ?>" class="btn btn-success pull-right">Upload File</a>-->
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                            <br>
                            <div id="ajax_search_invoice">
                                <div class="table-responsive">

                                    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="invoice_list">

                                        <thead>
                                            <tr>

                                                <th>Imported Date</th>
                                                <th>No. of Records</th>
                                                <th>Download File</th>
                                                <th>View / Delete</th>
                                            </tr>
                                        </thead>

                                        <tbody>                                                    
                                            <?php
                                            $i = 0;
                                            //$per_page
                                            $invoice_count = count($invoice);
                                            if ($invoice) {
                                                foreach ($invoice as $result) {
                                                    $i++;
                                                    ?>
                                                    <tr  >
                                                        <td><?= date('d-M-Y',$result['invoice_created_date']) ?></td>                                                       
                                                        <td><?= $result['invoice_no_of_records'] ?></td>                                                 
                                                        <td><a href="<?= site_url('invoice/download_document/' . $result['invoice_url']) ?>"><i class="glyphicon glyphicon-download-alt"></i></a></td>                                                       
                                                        <td><a href="<?= site_url('invoice/view/' . $result['invoice_url'] . '/' . $row) ?>"><i class="glyphicon glyphicon-list-alt"></i></a> / 
                                                            <a href="<?= site_url('invoice/delete/' . $result['id'] . '/' . $row) ?>" onClick="return confirm('Do you want to delete this record ?');"><i class="glyphicon glyphicon-trash"></i></a>
                                                        </td>                                                       
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
                                        </tbody> 
                                    </table>
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