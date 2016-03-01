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