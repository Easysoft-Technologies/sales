<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Indusholidays</title>         <link rel="shortcut icon" type="image/png" href="<?=base_url()?>images/favicon.png"/>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
         <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>admin_assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />      
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        
        <?php		
		$this->load->view('admin/header'); 
	?>         
         
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
          
            <?php include('left.php') ?>
         
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=site_url()?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

           
                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                       <?=$this->obj_common->countrows('enquiry')?>
                                    </h3>
                                    <p>
                                       New Enquiry
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?=site_url('admin/enquiry') ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        &nbsp;
                                    </h3>
                                    <p>
                                        Gallery 
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?=site_url('admin/gallery_blog') ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                      &nbsp;
                                    </h3>
                                    <p>
                                      News
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?=site_url('admin/news') ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                       
                    </div><!-- /.row -->

                    <!-- Main row -->
                    <!-- /.row (main row) -->

                </section><!-- /.content -->
     
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


   <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>admin_assets/js/plugins/daterangepicker/daterangepicker-bs3.css" />
		 <script type="text/javascript" src="<?=base_url()?>admin_assets/js/plugins/daterangepicker/moment.js"></script>
<script type="text/javascript" src="<?=base_url()?>admin_assets/js/plugins/daterangepicker/daterangepicker.js"></script>
          
              <script src="<?=base_url()?>admin_assets/js/AdminLTE/app.js" type="text/javascript"></script>      
       


    </body>
</html>
