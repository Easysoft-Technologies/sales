
<!-- Base Css Files -->
<link href="<?php echo base_url(); ?>assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/libs/fontello/css/fontello.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/libs/animate-css/animate.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/libs/nifty-modal/css/component.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" /> 
<link href="<?php echo base_url(); ?>assets/libs/ios7-switch/ios7-switch.css" rel="stylesheet" /> 
<link href="<?php echo base_url(); ?>assets/libs/pace/pace.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
<!-- Code Highlighter for Demo -->
<link href="<?php echo base_url(); ?>assets/libs/prettify/github.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/libs/jquery-notifyjs/styles/metro/notify-metro.css" rel="stylesheet" type="text/css" />

<!-- Extra CSS Libraries Start -->
<link href="<?php echo base_url(); ?>assets/libs/jquery-datatables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
<!-- Extra CSS Libraries End -->
<link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/autocomplete/jquery.autocomplete.css" rel="stylesheet" />


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-152x152.png" />


<style type="text/css">

    #shop_list .active td a{
        color:white;
    }

</style>
</head>
<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper" class="forced" >
        <!-- Top Bar Start -->
        <div class="topbar">
            <div class="topbar-left" style="background: #FFF; border-bottom: 1px solid #eee" >
                <div class="logo">
                    <h1><a href="#"><img src="<?= base_url() ?>assets/logo.png" alt="Logo"></a></h1>
                </div>
                <button class="button-menu-mobile open-left" style="color: #424A55">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-collapse2">
                        <ul class="nav navbar-nav navbar-right top-navbar">
                            <li class="dropdown topbar-profile">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php echo $this->session->userdata('ADMIN_NAME'); ?> <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url('logout'); ?>">Logout</a></li>
                                    <li><a href="<?php echo site_url('login/change_password'); ?>">Change Password</a></li>
                                </ul>
                            </li>
                            <li>&nbsp;&nbsp;&nbsp;</li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <!-- Search form -->
                <form role="search" class="navbar-form">
                    <div class="form-group">
                        <input type="text" placeholder="Search" class="new-order-form">
                        <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <div class="clearfix"></div>
                <!--- Profile -->
                <div class="profile-info">                           
                    <?php if (!($this->session->userdata('USER_PIC'))) { ?>
                        <div class="col-xs-4">
                            <a href="<?php echo site_url('profile'); ?>" class="rounded-image profile-image">
                                <img src="<?php echo base_url(); ?>profile_picture/<?php echo $this->session->userdata('USER_PIC'); ?>">
                            </a>
                        </div>
                    <?php } ?>

                    <div class="col-xs-8">
                        <div class="profile-text"> <small>Welcome</small><br /><span><?php echo $this->session->userdata('ADMIN_NAME'); ?></span></div>
                        <div class="profile-buttons">
                            <a href="javascript:;"><i class="fa fa-envelope-o pulse"></i></a>
                            <a href="#connect" class="open-right"><i class="fa fa-comments"></i></a>
                            <a class="md-trigger" data-modal="logout-modal" title="Sign Out"><i class="fa fa-power-off text-red-1"></i></a>
                        </div>
                    </div>
                </div>
                <!--- Divider -->
                <div class="clearfix"></div>
                <hr class="divider" />
                <div class="clearfix"></div>
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>
             
                        <li >
                            <a href="<?php echo site_url('invoice'); ?>">    <i class='glyphicon glyphicon-cog'></i>
                                <span>Sales</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="subdrop">
                                <i class="i fa fa-book"></i>
                                <span>Reports</span> 
                                <span class="pull-right"><i class="fa fa-angle-up"></i></span>
                            </a>
                            <ul >
                                <li><a href="<?php echo site_url('sales/index'); ?>"><span>Import File</span></a></li>
                                <li><a href="<?php echo site_url('sales/reports_all'); ?>"><span>All Data</span></a></li> 
                                <li><a href="<?php echo site_url('sales/report_user'); ?>"><span>Userwise Sales Report</span></a></li> 
                                <li><a href="<?php echo site_url('sales/report_brand'); ?>"><span>Brandwise Sales Report</span></a></li>
                                <li><a href="<?php echo site_url('sales/report_client'); ?>"><span>Clientwise Sales Report</span></a></li>
                            </ul>
                        </li>
                        <li >
                            <a href='javascript:void(0);'>
                                <i class="glyphicon glyphicon-cog"></i>
                                <span>Masters</span> 
                                <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul>
                                <li><a href='<?= site_url('product') ?>'><span>Product</span></a></li> 
                                <li><a href='<?= site_url('sales_representative') ?>'><span>Sales Representative(Users)</span></a></li> 
                                <li><a href='<?= site_url('brand') ?>'><span>Brand</span></a></li>                               
                                <li><a href='<?= site_url('client') ?>'><span>Clients</span></a></li>
                            </ul>
                        </li>
                    </ul>                    
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>        
                <br><br><br>
            </div>
            <div class="left-footer">
                <div class="progress progress-xs">
                    <div class="progress-bar bg-green-1" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                        <span class="progress-precentage">80%</span>
                    </div>
                    <a data-toggle="tooltip" title="See task progress" class="btn btn-default md-trigger" data-modal="task-progress"><i class="fa fa-inbox"></i></a>
                </div>
            </div>
        </div>