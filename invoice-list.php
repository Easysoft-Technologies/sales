<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome - User</title>   
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" content="">
        <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
        <meta name="author" content="Huban Creative">

        <!-- Base Css Files -->
        <link href="assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
        <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/libs/fontello/css/fontello.css" rel="stylesheet" />
        <link href="assets/libs/animate-css/animate.min.css" rel="stylesheet" />
        <link href="assets/libs/nifty-modal/css/component.css" rel="stylesheet" />
        <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" /> 
        <link href="assets/libs/ios7-switch/ios7-switch.css" rel="stylesheet" /> 
        <link href="assets/libs/pace/pace.css" rel="stylesheet" />
        <link href="assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" />
        <link href="assets/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="assets/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
        <!-- Code Highlighter for Demo -->
        <link href="assets/libs/prettify/github.css" rel="stylesheet" />

        <link href="assets/libs/jquery-notifyjs/styles/metro/notify-metro.css" rel="stylesheet" type="text/css" />

        <!-- Extra CSS Libraries Start -->
        <link href="assets/libs/jquery-datatables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <!-- Extra CSS Libraries End -->
        <link href="assets/css/style-responsive.css" rel="stylesheet" />

        <link href="assets/autocomplete/jquery.autocomplete.css" rel="stylesheet" />


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="assets/img/favicon.ico">
        <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="assets/img/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="assets/img/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png" />


        <style type="text/css">

            #shop_list .active td a{
                color:white;
            }

        </style>

    </head>
    <body class="fixed-left">
        <!-- Modal Start -->
        <!-- Modal Task Progress -->	
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Order Details</h4>

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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- Begin page -->
        <div id="wrapper" class="forced" >

            <?php include 'header.php'; ?> 
            <?php include 'navigation.php'; ?> 

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
                                    <h2><strong>Order</strong></h2>
                                    <div class="additional-btn">
                                        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                                        <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>

                                    </div>
                                </div>
                                <div class="widget-content padding">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <select class="form-control" name="status">
                                                <option value="">Select User</option>
                                                <option value="1" >User 1</option>
                                                <option value="2" >User 2</option> 
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="status">
                                                <option value="">Select Brand</option>
                                                <option value="1" >Brand 1</option>
                                                <option value="2" >Brand 2</option> 
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="status">
                                                <option value="">Select Client</option>
                                                <option value="1" >Client 1</option>
                                                <option value="2" >Client 2</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input name="search_query" id="dob" type="text" class="form-control" value="" placeholder="Start Date">
                                        </div>
                                        <div class="col-sm-4">
                                            <input name="search_query" id="dob1" type="text" class="form-control" value="" placeholder="End Date">
                                        </div>
                                        <div class="col-sm-4">
                                            <input name="search_query" id="search" type="text" class="form-control" value="" placeholder="">
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <button class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-offset-9 col-sm-3">
                                            <a href="add-invoice.php" class="btn btn-success pull-right">New Order</a>
