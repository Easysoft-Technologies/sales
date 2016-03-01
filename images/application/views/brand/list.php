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
            <!--left-fixed -navigation-->
            <!-- header-starts -->
            <?php $this->load->view('includes/leftmenu'); ?>
            <!-- //header-ends -->
            <!-- main content start-->
            <div id="page-wrapper">
                <div class="main-page">
                    <div class="admin-right-cnt">	
                        <div class="row ">
                            <div class="col-md-12"><div class="admin-order"><p>Brand</p></div>
                            </div>
                            <div class="col-md-4">
                                <div class="admin-select-box">
                                    <input type="text" name="search_brand_name" onkeyup="change(this.value)" onkeypress="change(this.value)"  id="search_brand_name" class="admn-right-form"  autocomplete="off" placeholder="Brand Id">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="submit" class="admin-right-submit">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 user-btn-bg">
                                <div class="input-link link-btn"><a href="<?= site_url('brand/add') ?>">Create Brand</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <?php if ($this->session->flashdata('brand_delete_message')) {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                    
                            <?php
                            echo $this->session->flashdata('brand_delete_message');

                            echo '</div>';
                     }
                        ?>
                        <div class="admin-right-cnt">	
                            <div class="row">
                                <div class="col-md-12"><div class="admin-order"><p>Brand List</p></div></div>
                                <div class="col-md-12">
                                    <div id="ajax_search_brand">
                                        <div class="table-responsive">
                                            <table class="table table-bordered1 table-center">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th> ID</th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>

                                                <tbody>                                                    
                                                    <?php
                                                    $i = $row;
                                                    //$per_page
                                                    $brand_count = count($brand);
                                                    if ($brand) {
                                                        foreach ($brand as $result) {
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
                                                                <td><?= $result['brand_name'] ?></td>
                                                                <td  class="style1"> 
                                                                    <input type="radio" value="2" name="active<?= $i ?>" <?php if ($result['brand_status'] == 'Y') { ?> checked="checked" <?php } ?> onClick="update_status('<?= $result['id'] ?>', 'Y');" />&nbsp;Yes&nbsp;<input type="radio" value="1" name="active<?= $i ?>" <?php if ($result['brand_status'] == 'N') { ?> checked="checked" <?php } ?> onClick="update_status('<?= $result['id'] ?>', 'N');" />&nbsp;No&nbsp;
                                                                </td>
                                                                <td>
                                                                    <a href="<?= site_url('brand/edit/' . $result['id']) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                                                </td>
                                                                <td>
                                                                    <a href="<?= site_url('brand/delete/' . $result['id'] . '/' . $row) ?>" onClick="return confirm('Do you want to delete this record ?');"><i class="glyphicon glyphicon-trash"></i></a>
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

            function change(search_brand_name)
            {
                //var search_brand_name = $("#search_brand_name").val();       
                $("#ajax_search_brand").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
                if (search_brand_name) {
                    $.ajax({
                        type: "POST",
                        dataType: 'html',
                        data: {'search_brand_name': search_brand_name},
                        url: '<?= site_url('brand/ajax_search_brand_name') ?>',
                        success: function (data) {

                            $("#ajax_search_brand").html(data);
                        }

                    });

                } else
                {
                    $.ajax({
                        type: "POST",
                        dataType: 'html',
                        url: '<?= site_url('brand/ajax_search_brand_name') ?>',
                        success: function (data) {

                            $("#ajax_search_brand").html(data);
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
                        url: '<?= site_url('brand/update_status') ?>',
                        data: {'id': cat_id, 'brand_status': status},
                        success: function (users) {
                            //location.href="<?= base_url() ?>admin/brand",'refresh';
                        }
                    });
                }
            }
        </script>
        <!--scrolling js-->
    </body>
</html>