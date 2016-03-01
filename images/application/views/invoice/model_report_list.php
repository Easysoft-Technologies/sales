<div class="border-pop">
    <div class="row">
        <div class="col-md-6 inbox-tabl-popup">
            <div class="ordr-popup">
                <h3>Order ID:  <?= $invoice[0]['invoice_id'] ?></h3>
                <p>Date: <?= $invoice[0]['date'] ?></p>
                <p>Sales Representative ID: <?= $invoice[0]['sales_representative_user_id'] ?></p>      
            </div>
        </div> 
        <div class="col-md-6 inbox-tabl-popup">
            <div class="ordr-popup ordr-popup-cnt ">
                <h3>Client Name: <?= $invoice[0]['client_name'] ?></h3>
                <p>Client ID: <?= $invoice[0]['client_user_id'] ?></p>
                
            </div>
        </div>
    </div><!---row------>
</div>

<div class="clearfix"></div>

<div class="border-pop">
    <div class="row">
        <div class="col-md-12">
            <div class="ordr-dtls-pop"><h4>Order Descriptions</h4></div>
 <div class="table-responsive">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="shop_list">
                <thead>
                    <tr>
                        <th width="15%">No</th>
                        <th>Brand Name</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                    $condition = array('order_id' => $invoice[0]['id']);
                    // get_all_items_model($condition = array(), $order_by_fieled, $order_by_type = "asc")
                    $invoice_order_items = $this->obj_invoice->get_all_items_model($condition);

                    $i = 0;
                    //$per_page
                    $invoice_order_items_count = count($invoice_order_items);
                    if ($invoice_order_items_count) {
                        foreach ($invoice_order_items as $result) {
                            $i++;
                            ?>

                            <tr <?php
                            if ($i % 2 == 0) {
                                echo 'class="tr_stl tr-bg"';
                            } else {
                                echo 'class="tr_stl"';
                            }
                            ?>  >
                                <td><?= $i ?></td>
                                <td><?= $result['brand_user_id'] ?></td>
                                <td><?= $result['product_user_id'] ?></td>
                                <td><?= $result['price'] ?></td>
                                <td><?= $result['quantity'] ?></td>
                                <td><?= $result['total'] ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr><td colspan="9">
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    No Records Found
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?> 
                    <?php
                    if ($invoice) {
                        ?>
                        <tr>
                            <td colspan="5"><h4><b>Grand Total</b></h4></td>
                            <td colspan="1"><h4><b> <?= $invoice[0]['total_price'] ?></b></h4></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
      </div>

        </div>
    </div><!---row------>
</div>

<!--
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  
</div>-->
