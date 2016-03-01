<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?= base_url() ?>css/bootstrap.css" rel='stylesheet' type='text/css' />
        <style>
            .table-bordered > thead > tr > th {
                color: #484852;
                font-size: 14px;
                font-family: 'Open Sans', sans-serif;
                font-weight: bold;
                line-height: 27px;
                text-align: center;
                border-bottom-width: 1px;
            }
            .table-bordered > tbody > tr > td  {
                border: 1px solid #ddd;
            }
            .table-bordered > tbody > tr > .sd {
                font-weight: bold;
                line-height: 60px;
                color: #484852;
            }
            .table-bordered > tbody > tr > .total-stl{
                color: #484852;
                font-size: 14px;
                font-family: 'Open Sans', sans-serif;
                font-weight: bold;
                line-height: 20px;
                text-align: right;

            }
            .table-bordered > tbody > tr > .total{
                text-align: right;
            }
            .tabl-bg{
                margin-top:60px;
            }
            .table-bordered {
                border: 1px solid #ddd;
            }
            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 20px;
            }
            table {
                background-color: transparent;
            }
            table {
                border-spacing: 0;
                border-collapse: collapse;
            </style>
        </head>
        <body>
<?php
$k=0;
?>
<table  class="table table-bordered" >                                                
                                            <thead>
                                                <tr >
                                                    <th ><strong>No.</strong></th>
                                                   <?php if (in_array("1", $sort_checkbox)) { echo "<th>Date</th>"; $k++; } ?>
                <?php if (in_array("2", $sort_checkbox)) {echo "<th>Client ID</th>"; $k++; } ?>
                <?php if (in_array("3", $sort_checkbox)) {echo "<th>Client Name</th>"; $k++; } ?>
                <?php if (in_array("4", $sort_checkbox)) {echo "<th>Invoice/CM</th>"; $k++; } ?>
                <?php if (in_array("5", $sort_checkbox)) {echo "<th>Product ID</th>"; $k++; } ?>
                <?php if (in_array("6", $sort_checkbox)) {echo "<th>Description</th>"; $k++; } ?>
                <?php if (in_array("7", $sort_checkbox)) {echo "<th>Sales Representative ID</th>"; $k++; } ?>
                <?php if (in_array("8", $sort_checkbox)) {echo "<th>Brand Id</th>"; $k++; } ?>
                <?php if (in_array("9", $sort_checkbox)) {echo "<th>Quantity</th>";  $k++;} ?>
                <?php if (in_array("10", $sort_checkbox)) {echo "<th>Unit Price</th>"; $k++; } ?>
                <?php if (in_array("11", $sort_checkbox)) {echo "<th>Total</th>"; $k++; } ?>
                                                </tr>
                                            </thead>
                                            <tbody>                                                    
                                                <?php
                                                $i = $row;
                                                $sub_total=0;
                                                //$per_page
                                                $sales_count = count($sales);
                                                if ($sales) {
                                                    foreach ($sales as $result) {
                                                        $i++;
                                                        $sub_total=$sub_total+$result['total'];
                                                        ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                             <?php if (in_array("1", $sort_checkbox)) {echo "<td>".$result['date']."</td>"; } ?>
                <?php if (in_array("2", $sort_checkbox)) {echo "<td>".$result['client_user_id']."</td>"; } ?>
                <?php if (in_array("3", $sort_checkbox)) {echo "<td>".$result['client_name']."</td>"; } ?>
                <?php if (in_array("4", $sort_checkbox)) {echo "<td>".$result['invoice_id']."</td>"; } ?>
                <?php if (in_array("5", $sort_checkbox)) {echo "<td>".$result['product_user_id']."</td>"; } ?>
                <?php if (in_array("6", $sort_checkbox)) {echo "<td>".$result['product_description']."</td>"; } ?>
                <?php if (in_array("7", $sort_checkbox)) {echo "<td>".$result['sales_representative_user_id']."</td>"; } ?>
                <?php if (in_array("8", $sort_checkbox)) {echo "<td>".$result['brand_user_id']."</td>"; } ?>
                <?php if (in_array("9", $sort_checkbox)) {echo "<td>".$result['quantity']."</td>"; } ?>
                <?php if (in_array("10", $sort_checkbox)) {echo "<td>".$result['price']."</td>"; } ?>
                <?php if (in_array("11", $sort_checkbox)) {echo "<td>".$result['total']."</td>"; } ?>
                                                        </tr>
                                                        <?php
                                                    }
                                                    if (in_array("11", $sort_checkbox)){
                                                    ?>
                                                        <tr><td colspan="<?=$k-1?>"></td><td style="font-weight: bold;">Total</td><td style="font-weight: bold;"><?=$sub_total?></td></tr>  
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
              </body>
    </html>