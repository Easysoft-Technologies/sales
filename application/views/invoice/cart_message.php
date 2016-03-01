             <?php

                                if ($cart = $this->cart->contents()) {
                                    ?>
                                    <div class="table-responsive">          
                                        <table class="table table-bordered1">
                                            <thead>
                                                <tr>
                                                    <th>Sl. No</th>
                                                    <th>Brand</th>
                                                    <th>Product ID &amp; Name</th>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Total</th>
                                                
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
                                                       
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>
                                                    
                                                    <tr><td colspan="5"></td><td colspan="2"  >Grand Total -  <?php echo number_format($grand_total, 2); ?></td></tr>
                                            </tbody>

                                        </table>
                                    </div>
<?php
                                }
                                ?>