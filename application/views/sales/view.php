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

                            <div class="col-md-12 clearfix"><div class="admin-order"><p>Details of file - <?= $sales_document_name ?></p></div></div>

                            <div class="col-md-12">
                                <div id="ajax_search_sales">
                                    <div class="table-responsive custom-tbl">
                                        <div class="tbl-grd"></div>
                                        <table class="table table-bordered" id="ag-tbl">                                        
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Date</th>
                                                    <th>Customer ID</th>
                                                    <th>Customer Name</th>
                                                    <th>Invoice/CM</th>                                               
                                                    <th>Product ID</th>
                                                    <th>Description</th>
                                                    <th>Sales Representative ID</th>
                                                    <th>Brand Name</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tbody>                                                    
                                                <?php
                                                $i = $row;
                                                //$per_page
                                                $sales_count = count($sales);
                                                if ($sales) {
                                                    foreach ($sales as $result) {
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
                                                            <td><?= $result['submitted_date'] ?></td>  
                                                            <td><?= $result['client_user_id'] ?></td>                                                       
                                                            <td><?= $result['client_name'] ?></td>  

                                                            <td><?= $result['invoice_id'] ?></td>                                                       



                                                            <td><?= $result['product_user_id'] ?></td>                                                       
                                                            <td><?= $result['product_description'] ?></td>  


                                                            <td><?= $result['sales_representative_user_id'] ?></td>                                                       
                                                            <td><?= $result['brand_user_id'] ?></td>  

                                                            <td><?= $result['quantity'] ?></td>  
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
            <!--footer-->
            <?php $this->load->view('includes/footer'); ?>

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
                $('#upload').on('hidden.bs.modal', function () {
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
                $(".pagination a").click(function (e) {
                    e.preventDefault();
                    $("#ajax_search_sales").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
                    $.ajax({
                        type: "POST",
                        url: $(this).attr("href"),
                        success: function (data) {
                            $("#ajax_search_sales").html(data);
                        }
                    });
                    return false;
                });
            </script>
    </body>
</html>