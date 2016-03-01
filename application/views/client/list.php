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
                            <div class="col-md-12"><div class="admin-order"><p>Client</p></div>
                            </div>
                            <div class="col-md-4">
                                <div class="admin-select-box">
                                       <input type="text" name="search_client_name" onkeyup="change(this.value)" onkeypress="change(this.value)"  id="search_client_name" class="admn-right-form"  autocomplete="off" placeholder="Client Name">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="submit" class="admin-right-submit">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 user-btn-bg">
                                <div class="input-link link-btn"><a href="<?= site_url('client/add') ?>">Create Client</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                      <?php if ($this->session->flashdata('client_delete_message')) {
                                ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                    
                                    <?php
                                    echo $this->session->flashdata('client_delete_message');
                                
                                    echo '</div>';
                                }
                                ?>
                    <div class="admin-right-cnt">	
                        <div class="row">
                            <div class="col-md-12"><div class="admin-order"><p>Client List</p></div></div>
                            <div class="col-md-12">
                                <div id="ajax_search_client">
                                    <div class="table-responsive">

                                          <table class="table table-bordered1 table-center">

                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th> ID</th>
                                                    <th> Name</th>
                                                    <th> Status</th>
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

        function change(search_client_name)
        {
            //var search_client_name = $("#search_client_name").val();       
            $("#ajax_search_client").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
            if (search_client_name) {
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    data: {'search_client_name': search_client_name},
                    url: '<?= site_url('client/ajax_search_client_name') ?>',
                    success: function (data) {

                        $("#ajax_search_client").html(data);
                    }

                });

            } else
            {
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    url: '<?= site_url('client/ajax_search_client_name') ?>',
                    success: function (data) {

                        $("#ajax_search_client").html(data);
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
                    url: '<?= site_url('client/update_status') ?>',
                    data: {'id': cat_id, 'client_status': status},
                    success: function (users) {
                        //location.href="<?= base_url() ?>admin/client",'refresh';
                    }
                });
            }
        }
    </script>
    <!--scrolling js-->
</body>
</html>