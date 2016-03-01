<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php $this->load->view('includes/link'); ?>
        <!--//Metis Menu -->
    </head> 
    <body class="cbp-spmenu-push">
        <div class="main-content">         
            <?php $this->load->view('includes/leftmenu'); ?>           
            <div id="page-wrapper">
                <div class="main-page">
                    <div class="admin-right-cnt">	
                        <div class="row ">
                            <div class="col-md-12"><div class="admin-order"><p>Product</p></div>
                            </div>
                            <div class="col-md-4">
                                <div class="admin-select-box">
                                     <input type="text" name="search_product_name" onkeyup="change(this.value)" onkeypress="change(this.value)"  id="search_product_name" class="admn-right-form"  autocomplete="off" placeholder="Product Id">
                                 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="submit" class="admin-right-submit">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 user-btn-bg">
                                <div class="input-link link-btn"><a href="<?= site_url('product/add') ?>">Create Product</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                     <?php if ($this->session->flashdata('product_delete_message')) {
                                ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                    
                                    <?php
                                    echo $this->session->flashdata('product_delete_message');
                                
                                    echo '</div>';
                                }
                                ?>
                    <div class="admin-right-cnt">	
                        <div class="row">
                            <div class="col-md-12"><div class="admin-order"><p>Product</p></div></div>
                            <div class="col-md-12">
                                <div id="ajax_search_product">
                                    <div class="table-responsive">
                                         <table class="table table-bordered1 table-center" id="product_list">
                                                          
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th> ID</th>
                                                    <th> Name</th>
                                                    <th> Price</th>
                                                    <th>Status</th>
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
                                </div>
                            </div>
                        </div>
                    </div>             
                </div>
            </div>
        </div>
        <!--footer-->
        <?php $this->load->view('includes/footer'); ?>
    </div>
    <!-- Classie -->
    <script type="text/javascript">
        function change(search_product_name)
        {
            //var search_product_name = $("#search_product_name").val();       
            $("#ajax_search_product").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
            if (search_product_name) {
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    data: {'search_product_name': search_product_name},
                    url: '<?= site_url('product/ajax_search_product_name') ?>',
                    success: function (data) {
                        $("#ajax_search_product").html(data);
                    }
                });

            } else
            {
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    url: '<?= site_url('product/ajax_search_product_name') ?>',
                    success: function (data) {

                        $("#ajax_search_product").html(data);
                    }

                });

            }
        }
        function update_status(cat_id, status)
        {

            var status_type;
            if (status == 'N') {
                status_type = 'Deactivate';
            } else
            {
                status_type = 'Activate';
            }
            if (confirm('Are you sure you want to  ' + status_type)) {
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    url: '<?= site_url('product/update_status') ?>',
                    data: {'id': cat_id, 'product_status': status},
                    success: function (users) {
                        //location.href="<?= base_url() ?>admin/product",'refresh';
                    }
                });
            }
        }
    </script>
    <!--scrolling js-->
</body>
</html>