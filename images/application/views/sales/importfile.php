
<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url() ?>css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="<?= base_url() ?>css/style.css" rel='stylesheet' type='text/css' />
        <!-- font CSS -->
        <!-- font-awesome icons -->
        <link href="<?= base_url() ?>css/font-awesome.css" rel="stylesheet"> 
        <!-- //font-awesome icons -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <!-- js-->
        <script src="<?= base_url() ?>js/jquery-1.11.1.min.js"></script>
        <script src="<?= base_url() ?>js/modernizr.custom.js"></script>

        <link href="<?= base_url() ?>css/animate.css" rel="stylesheet" type="text/css" media="all">
        <script src="<?= base_url() ?>js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
        <!--//end-animate-->
        <!-- Metis Menu -->
        <script src="<?= base_url() ?>js/metisMenu.min.js"></script>
        <script src="<?= base_url() ?>js/custom.js"></script>
        <link href="<?= base_url() ?>css/custom.css" rel="stylesheet">
        <!--//Metis Menu -->
    </head> 
    <body class="cbp-spmenu-push">
        <div class="main-content">
            <!--left-fixed -navigation-->
            <!-- header-starts -->
            <?php include ('includes/leftmenu.php'); ?>

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
                                <th width="15%">Customer ID</th>
                                <th>Customer Name</th>
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
                                                    uplosd File
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
                                                                        <p>maximum file upload size 2mb width</p>
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
                                                                        
                                                                        <div id="display_upload"><br/>
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
                                 ///
                                   <table class="table table-bordered" id="ag-tbl">
                                        <thead>
                                            <tr>
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
                                                    <tr <?php if($i%2==0){ echo 'class="tr_stl tr-bg"' ;} else { 'class="tr_stl"';}?>  >
                                                        <td><?= date('d-M-Y',$result['sales_created_date']) ?></td>                                                       
                                                        <td><?= $result['sales_no_of_records'] ?></td>                                                 
                                                        <td><a href="<?= site_url('sales/download_document/' . $result['sales_url']) ?>"><i class="glyphicon glyphicon-download-alt"></i></a></td>                                                       
                                                        <td><a href="<?= site_url('sales/view/' . $result['sales_url'] . '/' . $row) ?>"><i class="glyphicon glyphicon-list-alt"></i></a> 
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
                                
                                <div class="col-md-12" style="text-align:center;">
 <nav>
  <ul class="pagination custom-pagntion">
    <li class="pagnton-arow">
      <a href="#" aria-label="Previous">
        <span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li class="pagnton-arow">
      <a href="#" aria-label="Next">
        <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
      </a>
    </li>
  </ul>
</nav>
 </div>
                                ///
                                </div>
                            </div>

                        </div>             
                    </div>
                </div>
            </div>

            <!--footer-->
  <?php //include ('includes/footer.php'); ?>
        </div>
        <!-- Classie -->
        <script src="js/classie.js"></script>
        <script>
            var menuLeft = document.getElementById('cbp-spmenu-s1'),
                    showLeftPush = document.getElementById('showLeftPush'),
                    body = document.body;

            showLeftPush.onclick = function () {
                classie.toggle(this, 'active');
                classie.toggle(body, 'cbp-spmenu-push-toright');
                classie.toggle(menuLeft, 'cbp-spmenu-open');
                disableOther('showLeftPush');
            };

            function disableOther(button) {
                if (button !== 'showLeftPush') {
                    classie.toggle(showLeftPush, 'disabled');
                }
            }
        </script>
        <!--scrolling js-->
        <script src="<?= base_url() ?>js/jquery.nicescroll.js"></script>
        <script src="<?= base_url() ?>js/scripts.js"></script>
        <!--//scrolling js-->
        <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url() ?>js/bootstrap.js"></script>
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