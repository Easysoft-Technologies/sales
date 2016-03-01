
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
                <div class="profile-text"> <small>Welcome</small><br /><span><?php echo $this->session->userdata('USER_NAME'); ?></span></div>
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
                <li class='has_sub'>
                    <a href='javascript:void(0);'>
                        <i class='icon-home-3'></i>
                        <span>Dashboard</span> 
                        <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul>
                        <li><a href='javascript:void(0);'><span>Dashboard</span></a></li>                        
                    </ul>
                </li>

           

                    <li >
                      
                        <a href="<?php echo site_url('shop'); ?>">    <i class='glyphicon glyphicon-cog'></i>
                          <span>Shop</span>
                            </a>
                          
                    
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