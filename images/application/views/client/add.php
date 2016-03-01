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
                            <div class="col-md-12"><p>Create Client</p></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-7">
                                 <?php echo form_open('client/add', array('class' => '', 'id' => 'createCustomerForm')); ?>
                                <div class="creat-user-main-bg">
                                    <div class="creat-user-form">
                                        <label>Client Name</label>
                                        <input name="client_name" required="" id="client_name" type="text" class="new-order-form" value="<?=set_value('client_name')?>">
                                             
                                    </div>
                                    <?php echo form_error('client_name', '<div class="alert alert-danger">', '</div>'); ?>
                                    <div class="creat-user-form">
                                        <label>Client Id</label>
                                        <input name="client_id" required="" id="client_id" type="text" class="new-order-form" value=""<?=set_value('client_id')?>">
                                            
                                    </div> 
                                     <?php echo form_error('client_id', '<div class="alert alert-danger">', '</div>'); ?>
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
