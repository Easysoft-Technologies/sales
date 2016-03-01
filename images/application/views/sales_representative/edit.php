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
                            <div class="col-md-12"><p>Create User</p></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-7">
                                 <?php echo form_open('sales_representative/edit/'.$id, array('class' => 'form-horizontal', 'id' => 'createCustomerForm')); ?>
                                 <?php if ($this->session->userdata('sales_representative_msg') == TRUE) {
                                ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                    
                                    <?php
                                    echo $this->session->userdata('sales_representative_msg');
                                    $this->session->set_userdata('sales_representative_msg', '');
                                    echo '</div>';
                                }
                                ?>
                                <div class="creat-user-main-bg">
                                    <div class="creat-user-form">
                                        <label>Sales Representative Name</label>
                                          <input name="sales_representative_name" id="sales_representative_name" type="text" class="new-order-form" value="<?=$sales_representative_data[0]['sales_representative_name']?>">
                                           
                                      
                                    </div>
                                      <?php echo form_error('sales_representative_name', '<div class="alert alert-danger">', '</div>'); ?>
                                    <div class="creat-user-form">
                                        <label>Sales Representative Id</label>
                                       <input name="sales_representative_id" id="sales_representative_id" type="text" class="new-order-form" value="<?=$sales_representative_data[0]['sales_representative_user_id']?>">
                                           
                                    </div>
                                      <?php echo form_error('sales_representative_id', '<div class="alert alert-danger">', '</div>'); ?>
                                    <div class="creat-user-form">
                                        <label>Sales Representative Address</label>
                                         <textarea class="new-order-form" name="sales_representative_address" style="height: 140px; resize: none;" ><?=$sales_representative_data[0]['sales_representative_address']?></textarea>

                                          
                                    </div>
                                       <?php echo form_error('sales_representative_address', '<div class="alert alert-danger">', '</div>'); ?>
                                    <?php
                                   $condition = array('users_id'=>$sales_representative_data[0]['users_id']);
                                   $username=$this->obj_users->get_field_data($condition, 'users_username');
                                    ?>
                                    <div class="creat-user-form">
                                        <label >User Name</label>
                                        <?php
                                        if($username){
                                        ?>
                                        <input name="username" id="username" type="text" class="new-order-form" value="<?=$username?>" readonly="">
                                        <?php 
                                        }  else {
                                            ?>
                                         <input name="username" id="username" type="text" class="new-order-form" value="" >
                                        <?php
                                            
                                        }
                                        ?>
                                             <?php echo form_error('username', '<div class="alert alert-danger">', '</div>'); ?>
                                    </div>
                                    <div class="creat-user-form">
                                        <label >Password</label>
                                        <input name="password" id="password" type="password" class="new-order-form" value="">
                                             <?php echo form_error('password', '<div class="alert alert-danger">', '</div>'); ?>
                                    </div>
                                    <div class="creat-user-form">
                                        <input type="submit" class="creat-usr-btn" value="Submit">
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
