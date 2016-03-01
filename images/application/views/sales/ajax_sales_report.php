<div class="table-responsive"> 
    <div class="tbl-grd"></div>         
    <table class="table table-bordered2 table-center">                                          
        <thead>
            <tr>
                <th>No.</th>
                <?php //if (in_array("1", $sort_checkbox)) {echo "<th>Date</th>"; } ?>
                <?php //if (in_array("2", $sort_checkbox)) {echo "<th>Client ID</th>"; } ?>
                <?php //if (in_array("3", $sort_checkbox)) {echo "<th>Client Name</th>"; } ?>
                <?php //if (in_array("4", $sort_checkbox)) {echo "<th>Invoice/CM</th>"; } ?>
                <?php //if (in_array("5", $sort_checkbox)) {echo "<th>Product ID</th>"; } ?>
                <?php //if (in_array("6", $sort_checkbox)) {echo "<th>Description</th>"; } ?>
                <?php //if (in_array("7", $sort_checkbox)) {echo "<th>Sales Representative ID</th>"; } ?>
                <?php //if (in_array("8", $sort_checkbox)) {echo "<th>Brand Id</th>"; } ?>
                <?php //if (in_array("9", $sort_checkbox)) {echo "<th>Quantity</th>"; } ?>
                <?php //if (in_array("10", $sort_checkbox)) {echo "<th>Unit Price</th>"; } ?>
                <?php //if (in_array("11", $sort_checkbox)) {echo "<th>Total</th>"; } ?>
                <th>Client ID</th>
                <th>Client Name</th>
                <th>Invoice/CM</th>               
                <th>Product ID</th>
                <th>Description</th>
                <th>Sales Representative ID</th>
                <th>Brand Id</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
        </thead>
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
                        <td><?= $result['date'] ?></td>  
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
<div class="row">
    <div class="col-md-12">
        <div class="order-footer-btn">
            <div class="input-link-report"><p>Download as</p></div>
            <button class="report-file-dtn rfile-btn" type="submit" name="download_pdf" value="PDF"><span class="icon-file-pdf pdf-icon"></span>pdf</button>
            <button class="report-file-dtn rfile-btn" type="submit" name="excel" value="excel"><span class="icon-file-excel pdf-icon"></span>Excel</button>
<!--                                                     <button class="btn btn-primary" type="submit" name="print_pdf" value="PDF">Print Pdf <i class="glyphicon glyphicon-file"></i></button>-->
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".pagination  .pagnton-arow a").addClass("glyphicon glyphicon-triangle-right");
        $(".pagination  .pagnton-arow-left a").addClass("glyphicon glyphicon-triangle-left");
        //  $(".pagination li a:contains('Prev')").addClass("prv");
    });
</script>
<script type="text/javascript">
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