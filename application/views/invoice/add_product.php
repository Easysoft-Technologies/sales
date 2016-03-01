<?php echo form_open('cart/add_cart', array('class' => 'form-horizontal', 'id' => 'form_cart')); ?>
<div class="model-rprt-form">
    <label>Product</label>
    <div class="selct-rprt-form" id="search_product_name">
        <input type="text"  name="product_user_id"  list="productname" id="product_user_id"  class="new-order-form"  placeholder="Product Id">
        <datalist id="productname">
            <?php
            $condition = array('brand_id' => $brand_id);
            $product_data = $this->obj_product->get_all($condition);
            foreach ($product_data as $results) {
                ?>
                <option value="<?= $results['product_user_id'] ?>">
                    <?php if ($results['product_description']) { echo ucwords($results['product_description']);
                    }
                    ?>
                    <?php
                }
                ?>
        </datalist>

    </div>     
</div>
<div class="model-rprt-form">
    <label>Quantity</label>
    <input type="text" class="new-order-form" value="" name="quantity" id="quantity">
    <input type="hidden" class="new-order-form" value="" name="price" id="price">
    <input type="hidden" class="new-order-form" value="" name="product_id" id="product_id">
</div>
<div class="model-rprt-form">
    <label>Price</label>
    <input type="text" class="new-order-form" name="price_amount" id="price_amount" readonly="">

</div>
<div class="model-rprt-form clearfix">
    <label>Total Amount</label>
    <input type="text" class="new-order-form" value="" id="total_amount" name="total_amount" readonly="">
</div>
<div id="display-cart"></div>

<div class="modal-footer new-report-btn">
    <input type="submit" class="report-file-dtn new-order-btn" id="save_continue" value="Save & Continue">
    <input type="submit" class="report-file-dtn new-order-btn" value="Save & Exit" id="save_exit">
</div>
</form>

<script type = "text/javascript" >
    $('#save_continue').click(function (e) {
        e.preventDefault();
        $("#display-cart").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
        $.ajax({
            type: "post",
            url: "<?= site_url('cart/add') ?>",
            cache: false,
            data: $('#form_cart').serialize(),
            success: function (json) {
                var obj = jQuery.parseJSON(json);
                //alert( obj['STATUS']);
                if (obj['status'] == 'false') {
                    $("#display-cart").html(obj['cart_message']);
                }
                if (obj['status'] == 'true') {
                    $("#display-cart").html(obj['cart_message']);
                    $("#quantity").val('');
                    $("#price").val('');
                    $("#product_id").val('');
                    $("#total_amount").val('');
                    $("#price_amount").val('');

                }
            }
        });
    });
    $('#save_exit').click(function (e) {
        e.preventDefault();
        $("#display-cart").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
        // $("#ldi").show();
        $.ajax({
            type: "post",
            url: "<?= site_url('cart/add') ?>",
            cache: false,
            data: $('#form_cart').serialize(),
            success: function (json) {
                var obj = jQuery.parseJSON(json);
                //alert( obj['STATUS']);
                if (obj['status'] == 'false') {
                    $("#display-cart").html(obj['cart_message']);
                }
                if (obj['status'] == 'true') {
                    $("#display-cart").html(obj['cart_message']);
                    $("#quantity").val('');
                    $("#price").val('');
                    $("#total_amount").val('');
                    $("#price_amount").val('');
                    location.reload();
                }
            }
        });
    });
    $('#quantity').keypress(function () {
        var total_amount;
        var quantity = $("#quantity").val();
        var price = $("#price").val();
        total_amount = quantity * price;
        total_amount1 = parseFloat(total_amount).toFixed(2);
        $("#total_amount").val(total_amount1);

    });
    $('#quantity').keyup(function () {
        var total_amount;
        var quantity = $("#quantity").val();
        var price = $("#price").val();
        total_amount = quantity * price;
        total_amount1 = parseFloat(total_amount).toFixed(2);
        $("#total_amount").val(total_amount1);

    });
   
   $('#product_user_id').on('focusout blur change', function(e) {    
        var product_id = $("#product_user_id").val();
        $("#total_amount").val('');
        $("#price").val('');
        $("#quantity").val('');
        $("#price_amount").val('');
        $.ajax({
            type: "POST",
            dataType: 'html',
            url: '<?= site_url('cart/get_price') ?>',
            data: {'product_id': product_id},
            success: function (users) {
                $("#price").val(users);
                $("#price_amount").val(users);

            }
        });
       
        $.ajax({
            type: "POST",
            dataType: 'html',
            url: '<?= site_url('cart/get_product_id') ?>',
            data: {'product_id': product_id},
            success: function (users) {
                 $("#product_id").val(users);
              

            }
        });
    });




</script>