<!--                                            <a href="add-user.php" class="btn btn-success pull-right">Create User</a>-->
                                        </div>
                                    </div>
                                    <br>					
                                    <div class="table-responsive">
                                        <form class="form-horizontal" role="form">
                                            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="shop_list">

                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Order No</th>
                                                        <th>Date</th>
                                                        <th>User Name</th>
                                                        <th>Client Name</th>
                                                        <th>Brand Name</th>
                                                        <th>Total Amount</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <tr cust_id="233" class="active">
                                                        <td>1</td>
                                                        <td>INV-0112</td>
                                                        <td>10-Jan-2016</td>
                                                        <td>User 1</td>
                                                        <td>Client 1</td>
                                                        <td>Brand 1</td>
                                                        <td>2,000</td>
                                                        <td>
                                                            <a href="" data-toggle="modal" data-target="#myModal"><span class="glyphicon  icon-doc"></span></a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" onclick="return nconfirm('invoice-list.php')"><i class="glyphicon glyphicon-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    
                                                    
                                                </tbody>                                              

                                            </table>

                                            <ul class="pagination pull-right"><li class="active"><a>1</a></li><li><a href="">2</a></li><li><a href="">3</a></li><li><a href="">&gt;</a></li><li><a href="">Last</a></li></ul>

                                            <!--                                            <ul class="pagination pull-right"><li class="active"><a>1</a></li><li><a href="http://192.168.1.66/sales/shop/index?search_query=&amp;status=&amp;per_page=5">2</a></li><li><a href="http://192.168.1.66/sales/shop/index?search_query=&amp;status=&amp;per_page=10">3</a></li><li><a href="http://192.168.1.66/sales/shop/index?search_query=&amp;status=&amp;per_page=5">&gt;</a></li><li><a href="http://192.168.1.66/sales/shop/index?search_query=&amp;status=&amp;per_page=200">Last �</a></li></ul>
                                            -->


                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-12">
                            <div class="widget" id="cst_wid">                                
                                <div id="shop_detail">

                                    <!--  details will be loaded here -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Start -->
                    <footer>
                        
                        <div class="footer-links pull-right">
                            <a href="#">About</a><a href="#">Support</a><a href="#">Terms of Service</a><a href="#">Legal</a><a href="#">Help</a><a href="#">Contact Us</a>
                        </div>
                    </footer>
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
        <script src="assets/libs/jquery/jquery-1.11.1.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
        <script src="assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js"></script>
        <script src="assets/libs/jquery-detectmobile/detect.js"></script>
        <script src="assets/libs/jquery-animate-numbers/jquery.animateNumbers.js"></script>
        <script src="assets/libs/ios7-switch/ios7.switch.js"></script>
        <script src="assets/libs/fastclick/fastclick.js"></script>
        <script src="assets/libs/jquery-blockui/jquery.blockUI.js"></script>
        <script src="assets/libs/bootstrap-bootbox/bootbox.min.js"></script>
        <script src="assets/libs/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/libs/jquery-sparkline/jquery-sparkline.js"></script>
        <script src="assets/libs/nifty-modal/js/classie.js"></script>
        <script src="assets/libs/nifty-modal/js/modalEffects.js"></script>
        <script src="assets/libs/sortable/sortable.min.js"></script>
        <script src="assets/libs/bootstrap-fileinput/bootstrap.file-input.js"></script>
        <script src="assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="assets/libs/bootstrap-select2/select2.min.js"></script>
        <script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script> 
        <script src="assets/libs/pace/pace.min.js"></script>
        <script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/libs/jquery-icheck/icheck.min.js"></script>

        <!-- Demo Specific JS Libraries -->
        <script src="assets/libs/prettify/prettify.js"></script>

        <script src="assets/libs/jquery-notifyjs/notify.min.js"></script>
        <script src="assets/libs/jquery-notifyjs/styles/metro/notify-metro.js"></script>

        <script src="assets/js/init.js"></script>
        <!-- Page Specific JS Libraries -->
        <script src="assets/libs/jquery-datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/jquery-datatables/js/dataTables.bootstrap.js"></script>
        <script src="assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
        <script src="assets/js/pages/datatables.js"></script>

        <script type="text/javascript" src="assets/autocomplete/jquery.autocomplete.js"></script>







        <script type="text/javascript">
            function nconfirm(url) {
                $.notify({
                    title: 'Are you Sure?!',
                    text: 'Are you sure you want to do delete this record ?<div class="clearfix padding"></div><br><a href="' + url + '" class="btn btn-sm btn-default yes">Yes</a> <a class="btn btn-sm btn-danger no">No</a>',
                    image: "<i class='fa fa-warning'></i>"
                }, {
                    style: 'metro',
                    className: "cool",
                    globalPosition: 'top center',
                    showAnimation: "show",
                    showDuration: 0,
                    hideDuration: 0,
                    autoHide: false,
                    clickToHide: false
                });
            }
            
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
                $('#dob1').datepicker({
                    format: 'yyyy-mm-dd'
                }).on('changeDate', function (ev) {

                    var dateString = $('#dob1').val();
                    var today = new Date();
                    var birthDate = new Date(dateString);
                    var age = today.getFullYear() - birthDate.getFullYear();
                    var m = today.getMonth() - birthDate.getMonth();
                    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                        age--;
                    }
                    $('#age').val(age);
                });

            $(function () {
                //listen for click events from this style
                $(document).on('click', '.notifyjs-metro-base .no', function () {

                    $(this).trigger('notify-hide');
                    return FALSE;
                });
                $(document).on('click', '.notifyjs-metro-base .yes', function () {
                    //show button text

                    $(this).trigger('notify-hide');
                    return TRUE;
                });
            })
        </script>

    </body>
</html>