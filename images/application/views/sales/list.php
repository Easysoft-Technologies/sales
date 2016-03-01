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
                <div class="main-page">
                    <div class="admin-right-cnt">	
                        <div class="row">
                            <div class="col-md-12">
                                <div class="admin-order"><p>File Upload</p></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="file-upld-brdr">
                                    <div class="row">
                                        <div class="col-md-6 fileup-colm6">
                                            <div class="fileup-cnt">
                                                <h3>Please upload your file here</h3>
                                                <p class="md"  data-toggle="modal" data-target="#myModal"><a href="#">Check Format</a></p>
                                            </div>
                                            <div id="myModal" class="modal fade report-fade-bg" role="dialog">
                                                <div class="modal-dialog file-model">
                                                    <!-- Modal content-->
                                                    <div class="modal-content order-popup-bg">
                                                        <div class="modal-header order-popup-hd ">
                                                            <button type="button" class="close close1" data-dismiss="modal">&times;</button>
                                                            <h4>Format</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="table-responsive custom-tbl">
                                                                <div class="tbl-grd"></div>
                                                                <table class="table table-bordered" id="ag-tbl">
                                                                    <thead>
                                                                        <tr>
                                                                            <th width="15%">Client ID</th>
                                                                            <th>Client Name</th>
                                                                            <th>Invoice/CM #</th>
                                                                            <th>Date</th>
                                                                            <th>Sales Representative ID</th>
                                                                            <th>Quantity</th>
                                                                            <th>Item ID</th>
                                                                            <th>Description</th>
                                                                            <th>G/L Account</th>
                                                                            <th>Unit Price</th>
                                                                            <th>U/M ID</th>
                                                                            <th>Ship to City</th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--model end------>
                                        </div>
                                        <div class=" col-md-6 fileup-colm6">
                                            <div class="fileup-cnt1">
                                                <label class="custom-file-upload " data-toggle="modal" data-target="#myModal1">
                                                    upload File
                                                </label>
                                            </div>
                                        </div>

                                        <div id="myModal1" class="modal fade report-fade-bg" role="dialog">
                                            <div class="modal-dialog ">
                                                <!-- Modal content-->
                                                <div class="modal-content order-popup-bg">
                                                    <div class="modal-header order-popup-hd ">
                                                        <button type="button" class="close close1" data-dismiss="modal">&times;</button>
                                                        <h4>Upload Sales Report</h4>
                                                    </div>
                                                    <div class="modal-body uplord-file-btn">

                                                        <?php
                                                        $attributes = array('class' => 'upload_csv', 'id' => 'upload_csv', 'name' => 'upload_csv');
                                                        echo form_open_multipart('sales/import_csv', $attributes);
                                                        ?>

                                                        <div class="filpopup-main-head">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="submit-pop">
                                                                        <p>Maximum file upload size 3mb </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="poup-filupldr">
                                                                        <label class="custom-file-upload ">
                                                                            <input type="file" name="image" id="exampleInputFile"/>
                                                                            <i class="icon-file file-icon"></i>Upload File
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 clearfix">
                                                                    <div class="file-btn-bg">
                                                                        <button type="submit" class="file-pu-btn">Submit</button>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="col-md-12 clearfix">
                                                                <div class="file-btn-bg">
                                                                    <div id="display_upload"><br/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>              

                                    </div>


                                </div>
                            </div>
                        </div><!--row end-->

                    </div><!--bg-color-div-end------>

                    <div class="admin-right-cnt">	
                        <div class="row">

                            <div class="col-md-12"><div class="admin-order"><p>order list</p></div></div>

                            <div class="col-md-12">
                                <div class="table-responsive custom-tbl">
                                    <div class="tbl-grd"></div>

                                    <table class="table table-bordered" id="ag-tbl">
                                        <thead>
                                            <tr>
                                                  <th>No</th>
                                                <th>Imported Date</th>
                                                <th>No. of Records</th>
                                                <th>Download File</th>
                                                <th>View </th>
                                            </tr>
                                        </thead>
                                        <tbody>                                                    
                                            <?php
                                            $i = 0;
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
                                                        <td><?=$i?></td>
                                                        <td><?= date('d-M-Y', $result['sales_created_date']) ?></td>                                                       
                                                        <td><?= $result['sales_no_of_records'] ?></td>                                                 
                                                        <td><a href="<?= site_url('sales/download_document/' . $result['sales_url']) ?>"><i class="glyphicon glyphicon-download-alt"></i></a></td>                                                       
                                                        <td><a href="<?= site_url('sales/view/' . $result['sales_url']) ?>"><i class="glyphicon glyphicon-list-alt"></i></a> 
        <!--                                                            <a href="<?= site_url('sales/delete/' . $result['id'] . '/' . $row) ?>" onClick="return confirm('Do you want to delete this record ?');"><i class="glyphicon glyphicon-trash"></i></a>-->
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

            <!--footer-->
<?php $this->load->view('includes/footer'); ?>
        </div>
        <!-- Classie -->
       
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
            $('#myModal1').on('hidden.bs.modal', function () {
                location.reload();
            })
            function change(search_sales_name)
            {
                //var search_sales_name = $("#search_sales_name").val();       
                $("#ajax_search_sales").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
                if (search_sales_name) {
                    $.ajax({
                        type: "POST",
                        dataType: 'html',
                        data: {'search_sales_name': search_sales_name},
                        url: '<?= site_url('sales/ajax_search_sales_name') ?>',
                        success: function (data) {

                            $("#ajax_search_sales").html(data);
                        }

                    });

                } else
                {
                    $.ajax({
                        type: "POST",
                        dataType: 'html',
                        url: '<?= site_url('sales/ajax_search_sales_name') ?>',
                        success: function (data) {

                            $("#ajax_search_sales").html(data);
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