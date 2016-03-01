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
                            <div class="col-md-12"><p>Edit brand</p></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-7">
                                 <?php echo form_open('brand/edit/'.$id, array('class' => '', 'id' => 'createCustomerForm')); ?>
                                
                                <div class="creat-user-main-bg">
                                     <?php if ($this->session->userdata('brand_msg') == TRUE) {
                                ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                    
                                    <?php
                                    echo $this->session->userdata('brand_msg');
                                    $this->session->set_userdata('brand_msg', '');
                                    echo '</div>';
                                }
                                ?>
                                    <div class="creat-user-form">
                                        <label>Brand Name</label>
                                          <input name="brand_name" id="brand_name" type="text" class="new-order-form" value="<?=$brand_data[0]['brand_name']?>">
                                           
                                    </div>
                                      <?php echo form_error('brand_name', '<div class="alert alert-danger">', '</div>'); ?>
                                    <div class="creat-user-form">
                                        <label>Brand Id</label>
                                          <input name="brand_id" id="brand_id" type="text" class="new-order-form" value="<?=$brand_data[0]['brand_user_id']?>">
                                          
                                    </div>
                                      <?php echo form_error('brand_id', '<div class="alert alert-danger">', '</div>'); ?>
                                   
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
