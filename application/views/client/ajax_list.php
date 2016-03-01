     <div class="table-responsive">

                                           <table class="table table-bordered1 table-center">

                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>ID</th>
                                                    <th> Name</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody>                                                    
                                                <?php
                                                $i = $row;
                                                //$per_page
                                                $client_count = count($client);
                                                if ($client) {
                                                    foreach ($client as $result) {
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
                                                            <td><?= $result['client_user_id'] ?></td>
                                                            <td><?= $result['client_name'] ?></td>
                                                            <td  class="style1"> 
                                                                <input type="radio" value="2" name="active<?= $i ?>" <?php if ($result['client_status'] == 'Y') { ?> checked="checked" <?php } ?> onClick="update_status('<?= $result['id'] ?>', 'Y');" />&nbsp;Yes&nbsp;<input type="radio" value="1" name="active<?= $i ?>" <?php if ($result['client_status'] == 'N') { ?> checked="checked" <?php } ?> onClick="update_status('<?= $result['id'] ?>', 'N');" />&nbsp;No&nbsp;
                                                            </td>
                                                            <td>
                                                                <a href="<?= site_url('client/edit/' . $result['id']) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                                            </td>
                                                            <td>
                                                                <a href="<?= site_url('client/delete/' . $result['id'] . '/' . $row) ?>" onClick="return confirm('Do you want to delete this record ?');"><i class="glyphicon glyphicon-trash"></i></a>
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