 <div class="table-responsive">
                                          <table class="table table-bordered1 table-center" id="product_list">                   
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th> ID</th>
                                                    <th> Name</th>
                                                    <th> Price</th>
                                                    <th> Status</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>                                                    
                                                <?php
                                                $i = $row;
                                                //$per_page
                                                $product_count = count($product);
                                                if ($product) {
                                                    foreach ($product as $result) {
                                                        $i++;
                                                        ?>
                                                        <tr  >
                                                            <td><?= $i ?></td>
                                                            <td><?= $result['product_user_id'] ?></td>
                                                            <td><?= $result['product_name'] ?></td>
                                                              <td><?= $result['unit_price'] ?></td>
                                                            <td  class="style1"> 
                                                                <input type="radio" value="2" name="active<?= $i ?>" <?php if ($result['product_status'] == 'Y') { ?> checked="checked" <?php } ?> onClick="update_status('<?= $result['id'] ?>', 'Y');" />&nbsp;Yes&nbsp;<input type="radio" value="1" name="active<?= $i ?>" <?php if ($result['product_status'] == 'N') { ?> checked="checked" <?php } ?> onClick="update_status('<?= $result['id'] ?>', 'N');" />&nbsp;No&nbsp;
                                                            </td>
                                                            <td>
                                                                <a href="<?= site_url('product/edit/' . $result['id']) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                                            </td>
                                                            <td>
                                                                <a href="<?= site_url('product/delete/' . $result['id'] . '/' . $row) ?>" onClick="return confirm('Do you want to delete this record ?');"><i class="glyphicon glyphicon-trash"></i></a>
                                                            </td>
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
                                                        <?php
                                                    }
                                                    ?> 
                                            </tbody>  
                                        </table>
                                    </div>
                                    <div class="col-md-12" style="text-align:center;">
                                        <nav>
                                            <?php echo $this->pagination->create_links(); ?>
                                        </nav>
                                    </div>