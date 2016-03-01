<html>
    <head>
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="http://zimpcrm.com/sale/css/bootstrap.css" rel='stylesheet' type='text/css' /> 
    </head> 
    <style type="text/css">
        .spacer5 { height: 5px; width: 100%; font-size: 0; margin: 0; padding: 0; border: 0; display: block; }
.spacer10 { height: 10px; width: 100%; font-size: 0; margin: 0; padding: 0; border: 0; display: block; }
.spacer15 { height: 15px; width: 100%; font-size: 0; margin: 0; padding: 0; border: 0; display: block; }
.spacer20 { height: 20px; width: 100%; font-size: 0; margin: 0; padding: 0; border: 0; display: block; }
.spacer25 { height: 25px; width: 100%; font-size: 0; margin: 0; padding: 0; border: 0; display: block; }
.spacer30 { height: 30px; width: 100%; font-size: 0; margin: 0; padding: 0; border: 0; display: block; }
.spacer35 { height: 35px; width: 100%; font-size: 0; margin: 0; padding: 0; border: 0; display: block; }
.spacer40 { height: 40px; width: 100%; font-size: 0; margin: 0; padding: 0; border: 0; display: block; }
.spacer45 { height: 45px; width: 100%; font-size: 0; margin: 0; padding: 0; border: 0; display: block; }
.spacer50 { height: 50px; width: 100%; font-size: 0; margin: 0; padding: 0; border: 0; display: block; }
.spacer100 { height: 100px; width: 100%; font-size: 0; margin: 0; padding: 0; border: 0; display: block; }
.spacer200 { height: 200px; width: 100%; font-size: 0; margin: 0; padding: 0; border: 0; display: block; }
        </style>
    <div class="container content">
        <div class="row">
            <!-- Begin Sidebar Menu -->
            <?php
            include 'myaccount_left.php';
            ?>
            <!-- Begin Content -->
            <div class="col-md-9">
                <div class="row">
                    <div class="col-lg-4 text-center">
                        <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                        <h2>Heading</h2>
                        <p><a class="btn btn-warning" href="#" role="button">View details </a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 text-center">
                        <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                        <h2>Heading</h2>
                        <p><a class="btn btn-success" href="#" role="button">View details </a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 text-center">
                        <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                        <h2>Heading</h2>
                        <p><a class="btn  btn-info" href="#" role="button">View details </a></p>
                    </div><!-- /.col-lg-4 -->
                </div>
                <!--Basic Table Option (Spacing)-->
                 <div class="spacer20"></div>
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Basic Table Option (with space)</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th class="hidden-sm">Last Name</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td class="hidden-sm">Otto</td>
                                    <td>@mdo</td>
                                    <td><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td class="hidden-sm">Thornton</td>
                                    <td>@fat</td>
                                    <td><button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</button></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Larry</td>
                                    <td class="hidden-sm">the Bird</td>
                                    <td>@twitter</td>
                                    <td><button class="btn btn-info btn-xs"><i class="fa fa-share"></i> Share</button></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>htmlstream</td>
                                    <td class="hidden-sm">Web Design</td>
                                    <td>@htmlstream</td>
                                    <td><button class="btn btn-success btn-xs"><i class="fa fa-check"></i> Submit</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--End Basic Table-->
                <!--Table Bordered-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-globe"></i> Table Bordered</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th class="hidden-sm">Last Name</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td class="hidden-sm">Otto</td>
                                    <td>@mdo</td>
                                    <td><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td class="hidden-sm">Thornton</td>
                                    <td>@fat</td>
                                    <td><button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</button></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Larry</td>
                                    <td class="hidden-sm">the Bird</td>
                                    <td>@twitter</td>
                                    <td><button class="btn btn-info btn-xs"><i class="fa fa-share"></i> Share</button></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>htmlstream</td>
                                    <td class="hidden-sm">Web Design</td>
                                    <td>@htmlstream</td>
                                    <td><button class="btn btn-success btn-xs"><i class="fa fa-check"></i> Submit</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--End Table Bordered-->
                <div class="margin-bottom-60"></div>

                <!--Basic Table-->
                <!--End Table Striped-->
            </div>
            <!-- End Content -->
        </div>
    </div>

</html>