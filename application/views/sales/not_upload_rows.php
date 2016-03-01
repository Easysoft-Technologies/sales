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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="admin-order"><p>Format Mismatch</p></div>
                            </div>
                        </div>
            

                    </div><!--bg-color-div-end------>

                    <div class="admin-right-cnt">	
                        <div class="row">

                            <div class="col-md-12"><div class="admin-order"><p></p></div></div>

                            <div class="col-md-12">
              <?php
              echo '<div class="table-responsive">';
        echo $client_data[0]['sales_document_not_inserted'];
        echo '</div>';
              ?>
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
            $("form#upload_csv").submit(function () {
                // $("#display_upload1").append('<img src="<?= base_url() ?>images/loader.gif" style="height: 100px; width: 100px;"  alt="" />');
                $("#display_upload").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: '<?php echo site_url('sales/import_csv'); ?>',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        $("#display_upload").html(data);
                        // $('#exampleInputFile').val('');
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

                return false;
            });
            $('#myModal1').on('hidden.bs.modal', function () {
                location.reload();
            })
            function change(search_sales_name)
            {
                //var search_sales_name = $("#search_sales_name").val();       
                $("#ajax_search_sales").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
                if (search_sales_name) {
                    $.ajax({
                        type: "POST",
                        dataType: 'html',
                        data: {'search_sales_name': search_sales_name},
                        url: '<?= site_url('sales/ajax_search_sales_name') ?>',
                        success: function (data) {

                            $("#ajax_search_sales").html(data);
                        }

                    });

                } else
                {
                    $.ajax({
                        type: "POST",
                        dataType: 'html',
                        url: '<?= site_url('sales/ajax_search_sales_name') ?>',
                        success: function (data) {

                            $("#ajax_search_sales").html(data);
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
                        url: '<?= site_url('sales/update_status') ?>',
                        data: {'id': cat_id, 'sales_status': status},
                        success: function (users) {
                            //location.href="<?= base_url() ?>admin/sales",'refresh';
                        }
                    });
                }
            }
        </script>
    </body>
</html>