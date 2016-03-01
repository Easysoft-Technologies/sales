    <div class="widget-content padding">
                            <?php
// All values of cart store in "$cart".
                            if ($cart = $this->cart->contents()) {
                                ?>
                                <div id="ajax_search_invoice">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Sl. No</th>
                                                    <th>Brand</th>
                                                    <th>Product ID &amp; Name</th>
                                                    <th>Description</th>
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
                                                    <tr>
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
                                                                <a href="<?= site_url('cart/remove/' . $item['rowid']) ?>" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6">Total Amount :  <?php echo number_format($grand_total, 2); ?></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            <?php } ?>                        
                        </div>

 <script type="text/javascript">
            $(document).ready(function () {
                $('a[data-toggle="add"]').on('click', function (e) {
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