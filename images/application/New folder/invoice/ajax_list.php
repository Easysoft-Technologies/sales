    <div class="table-responsive">

                                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="invoice_list">

                                    <thead>
                                        <tr>
                                            <th>invoice ID</th>
                                            <th>invoice Name</th>
                                            <th>invoice Status</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>                                                    
                                        <?php
                                        $i = 0;
                                        //$per_page
                                        $invoice_count = count($invoice);
                                        if ($invoice) {
                                            foreach ($invoice as $result) {
                                                $i++;
                                                ?>
                                                <tr  >
                                                    <td><?= $result['invoice_user_id'] ?></td>
                                                    <td><?= $result['invoice_name'] ?></td>
                                                    <td  class="style1"> 
                                                        <input type="radio" value="2" name="active<?= $i ?>" <?php if ($result['invoice_status'] == 'Y') { ?> checked="checked" <?php } ?> onClick="update_status('<?= $result['id'] ?>', 'Y');" />&nbsp;Yes&nbsp;<input type="radio" value="1" name="active<?= $i ?>" <?php if ($result['invoice_status'] == 'N') { ?> checked="checked" <?php } ?> onClick="update_status('<?= $result['id'] ?>', 'N');" />&nbsp;No&nbsp;
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('invoice/edit/' . $result['id']) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('invoice/delete/' . $result['id'] . '/' . $row) ?>" onClick="return confirm('Do you want to delete this record ?');"><i class="glyphicon glyphicon-trash"></i></a>
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

  <div class="box-footer clearfix">
                                <ul class="pagination pagination-sm no-margin pull-right">
                                    <?php echo $this->pagination->create_links(); ?>
                                </ul>
                            </div>
                            </div>