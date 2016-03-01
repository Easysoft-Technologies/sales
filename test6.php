<html>
    <head>
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="http://zimpcrm.com/sale/css/bootstrap.css" rel='stylesheet' type='text/css' />      

    </head> 
    <div class="container content">
        <div class="row">
            <!-- Begin Sidebar Menu -->
          <?php
            include 'myaccount_left.php';
            ?>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
                <div class="alert alert-info fade in">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    Individual form controls automatically receive some global styling. All textual <code>input</code>, <code>textarea</code>, and <code>select</code> elements with <code>.form-control</code> are set to <code>width: 100%;</code> by default. Wrap labels and controls in .form-group for optimum spacing.<br>
                    <strong>You can find more example here:</strong> <a target="_blank" href="http://getbootstrap.com/css/#forms">http://getbootstrap.com/css/#forms</a>
                </div>

                <!-- Basic Form -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-tasks"></i> Basic Form</h3>
                    </div>
                    <div class="panel-body">                                                      
                        <form class="margin-bottom-40" role="form">
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control " id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Check me out
                                </label>
                            </div>
                            
                            <button type="submit" class="btn-u btn-u-blue">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Basic Form -->
                <!-- Control Sizing -->
                <div class="tag-box tag-box-v3 form-page">
                    <div class="headline"><h3>Control Sizing</h3></div>                
                    <h4>Control Sizing</h4>
                    <p>Set heights using classes like <code>.input-lg</code>, and set widths using grid column classes like <code>.col-lg-*</code>.</p><br>

                    <!-- Height Sizing -->
                    <input class="form-control input-lg" type="text" placeholder=".input-lg">
                    <input class="form-control" type="text" placeholder="Default input">
                    <input class="form-control input-sm" type="text" placeholder=".input-sm">

                    <div class="margin-bottom-40"></div>

                    <select class="form-control input-lg">
                        <option>input-lg</option>
                    </select>
                    <select class="form-control">
                        <option>form-control</option>
                    </select>
                    <select class="form-control input-sm">
                        <option>input-sm</option>
                    </select>
                    <!-- Height Sizing -->

                    <div class="margin-bottom-40"></div>

                    <!-- Column Sizing -->
                    <div class="row">
                        <div class="col-lg-3">
                            <input type="text" class="form-control" placeholder=".col-lg-3">
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" placeholder=".col-lg-3">
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" placeholder=".col-lg-3">
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" placeholder=".col-lg-3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" class="form-control" placeholder=".col-lg-4">
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" placeholder=".col-lg-4">
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" placeholder=".col-lg-4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder=".col-lg-6">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" placeholder=".col-lg-6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" placeholder=".col-lg-12">
                        </div>
                    </div>
                    <!-- End Column Sizing -->
                </div>
                <!-- End Control Sizing -->
            </div>
            <!-- End Content -->
        </div>          
    </div>
</html>
<script src="http://zimpcrm.com/sale/js/jquery-1.11.1.min.js"></script>
<script src="http://zimpcrm.com/sale/js/bootstrap.js"></script>