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
                            <div class="col-md-12"><p>Create product</p></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-7">
                                <?php echo form_open('product/edit/' . $id, array('class' => 'form-horizontal', 'id' => 'createCustomerForm')); ?>
                                  <?php if ($this->session->userdata('product_msg') == TRUE) {
                                ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                    
                                    <?php
                                    echo $this->session->userdata('product_msg');
                                    $this->session->set_userdata('product_msg', '');
                                    echo '</div>';
                                }
                                ?>
                                <div class="creat-user-main-bg">
                                    <div class="creat-user-form">
                                        <label>Brand</label>
                                        <select class="new-order-form" name="brand_id">
                                            <?php
                                            $condition = array('brand_status' => 'Y');
                                            echo $this->obj_common->display_select('brand', $condition, 'brand_name', 'asc', $product_data[0]['brand_id'], 'id', 'brand_user_id');
                                            ?>
                                        </select>
                                    </div>
                                    <div class="creat-user-form">
                                        <label>Product Name</label>
                                        <input name="product_name" required="" id="product_name" type="text" class="new-order-form" value="<?= $product_data[0]['product_name'] ?>">
                                     
                                    </div>
                                       <?php echo form_error('product_name', '<div class="alert alert-danger">', '</div>'); ?>
                                    <div class="creat-user-form">
                                        <label>Product Id</label>
                                        <input name="product_user_id" required="" id="product_user_id" type="text" class="new-order-form" value="<?= $product_data[0]['product_user_id'] ?>">
                                       
                                    </div>
                                     <?php echo form_error('product_user_id', '<div class="alert alert-danger">', '</div>'); ?>
                                    <div class="creat-user-form">
                                        <label >Unit Price</label>
                                       <input name="unit_price" id="unit_price" type="text" class="new-order-form" value="<?= $product_data[0]['unit_price'] ?>">
                                       
                                    </div>
                                     <?php echo form_error('unit_price', '<div class="alert alert-danger">', '</div>'); ?>
                                    <div class="creat-user-form">
                                        <label >U/M ID</label>
                                       <input name="um_id" id="um_id" type="text" class="new-order-form" value="<?= $product_data[0]['um_id'] ?>">
                                      
                                    </div>
                                      <?php echo form_error('um_id', '<div class="alert alert-danger">', '</div>'); ?>
                                    <div class="creat-user-form">
                                        <label >Description</label>
                                       <textarea class="new-order-form" name="product_description" style="height: 140px; resize: none;" ><?= $product_data[0]['product_description'] ?></textarea>

                                      
                                    </div>
                                      <?php echo form_error('product_description', '<div class="alert alert-danger">', '</div>'); ?>
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
