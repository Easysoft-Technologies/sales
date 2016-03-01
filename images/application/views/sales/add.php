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

            <div class="content-page">                
                <div class="content">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="widget">


                                <div class="widget-header">
                                    <h2><strong>Create sales</strong></h2>
                                    <div class="additional-btn">
                                        <ol class="breadcrumb">
                                            <li><i class="glyphicon glyphicon-globe"></i> <a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>

                                            <li><a href="<?php echo site_url('sales'); ?>">sales</a></li>
                                            <li class="current">Create sales</li>
                                        </ol> 
                                    </div>
                                </div>

                                <div class="widget-content padding">

                                    <?php echo form_open('sales/add', array('class' => 'form-horizontal', 'id' => 'createCustomerForm')); ?>

                                    <div class="row">
                                        <h5 class="bg-darkblue-3 text-white-1" style="padding: 10px;"><strong>Customer Details</strong></h5>
                                    </div>


                                    <div class="form-group">                                        
                                        <label  class="col-md-2">sales Name</label>
                                  
                                           <div class="col-md-3">
                                            <input name="sales_document_name" id="sales_document_name" type="text" class="new-order-form" value="<?=set_value('sales_document_name')?>">
                                             <?php echo form_error('sales_document_name', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                
                                    </div>
                                    
                                             <div class="form-group">                                        
                                        <label  class="col-md-2">sales Id</label>
                                  
                                           <div class="col-md-3">
                                            <input name="sales_id" id="sales_id" type="text" class="new-order-form" value=""<?=set_value('sales_id')?>">
                                             <?php echo form_error('sales_id', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                
                                    </div>
                                             <div class="form-group">                                        
                                        <label  class="col-md-2">sales Address</label>
                                  
                                           <div class="col-md-3">
                                             <textarea class="new-order-form" name="sales_address" style="height: 140px; resize: none;" ><?=set_value('sales_address')?></textarea>

                                             <?php echo form_error('sales_address', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                
                                    </div>
                                  
                                    <div class="form-group">

                                        <label  class="col-md-2"></label>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary">Save </button>
                                        </div>
                                    </div>

                                    <?php echo form_close(); ?>

                                </div>
                            </div>


                        </div>
                    </div>

                    <?php $this->load->view('footer'); ?>			
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
            var resizefunc = [];</script>
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

        <script src="<?php echo base_url(); ?>assets/libs/sortable/sortable.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap-fileinput/bootstrap.file-input.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap-select2/select2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/libs/pace/pace.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jquery-icheck/icheck.js"></script>

        <!-- Demo Specific JS Libraries -->
        <script src="<?php echo base_url(); ?>assets/libs/prettify/prettify.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/init.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap-validator/js/bootstrapValidator.min.js"></script>

        <script type="text/javascript">
            //EXAMPLE REGISTER FORM
            $('#createCustomerForm').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    name: {
                        message: 'The Name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Name is required and can\'t be empty'
                            }

                        }
                    },
                    phone: {
                        message: 'The Phone is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Phone is required and can\'t be empty'
                            }

                        }
                    },
                    email: {
                        message: 'The Email is not valid',
                        validators: {
                            emailAddress: {
                                message: 'The input is not a valid email address'
                            },
                            notEmpty: {
                                message: 'The Email is required and can\'t be empty'
                            }

                        }
                    }

                }
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {


                $('#dob').datepicker({
                    format: 'yyyy-mm-dd'
                }).on('changeDate', function (ev) {

                    var dateString = $('#dob').val();
                    var today = new Date();
                    var birthDate = new Date(dateString);
                    var age = today.getFullYear() - birthDate.getFullYear();
                    var m = today.getMonth() - birthDate.getMonth();
                    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                        age--;
                    }
                    $('#age').val(age);
                });


                $('#age').click(function () {
                    var dateString = $('#dob').val();
                    var today = new Date();
                    var birthDate = new Date(dateString);
                    var age = today.getFullYear() - birthDate.getFullYear();
                    var m = today.getMonth() - birthDate.getMonth();
                    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                        age--;
                    }
                    $('#age').val(age);
                });

                var clien_type = $('#sales_type').val();
                if (clien_type == 1) {
                    $('.ext_sales').hide();
                    $('.ext_lead').hide();
                }

                if (clien_type == 2) {
                    $('.ext_lead').hide();
                    $('.ext_sales').show();
                }
                if (clien_type == 3) {
                    $('.ext_lead').show();
                    $('.ext_sales').hide();
                }

                $('#sales_type').change(function () {

                    $(':input', '#createCustomerForm')
                            .not(':button, :submit, :reset, :hidden,#sales_type,#select_sales,#select_lead')
                            .val('')
                            .removeAttr('checked')
                            .removeAttr('selected');
                    $('#is_nri').iCheck('uncheck');

                    var clien_type = $('#sales_type').val();

                    if (clien_type == 1) {
                        $('.ext_sales').hide();
                        $('.ext_lead').hide();

                        $.get('<?php echo site_url('contact/generate_sales_id_json'); ?>', function (data) {

                            result = $.parseJSON(data);

                            $('#sales_id').val(result);
                        });
                    } else if (clien_type == 2) {

                        $('.ext_sales').show();
                        $('.ext_lead').hide();

                        $.get('<?php echo site_url('contact/generate_sales_id_json'); ?>', function (data) {

                            result = $.parseJSON(data);

                            $('#sales_id').val(result);
                        });


                    } else {
                        $('.ext_sales').hide();
                        $('.ext_lead').show();
                    }
                });
                $('#select_sales').change(function () {

                    var contact_id = $('#select_sales').val();
                    $.get('<?php echo site_url('contact/get_contact_json'); ?>/' + contact_id, function (data) {

                        $(':input', '#createCustomerForm')
                                .not(':button, :submit, :reset, :hidden,#sales_type,#select_sales')
                                .val('')
                                .removeAttr('checked')
                                .removeAttr('selected');
                        $('#is_nri').iCheck('uncheck');

                        var result = $.parseJSON(data);
                        $.each(result, function (index, value) {

                            if (index === 'is_nri') {
                                if (value === '1') {
                                    $('#is_nri').iCheck("check");
                                }
                            } else {

                                console.log();

                                if (index == 'dob') {
                                    $('#' + index).val(value);
                                } else {
                                    $('#' + index).val(value);
                                }
                            }
                        });
                    });
                });
                
                
                
                
                $('#select_lead').change(function () {

                    var contact_id = $('#select_lead').val();
                    $.get('<?php echo site_url('contact/get_contact_json'); ?>/' + contact_id, function (data) {

                        $(':input', '#createCustomerForm')
                                .not(':button, :submit, :reset, :hidden,#sales_type,#select_sales,#select_lead')
                                .val('')
                                .removeAttr('checked')
                                .removeAttr('selected');
                        $('#is_nri').iCheck('uncheck');

                        var result = $.parseJSON(data);
                        $.each(result, function (index, value) {

                            if (index === 'is_nri') {
                                if (value === '1') {
                                    $('#is_nri').iCheck("check");
                                }
                            } else {

                             
                                if (index == 'dob') {
                                    $('#' + index).val(value);
                                } else {
                                    $('#' + index).val(value);
                                }
                            }
                        });
                    });
                });
                
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.button-menu-mobile').click(function () {
                    var vals = 1;
                    if ($('#wrapper').hasClass('enlarged')) {
                        vals = 0;
                    }
                    $.post('<?php echo site_url('settings/change_left_navigation'); ?>/' + vals);
                });
            });
        </script>


    </body>
</html>