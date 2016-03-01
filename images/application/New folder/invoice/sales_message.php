<table  cellpadding="5"   width="100%" border="1" >                                                
                                            <thead>
                                                <tr >
                                                    <th ><strong>No.</strong></th>
                                                    <th><strong>Date</strong></th>
                                                    <th><strong>Customer ID</strong></th>
                                                    <th><strong>Customer Name</strong></th>
                                                    <th><strong>Invoice/CM</strong></th>
                                                    <th><strong>Quantity</strong></th>
                                                    <th><strong>Product ID</strong></th>
                                                    <th><strong>Description</strong></th>
                                                    <th><strong>invoice Representative ID</strong></th>
                                                    <th><strong>Brand Name</strong></th>
                                                    <th><strong>Unit Price</strong></th>
                                                    <th><strong>Total</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>                                                    
                                                <?php
                                                $i = $row;
                                                //$per_page
                                                $invoice_count = count($invoice);
                                                if ($invoice) {
                                                    foreach ($invoice as $result) {
                                                        $i++;
                                                        ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $result['date'] ?></td>  
                                                            <td><?= $result['client_user_id'] ?></td>                                                       
                                                            <td><?= $result['client_name'] ?></td>
                                                            <td><?= $result['invoice_id'] ?></td>                                                       
                                                            <td><?= $result['quantity'] ?></td>
                                                            <td><?= $result['product_user_id'] ?></td>                                                       
                                                            <td><?= $result['product_description'] ?></td> 
                                                            <td><?= $result['invoice_representative_user_id'] ?></td>                                                       
                                                            <td><?= $result['brand_user_id'] ?></td> 
                                                            <td><?= $result['price'] ?></td>                                                       
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
                                            </tbody>                                              
                                        </table>