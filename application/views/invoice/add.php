<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php $this->load->view('includes/link'); ?>
        <!--//Metis Menu -->
    </head> 
    <body class="cbp-spmenu-push">
        <div class="main-content">
            <!--left-fixed -navigation-->
            <!-- header-starts -->
            <?php $this->load->view('includes/leftmenu'); ?>
            <!-- //header-ends -->
            <!-- main content start-->
            <div id="page-wrapper">
                <div class="main-page">
                    <?php echo form_open('cart/save', array('class' => '', 'id' => 'search_form')); ?>
                    <div class="admin-right-cnt">	
                        <div class="row">
                            <div class="col-md-12">
                                <div class="admin-order"><p>order</p></div>
                                <div class="order-menu">
                                    <ul class="order-ull">
                                        <li><a href="<?= site_url('invoice') ?>">Home<label><i class="fa fa-angle-right"></i></label></a></li>
                                        <li><a href="<?= site_url('invoice') ?>">Order<label><i class="fa fa-angle-right"></i></label></a></li>
                                        <li class="active"><a href="<?= site_url('invoice/add') ?>">Order Details</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row admin-order-list">
                            <div class="col-md-12"><p>Order Details</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="admin-select-box-out">
                                    <label>User Name</label>
                                    <div class="admin-select-box">
                                        <select class="search_report admin-slct" name="sales_representative_id" required="">
                                           <option value="">Sales Representative Id</option>
                                        <?php
                                        $condition = array('users_id' => $this->session->userdata('users_id'));
                                        $sales_representative_id = $this->obj_sales_representative->get_field_data($condition, 'id');
                                        if ($this->session->userdata('user_type') == '2') {
                                            $condition = array('id' => $sales_representative_id);
                                            echo $this->obj_common->display_select('sales_representative', $condition, 'sales_representative_user_id', 'desc', $sales_representative_id, 'id', 'sales_representative_user_id');
                                        } else {
                                            $condition = array();
                                            echo $this->obj_common->display_select('sales_representative', $condition, 'sales_representative_user_id', 'desc', '', 'id', 'sales_representative_user_id');
                                        }
                                        ?>
                                        </select>
                                        <?php echo form_error('sales_representative_id', '<div class="alert alert-danger">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="admin-select-box-out">
                                    <label>Client Name</label>
                                    <div class="admin-select-box">
                                        <select class="search_report admin-slct" name="client_id" required="">
                                            <option value="">Client Id</option>
                                            <?php
                                            $condition = array();
                                            echo $this->obj_common->display_select('client', $condition, 'client_name', 'desc', '', 'id', 'client_user_id');
                                            ?>
                                        </select>
                                        <?php echo form_error('client_id', '<div class="alert alert-danger">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="admin-select-box-out">
                                    <label>Brand Name</label>
                                    <div class="admin-select-box">
                                        <select class="search_report admin-slct" name="brand" id="brand">
                                            <option value="">Select Brand</option>
                                            <?php
                                            $condition = array();
                                            echo $this->obj_common->display_select('brand', $condition, 'brand_name', 'desc', $this->session->userdata('cart_brand_id'), 'id', 'brand_user_id');
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!--row end-->
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-link link-btn" ><a href="<?= site_url('invoice/add') ?>" data-toggle="add" data-target=".add_product"><strong>+</strong>&nbsp;&nbsp;add new</a></div>
                            </div>
                        </div><!--row end-->
                        <div class="clearfix"></div>
                        <div class="row order-page-toppdng">
                            <div class="col-md-12">

                                <?php
// All values of cart store in "$cart".
                                if ($cart = $this->cart->contents()) {
                                    ?>
                                    <div class="table-responsive">          
                                        <table class="table table-bordered1">
                                            <thead>
                                                <tr>
                                                    <th>Sl. No</th>
                                                    <th>Brand</th>
                                                    <th>Product ID &amp; Name</th>
                                                    <th style="width: 25%;" >Description</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Total</th>
                                                    <th>Edit / Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
// Create form and send all values in "cart/update_cart" function.
                                                $grand_total = 0;
                                                $i = 1;
                                                foreach ($cart as $item) {
                                                    echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                                    echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                                    echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                                    echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                                    echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                                    ?>
                                                    <tr <?php
                                                    if ($i % 2 == 0) {
                                                        echo 'class="tr_stl tr-bg"';
                                                    } else {
                                                        echo 'class="tr_stl"';
                                                    }
                                                    ?>  >
                                                        <td><span><?php echo $i; ?></span></td>
                                                        <?php
                                                        $condition = array('id' => $item['id']);
                                                        $brand_id = $this->obj_product->get_field_data($condition, 'brand_id');
                                                        $product_description = $this->obj_product->get_field_data($condition, 'product_description');
                                                        $condition = array('id' => $brand_id);
                                                        $brand_name = $this->obj_brand->get_field_data($condition, 'brand_user_id');
                                                        ?>  
                                                        <td><span><?php echo $brand_name; ?></span></td>
                                                        <td><span><?php echo $item['name']; ?></span></td>
                                                        <td><span><?php echo $product_description; ?></span></td>
                                                        <td><?php echo $item['qty']; ?></td>
                                                        <td><?php echo number_format($item['price'], 2); ?></td>
                                                        <?php $grand_total = $grand_total + $item['subtotal']; ?>
                                                        <td><?php echo number_format($item['subtotal'], 2) ?></td>
                                                        <td>
                                                            <div class="btn-group btn-group-xs">
                                                                <a href="" rel="<?= site_url('cart/edit/' . $item['id'] . '/' . $item['rowid']) ?>" data-toggle="modal" data-target=".modal"  class="btn btn-danger"><i class="glyphicon glyphicon-pencil"></i></a>
                                                            </div>
                                                            <div class="btn-group btn-group-xs">
                                                                <a href="<?= site_url('cart/remove/' . $item['rowid']) ?>" onClick="return confirm('Do you want to delete this record ?');" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>

                                    <div class="row admin-ordr-bg">
                                        <div class="col-md-12">
                                            <div class="order-footer-btn">
                                                <div class="input-link-order"><p>Grand Total -  <?php echo number_format($grand_total, 2); ?></p></div>

                                                <button class="input-link link-btn" type="submit">Submit Order</button>
                                                <!--                                    <div class="input-link link-btn" ><a href="#">Submit Order</a></div>-->
                                            </div>
                                        </div>
                                    </div>     

                                <?php } ?>    

                            </div>
                        </div> 
                    </div><!--bg-color-div-end------>
                    </form>

                </div>
            </div>

            <div id="myModal" tabindex="-1" class="modal fade report-fade-bg add_product" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content order-popup-bg">
                        <div class="modal-header order-popup-hd ">
                            <button type="button" class="close close1" data-dismiss="modal">&times;</button>
                            <h4 id="myLargeModalLabel">New Order</h4>
                        </div>
                        <div class="modal-body order-body">

                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!--footer-->
            <?php $this->load->view('includes/footer'); ?>
        </div>
        <!-- Classie -->
        <link href="<?php echo base_url(); ?>assets/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/autocomplete/jquery.autocomplete.js"></script>
        <script type="text/javascript">
                                                                    $(document).ready(function () {
                                                                        $('a[data-toggle="add"]').on('click', function (e) {
                                                                            e.preventDefault();
                                                                            var brand = $("#brand").val();
                                                                            if ($("#brand").val() == '') {
                                                                                alert("Please Select Brand Name");
                                                                                return false;
                                                                            } else
                                                                            {
                                                                                $("#myLargeModalLabel").html('New Order');
                                                                                var target_modal = '.add_product';
                                                                                var brand = $("#brand").val();
                                                                                var remote_content = '<?= site_url('invoice/add_product') ?>/' + brand;
                                                                                var modal = $(target_modal);
                                                                                // Find the modal's <div class="modal-body"> so we can populate it
                                                                                var modalBody = $(target_modal + ' .modal-body');
                                                                                modal.on('show.bs.modal', function () {
                                                                                    modalBody.load(remote_content);
                                                                                }).modal();
                                                                                return false;
                                                                            }
                                                                        });
                                                                    });

                                                                    $('a[data-toggle="modal"]').on('click', function (e) {
                                                                        e.preventDefault();
                                                                        $("#myLargeModalLabel").html('Edit Product');
                                                                        var target_modal = $(e.currentTarget).data('target');
                                                                        // also get the remote content's URL
                                                                        var remote_content = e.currentTarget.rel;
                                                                        var modal = $(target_modal);
                                                                        // Find the modal's <div class="modal-body"> so we can populate it
                                                                        var modalBody = $(target_modal + ' .modal-body');
                                                                        modal.on('show.bs.modal', function () {
                                                                            modalBody.load(remote_content);
                                                                        }).modal();
                                                                        return false;
                                                                    });
        </script>
        <script type="text/javascript">
            $('#myModal').on('hidden.bs.modal', function () {
                location.reload();
            })
        </script>
    </body>
</html>