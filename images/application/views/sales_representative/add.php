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
                            <div class="col-md-12"><p>Create Sales Representative</p></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-7">
                                <?php echo form_open('sales_representative/add', array('class' => '', 'id' => 'createCustomerForm')); ?>
                                <div class="creat-user-main-bg">
                                    <div class="creat-user-form">
                                        <label>Sales Representative Name</label>
                                        <input name="sales_representative_name" id="sales_representative_name" required="" type="text" class="new-order-form" value="<?= set_value('sales_representative_name') ?>">
                                        
                                    </div>
                                    <?php echo form_error('sales_representative_name', '<div class="alert alert-danger">', '</div>'); ?>
                                    <div class="creat-user-form">
                                        <label>Sales Representative Id</label>
                                        <input name="sales_representative_id" id="sales_representative_id" required="" type="text" class="new-order-form"  value=""<?= set_value('sales_representative_id') ?>">
                                       
                                    </div>
                                     <?php echo form_error('sales_representative_id', '<div class="alert alert-danger">', '</div>'); ?>
                                    <div class="creat-user-form">
                                        <label>Sales Representative Address</label>
                                        <textarea class="new-order-form" name="sales_representative_address" class="new-order-form" ><?= set_value('sales_representative_address') ?></textarea>
                                    
                                    </div>
                                        <?php echo form_error('sales_representative_address', '<div class="alert alert-danger">', '</div>'); ?>
                                    <div class="creat-user-form">
                                        <label >User Name</label>
                                        <input name="username" id="username" type="text" class="new-order-form" value="">
                                      
                                    </div>
                                      <?php echo form_error('username', '<div class="alert alert-danger">', '</div>'); ?>
                                    <div class="creat-user-form">
                                        <label >Password</label>
                                        <input name="password" id="password" type="password" class="new-order-form" value="">
                                      
                                    </div>
                                      <?php echo form_error('password', '<div class="alert alert-danger">', '</div>'); ?>
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
