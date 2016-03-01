<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cloudkrate</title>
        <link type="image/png" rel="shortcut icon" href="<?= base_url() ?>images/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap-select.min.css">
        <link href='https://fonts.googleapis.com/css?family=Raleway:300,400,500|Roboto+Slab:300,400,700' rel='stylesheet' type='text/css'>
        <style type="text/css">
            .error_val {
                background-color: #d9534f;
                display: inline;
                padding: .2em .6em .3em;
                font-size: 90%;
                font-weight: bold;
                line-height: 3;
                color: #fff;
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: .25em;
            }
        </style>

    </head>

    <body>
        <div id="wrap">
            <?php
            $username = $this->session->userdata('USER_NAME');
            if (isset($username)) {
                ?> 
                <header>
                    <nav class="navbar navbar-default">
                        <div class="container">
                            <div class="nav-center-row">
                                <ul class="nav navbar-nav nav-center" id="header_link1">
                                    <li ><a href="<?= site_url('group') ?>">Groups </a></li>
                                    <li class="active"><a href="<?= site_url('market_place') ?>">Market Place</a></li>
                                    <li><a href="<?= site_url('activity_feed') ?>">Activity Feed</a></li>

                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown"><a class="dropdown-toggle active" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" href=""><?= ucwords($username) ?> <span class="fa fa-caret-down"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?= site_url('change_password') ?>">Change Password</a></li>
                                            <li><a href="<?= site_url('profile') ?>">Profile</a></li>    
                                            <li><a href="<?= site_url('login/logout') ?>">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
                <?php
            } else {
                ?>
                <header>
                    <nav class="navbar navbar-default">
                        <div class="container">
                            <ul class="nav navbar-nav navbar-right" id="header_link2">
                                <li ><a href="<?= site_url('login') ?>">Login</a></li>
                                <li><a href="<?= site_url('sign_up') ?>">Sign Up</a></li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <?php
            }
            ?>
            <section class="container">
                <h1 class="logo">
                    <?php
                    if (isset($username)) {
                        ?>

                        <a href = "<?= site_url('group') ?>">
                            <?php
                        } else {
                            ?>
                            <a href = "<?= site_url() ?>">
                                <?php
                            }
                            ?>
                            <img src="<?= base_url() ?>images/logo.png"></a></h1>
                <div class="cart-section">
                    <?php echo form_open('market_place/search', array('method' => 'post', 'id' => 'search')); ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="text" class="new-order-form"  id="product_vendor_name" placeholder="Search" name="product_vendor_name" <?php if (isset($vendor_name)) { ?>  value="<?= $vendor_name ?>"  <?php } ?>  >
                                <div class="input-group-addon">
                                    <button class="btn" id="search_name">Search</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="radio-btn clearfix">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="product_vendor_type" id="optionsRadios1" value="1" checked="" >
                                        Product </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="product_vendor_type" id="optionsRadios2" value="2"  <?php if (isset($vendor_id)) { ?>  checked  <?php } ?>  <?php if (isset($vendor_name)) { ?>  checked  <?php } ?> >
                                        Vendor </label>
                                </div>
                            </div>
                            <a href="<?= site_url('cart') ?>">
                                <div class="cart-items-box" >
                                    <p class="cart-price"><span class="fa fa-rupee"></span> <?php echo $this->cart->format_number($this->cart->total()); ?></p>
                                    <p class="cart-items"> <?php echo $this->cart->total_items(); ?> Items</p>
                                </div></a>
                        </div>
                    </div>
                    </form>
                    <?php
                    $attributes = array('class' => '', 'id' => 'cart_details', 'name' => 'cart_details');
                    echo form_open('cart/update_cart', $attributes);
                    ?>
                    <div class="row filter-row marketplace-row">
                        <a href="<?= site_url('market_place') ?>"><div class="col-sm-6 col-md-6">
                                <h4>Back to MarketPlace</h4>
                            </div></a>
                        <div class="col-sm-6 col-md-6 selectpicker-row">
                            <div class="selectpicker-box">
                                <select class="selectpicker" name="institution_id" id="institution_id"  >

                                    <option value="" >Select Institution</option>
                                    <?php
                                    $conditions = array('institution_status' => 'Y', 'user_id' => $this->session->userdata('userid'));
                                    echo $this->obj_common->display_select_institution('institution', $conditions, 'institution_name', 'asc', set_value('institution_id'), 'institution_id', 'institution_name');
                                    ?>
                                </select>

                            </div>
                            <div class="selectpicker-box" id="display_group"  >
                                <select class="selectpicker" name="group_id" >
                                    <option value="" >Select Group</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="text-right " id="institution_error"></div>
                    <?php if (validation_errors()) { ?>
                        <div class="text-right "> <?php echo validation_errors(); ?></div>
                    <?php }
                    ?>
                    <?php
                    $cart_check = $this->cart->contents();
// If cart is empty, this will show below message.
                    if (empty($cart_check)) {

                        echo '<br/><div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> To add products to your  cart click on "Add to Cart" Button</div>';
                    }
                    ?> 
                    <?php
