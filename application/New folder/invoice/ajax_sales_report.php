<div class="table-responsive">
    <form class="form-horizontal" role="form">
        <table class="table table-bordered" cellspacing="0" width="100%">                                                
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Invoice/CM</th>
                    <th>Quantity</th>
                    <th>Product ID</th>
                    <th>Description</th>
                    <th>invoice Representative ID</th>
                    <th>Brand Name</th>
                    <th>Unit Price</th>
                    <th>Total</th>
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
    </form>
</div>
<div class="box-footer clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
        <?php echo $this->pagination->create_links(); ?>
    </ul>
</div>
<div class="row">
    <div class="col-md-5 col-md-offset-8">
        <h4>
            <button class="btn btn-primary" type="submit" name="download_pdf" value="PDF">Pdf <i class="glyphicon glyphicon-file"></i></button>
            <button class="btn btn-primary" type="submit" name="print_pdf" value="PDF">Print Pdf <i class="glyphicon glyphicon-file"></i></button>
            <button class="btn btn-primary" name="excel" value="excel">Excel <span class="fa fa-calendar"></span></button>
        </h4>
    </div>
</div>
<script type="text/javascript">
    $(".pagination a").click(function (e) {
        e.preventDefault();
        // $("#ajax_search_invoice").append('<img src="<?= base_url() ?>images/loading.gif"  alt="" />');
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