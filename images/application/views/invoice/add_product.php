<?php echo form_open('cart/add_cart', array('class' => 'form-horizontal', 'id' => 'form_cart')); ?>
<div class="model-rprt-form">
    <label>Product</label>
    <div class="selct-rprt-form">
        <select class="rprt-selct-box" name="product_id" id="product_id">
            <option value="">Select Product</option>
            <?php
            $condition = array('brand_id' => $brand_id);
            // $condition = array();
            echo $this->obj_common->display_select('product', $condition, 'product_name', 'desc', '', 'id', 'product_user_id');
            ?>
        </select>
    </div>     
</div>
<div class="model-rprt-form">
    <label>Quantity</label>
    <input type="text" class="new-order-form" value="" name="quantity" id="quantity">
    <input type="hidden" class="new-order-form" value="" name="price" id="price">
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
<script>
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
    $('#product_id').change(function () {
        var product_id = $("#product_id").val();
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
    });



</script>