// All values of cart store in "$cart".
                    if ($cart = $this->cart->contents()) {
                        ?>
                        <div class="clearfix group-table marketplace-table" id="display-content">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Sub Total</th>
                                            <th colspan="2">Required By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
// Create form and send all values in "cart/update_cart" function.

                                        $grand_total = 0;
                                        $i = 1;

                                        foreach ($cart as $item) {
// echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
// Will produce the following output.
// <input type="hidden" name="cart[1][id]" value="1" />

                                            echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                            echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                            echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                            echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                            echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                            echo form_hidden('cart[' . $item['id'] . '][coupon]', $item['coupon']);


                                            $condition = array('product_id' => $item['id']);
                                            $vendor_id = $this->obj_common->get_field_data('vendor_products', $condition, 'vendor_id');

                                            $condition = array('vendor_id' => $vendor_id);
                                            $vendor_name = $this->obj_common->get_field_data('vendor', $condition, 'vendor_name');
                                            ?>


                                            <tr>
                                                <td><span><?php echo $item['name']; ?></span>Supplied : <?= $vendor_name ?> </td>


                                                <td>
                                                    <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" class="new-order-form"'); ?>
                                                    <label class="control-label">Units</label></td>

                                                <td>
                                                    <?php echo number_format($item['price'], 2); ?>
                                                </td>

                                                <?php $grand_total = $grand_total + $item['subtotal']; ?>
                                                <td>
                                                    <?php echo number_format($item['subtotal'], 2) ?>
                                                </td>
                                                <td><div class="input-group date datetimepicker1">  

                                                        <?php echo form_input('cart[' . $item['id'] . '][coupon]', $item['coupon'], '  readonly="" id="id'.$i.'" class="new-order-form birthday"'); ?>
                                <!--                                                <input type="text" class="new-order-form birthday"  readonly=""/>-->
                                                        <span class="input-group-addon" onclick="display_date(<?=$i?>)"> <span class="fa fa-calendar " ></span> </span> </div></td>
                                                <td width="100" class="delete-btn"><a href="<?= site_url('cart/remove/' . $item['rowid']) ?>"><button class="btn" type="button"><span class="sr-only">None</span></button></a></td>
                                            </tr>
                                        <?php 
                                        $i++;
                                        } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">Total Amount : ₹ <?php echo number_format($grand_total, 2); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="submit-row text-right">
                                <button  class="btn cancel" type="submit"  name="save_order" value="Save Order" id="save_order" >Save Order</button>
                                <button  class="btn cancel" type="submit"  name="place_order" value="place_order" id="place_order">Place Order</button>
                                <button  class="btn cancel" type="submit"  name="update" value="Update Cart">Update Cart</button>
                            </div>
                        </div>
                    <?php } ?>
                    </form>
                </div>
                <?php
                $this->load->view('web/footer');
                ?> <link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>admin_assets/daterangepicker/daterangepicker-bs3.css" />
                <script type="text/javascript" src="<?= base_url() ?>admin_assets/daterangepicker/moment.js"></script>
                <script type="text/javascript" src="<?= base_url() ?>admin_assets/daterangepicker/daterangepicker.js"></script>
                <script>
                    $(document).ready(function () {
                        $('.birthday').daterangepicker({format: 'YYYY-MM-DD', minDate: new Date('<?= date('Y-m-d') ?>'), singleDatePicker: true}, function (start, end, label) {
                            console.log(start.toISOString(), end.toISOString(), label);
                        });

                    });
                </script>
                <script type="text/javascript">
                    
                    
                   function display_date(i){                                              
                       $("#id"+i).trigger("click");                   
                   }

                    $('#save_order,#place_order').click(function () {

                        $("#institution_error").html('');

                        if ($('#institution_id').val() == '') {

                            $('#institution_id').focus();

                            $("#institution_error").html('<p class="error_val">Please Select institution</p>');
                            return false;
                        }

                        if ($('#group_id').val() == '') {

                            $('#group_id').focus();
                            $("#institution_error").html('<p class="error_val">Please Select Group</p>');

                            return false;

                        }
 $('input[type="submit"]').attr('disabled','disabled');
                        return true;



                    });
                    $('#search_name').click(function (e) {

                        e.preventDefault();

                        var product_vendor_name = $("#product_vendor_name").val();
                        if (product_vendor_name) {
                            // $("#ldi").show();
                            $.post('<?= site_url('market_place/search') ?>', $('#search').serialize(), function (data) {
                                $("#display-content").html(data);
                                //$("#ldi").hide();

                            });
                        } else
                        {
                            alert("Search Name Required");
                        }
                    });

                    // To conform clear all data in cart.
                    function clear_cart() {
                        var result = confirm('Are you sure want to clear all Products?');

                        if (result) {
                            window.location = "<?php echo site_url('cart/remove_all'); ?>";
                        } else {
                            return false; // cancel button
                        }
                    }

                    $("#institution_id").change(function () {
                        $("#div_institution").html('');
                        var institution_id = $("#institution_id").val();
                        if (institution_id) {

                            $.ajax({
                                type: "POST",
                                dataType: 'html',
                                data: {'institution_id': institution_id},
                                url: '<?= site_url('cart/ajax_group') ?>',
                                success: function (institution) {

                                    $("#display_group").html(institution);
                                }

                            });

                        }

                    });


                </script>
                </body>
                </html>
