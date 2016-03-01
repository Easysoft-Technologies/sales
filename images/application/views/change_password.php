<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php $this->load->view('includes/link'); ?>       
    </head> 
    <body class="cbp-spmenu-push">
        <div class="main-content">          
            <?php $this->load->view('includes/leftmenu'); ?>         
            <div id="page-wrapper">
                <div class="main-page">
                    <div class="admin-right-cnt admi-cret-usr">
                        <div class="row admin-order-list">
                            <div class="col-md-12"><p>Change Password</p></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-7">
                                <?php echo form_open_multipart('login/change_password'); ?>
                                <div class="creat-user-main-bg">

                                    <?php
                                    if (isset($status)) {
                                        if ($status == 1) {
                                            ?>
                                            <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>        
                                                <?php
                                                echo '<span style="color:red">Password Change Sucessfully</span>';

                                                echo '</div>';
                                            } else {
                                                ?>
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>        
                                                    <?php
                                                    echo '<span style="color:red">Old Password Not Correct</span>';

                                                    echo '</div>';
                                                }
                                            }
                                            ?>   
                                            <div class="creat-user-form">
                                                <label>Old Password</label>
                                                <input type="password" name="old_password" id="old_password" class="new-order-form" required=""><br>

                                                
                                            </div>
                                                     <?php echo form_error('old_password', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="creat-user-form">
                                                <label>New Password</label>
                                                <input type="password" name="password" id="password" value="" class="new-order-form" required="">
                                             
                                            </div> 
                                                       <?php echo form_error('password', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="creat-user-form">
                                                <label>Re enter Password</label>
                                                <input type="password" name="password_re" id="password_re" value="" class="new-order-form" required="">
                                              
                                            </div>  
                                                      <?php echo form_error('password_re', '<div class="alert alert-danger">', '</div>'); ?>
                                            <div class="creat-user-form">
                                                <input type="submit" class="creat-usr-btn" value="create">
                                            </div>
                                        </div>
                                        </form>
                                        <div class="clearfix"></div>
                                    </div> 
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!--footer-->
                <?php $this->load->view('includes/footer'); ?>
            </div>
    </body>
</html>
