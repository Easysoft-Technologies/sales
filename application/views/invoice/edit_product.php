<?php
$results = $this->cart->get_item($row_id);
//print_r($results);
?>

<?php echo form_open('cart/update', array('class' => 'form-horizontal', 'id' => 'form_cart')); ?>
<div class="model-rprt-form">
    <label>Product</label>
    <div class="new-order-form"><?= $products[0]['product_user_id'] ?></div>
</div>
<div class="model-rprt-form">
    <label>Quantity</label>
    <input type="text" class="new-order-form" value="<?= $results['qty'] ?>" name="quantity" id="quantity">
    <input type="hidden" class="new-order-form" value="<?= $products[0]['unit_price'] ?>" name="price" id="price">
    <input type="hidden" class="new-order-form" value="<?= $row_id ?>" name="rowid" id="rowid">
</div>
<div class="model-rprt-form">
    <label>Price</label>    
    <input type="text" class="new-order-form" value="<?= $products[0]['unit_price'] ?>" name="price_amount" id="price_amount" readonly="">
</div>
<div class="model-rprt-form clearfix">
    <label>Total Amount</label>
    <input type="text" class="new-order-form" value="<?= $results['subtotal'] ?>" id="total_amount" name="total_amount" readonly="">
</div>
<div id="display-cart"></div>

<div class="modal-footer new-report-btn">

    <input type="submit" class="report-file-dtn new-order-btn" value="Save & Exit" id="save_exit">
</div>
</form>

<script>
    $('#save_exit').click(function (e) {
        e.preventDefault();
        $("#display-cart").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
        // $("#ldi").show();
        $.ajax({
            type: "post",
            url: "<?= site_url('cart/update') ?>",
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




</script>

