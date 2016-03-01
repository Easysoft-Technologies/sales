<div class="table-responsive">
    <form class="form-horizontal" role="form">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="shop_list">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Order No</th>
                    <th>Date</th>
                    <th>Client ID</th>
                    <th>Sales Representative ID</th>                                                      
                    <th>Total Amount</th>
                    <th></th>
                    <th></th>
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
                        <tr cust_id="233" <?php
                        if ($i == 1) {
                            echo 'class="active"';
                        }
                        ?>>
                            <td><?= $i ?></td>
                            <td><?= $result['invoice_id'] ?></td>                                                       
                            <td><?= $result['date'] ?></td>
                            <td><?= $result['client_user_id'] ?></td>    
                            <td><?= $result['sales_representative_user_id'] ?></td>                                              
                            <td><?= $result['total_price'] ?></td> 

                            <td><a rel="<?= site_url('invoice/model_report_list/' . $result['order_url']) ?>"   data-toggle="modal" data-target=".modal"><span class="icon-file table-icon" ></span></a></td>
                            <td><a href="<?= site_url('invoice/delete/' . $result['order_url'] . '/' . $row) ?>" ><i class="glyphicon glyphicon-trash"></i></a></td>
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

<script type="text/javascript">
    $('a[data-toggle="modal"]').on('click', function (e) {
        e.preventDefault();
        $("#myLargeModalLabel").html('Edit Product');
        var target_modal = $(e.currentTarget).data('target');
        // also get the remote content's URL
        var remote_content = e.currentTarget.rel;
        var modal = $(target_modal);
        // Find the modal's <div class="modal-body"> so we can populate it
        var modalBody = $(target_modal + ' .modal-body');
        modal.on('show.bs.modal', function () {
            modalBody.load(remote_content);
        }).modal();
        return false;
    });

    $('#model_add_product').on('hidden.bs.modal', function () {
        location.reload();
    })
    $(".pagination a").click(function (e) {
        e.preventDefault();
        $("#ajax_search_invoice").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
        $.ajax({
            type: "POST",
            url: $(this).attr("href"),
            success: function (data) {
                $("#ajax_search_invoice").html(data);
            }
        });
        return false;
    });
</script>
