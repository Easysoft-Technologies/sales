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
                <?php echo form_open('sales/report', array('class' => '', 'id' => 'search_form')); ?>
                <div class="main-page">

                    <div class="admin-right-cnt">	
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $condition_report = array('id' => $report_type);
                                $report_name = $this->obj_common->get_field_data('sales_report_type', $condition_report, 'name');
                                ?>
                                <div class="admin-order"><p>Reports - <?= $report_name ?></p></div>
                                <div class="order-menu right-sife-serch">
                                    <div class="input-group">
                                        <input type="text"  name="search_report_name"  id="search_report_name" class="form-control report-form"  placeholder="<?= $report_name ?> ID">
                                        <input type="hidden" name="search_report_type" value="<?= $report_type ?>" id="search_report_type">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default report-btn" type="button" id="search_report">Search</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>

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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="order-footer-btn">
                                                <div class="input-link-report"><p>Download as</p></div>
                                                <button class="report-file-dtn rfile-btn" type="submit" name="download_pdf" value="PDF"><span class="icon-file-pdf pdf-icon"></span>pdf</button>
                                                <button class="report-file-dtn rfile-btn" type="submit" name="excel" value="excel"><span class="icon-file-excel pdf-icon"></span>Excel</button>
<!--                                                     <button class="btn btn-primary" type="submit" name="print_pdf" value="PDF">Print Pdf <i class="glyphicon glyphicon-file"></i></button>-->
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
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/autocomplete/jquery.autocomplete.js"></script>
        </div>
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