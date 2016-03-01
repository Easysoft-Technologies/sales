<div class=" sidebar" role="navigation">
    <div class="navbar-collapse">
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <div class="admin-bg">
                <div class="adminimage"><img src="<?= base_url() ?>images/admin-pic.png" class="img-circle"></div>
                <div class="admin-name"><h2>Welcome</h2><span> <?php echo ucwords($this->session->userdata('ADMIN_NAME')); ?></span></div>
                <a href="<?php echo site_url('logout'); ?>" ><button type="button" class="icon-logout log-out"></button></a>
            </div>
            <div class="clearfix"></div>
            <ul class="nav" id="side-menu"> 
                <li>
                    <a href="<?php echo site_url('invoice'); ?>"><span class="icon-sales sale-icon"></span></i>Sales</a>
                </li>
              <?php              
              if($this->session->userdata('user_type')=='1'){ 
                  if($this->session->userdata('user_type')=='2'){
                      redirect('/');
                  }
              ?>
                <li>
                    <a href="#"><span class="icon-report sale-icon"></span>Report <i class="fa fa-sort-asc arrow1"></i></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo site_url('sales/index'); ?>"> Import File</a></li>
                        <li><a href="<?php echo site_url('sales/reports_all'); ?>"> All Data</a></li>
                        <li><a href="<?php echo site_url('sales/report_user'); ?>">  Userwise Sales Report</a></li>
                        <li><a href="<?php echo site_url('sales/report_brand'); ?>">  Brandwise Sales Report</a></li>
                        <li><a href="<?php echo site_url('sales/report_client'); ?>">  Clientwise Sales Report</a></li>
                    </ul>
                    <!-- /nav-second-level -->
                </li>
                <li>
                    <a href="#"><span class="icon-master sale-icon"></span>Masters <i class="fa fa-sort-asc arrow1"></i></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?= site_url('sales_representative') ?>">Sales Representative(Users)</a></li>
                        <li><a href="<?= site_url('product') ?>">Product</a></li>
                        <li><a href="<?= site_url('brand') ?>">Brand</a></li>
                        <li><a href="<?= site_url('client') ?>">Client</a></li>
                          <li><a href="<?= site_url('login/change_password') ?>">Change Password</a></li>

                    </ul>
                    <!-- /nav-second-level -->
                </li>
                <?php
              }
              ?>

            </ul>
            <div class="clearfix"> </div>
            <!-- //sidebar-collapse -->
        </nav>
    </div>
</div>
<!-- header-starts -->  
<div class="sticky-header header-section ">
    <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><i class="menu-icon"></i></button>
        <!--toggle button end-->
        <!--logo -->
        <div class="logo">
            <a href="inbox.php">
                <img src="<?= base_url() ?>images/index-logo.png" class="img-responsive">
            </a>
        </div>
        <!--//logo-->

        <div class="clearfix"> </div>
    </div>

</div>
<!---header--end--->