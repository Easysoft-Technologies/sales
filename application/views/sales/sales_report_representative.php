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
             .table-bordered > tbody > tr > .total_zero{
                text-align:center;
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
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabl-bg">
                            <table class="table table-bordered">
                                <thead>
<!--                                     <div class="row">
        <div class="col-md-6"><div class="table-leftcnt"><h4>Davines Sales By Customer</h4></div></div>
        <div class="col-md-6"><div class="table-leftcnt table-h4"><h4>5:45:25AM 18\2\1016</h4></div></div>
        </div>-->
                                    <?php
                                    // $month_array=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                    $month_array = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
                                    ?>
                                    <tr>
                                        <th colspan="3"></th>
                                        <?php
                                        for ($i = $start_month; $i <= $end_month; $i++) {
                                            ?>
                                            <th><?= $month_array[$i] ?>-<?= substr($year, 2) ?></th>
                                            <?php
                                        }
                                        ?>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($sales_representative_id) {
                                        $sale_condition = array('id' => $sales_representative_id);
                                    } else {
                                        $sale_condition = array();
                                    }
                                    $sales_representative = $this->obj_sales_representative->get_all($sale_condition);
                                    foreach ($sales_representative as $sales_results) {

                                        $condition['sales_representative_id'] = $sales_results['id'];
                                        $sales_representative_client = $this->obj_sales->get_all_representative_count($condition);
                                        $sales_representative_client_count = count($sales_representative_client);
                                        ?>
                                        <?php
                                        if ($sales_representative_client) {
                                            $rowspan = 1;
                                            for ($k=$start_month; $k<=$end_month; $k++) {
                                                $each_item_total[$k] = 0;
                                            }
                                            foreach ($sales_representative_client as $sales_representative_client_result) {

                                                for ($i = $start_month; $i <= $end_month; $i++) {
                                                    $from_date = $year . '-' . $i . -1;
                                                    $to_date = $year . '-' . $i . -31;
                                                    $conditions = array('date <=' => $to_date,
                                                        'date >= ' => $from_date);
                                                    $conditions['sales_representative_id'] = $sales_results['id'];
                                                    $conditions['client_id'] = $sales_representative_client_result['client_id'];
                                                    $sales = $this->obj_sales->get_all_data2($conditions, 'orders.id', 'asc');
                                                    if ($sales) {
                                                        $m = 0;
                                                        foreach ($sales as $result) {
                                                            $total_array[$i] = $result['total'];
                                                            $client_user_id_array[$m] = $sales_representative_client_result['client_user_id'];
                                                            $client_name_array[$m] = $sales_representative_client_result['client_name'];
                                                        }
                                                        ?>
                                                        <?php
                                                    }
                                                }
                                                $p = 1;
                                                ?>
                                                <?php
                                                ?>
                                                <tr>
                                                    <?php
                                                    if ($rowspan == 1) {
                                                        $rowspan++;
                                                        ?>
                                                        <td rowspan="<?= $sales_representative_client_count + 1 ?>" style="width:60px;"><?= $sales_results['sales_representative_user_id'] ?></td>
                                                        <?php
                                                    }
                                                    ?>
                                                    <td><?= $client_user_id_array[0] ?></td>
                                                    <td><?= $client_name_array[0] ?></td>
                                                    <?php
                                                    $grand_total = 0;
                                                    for ($p = $start_month; $p <= $end_month; $p++) {

                                                        $grand_total = $grand_total + $total_array[$p];

                                                        $each_item_total[$p] = $each_item_total[$p] + $total_array[$p];

                                                        if ($total_array[$p] > 0) {
                                                            ?>
                                                            <td class="total"><?= number_format($total_array[$p], 2) ?></td>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <td class="total_zero">-</td>
                                                            <?php
                                                        }
                                                        ?>
                                                        <?php
                                                    }
                                                    ?>
                                                    <td class="total"><?= number_format($grand_total, 2) ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?><td colspan="2" class="total-stl">Total</td>
                                        <?php
                                        $grand_total = 0;
                                        for ($p=$start_month;$p<=$end_month;$p++) {
                                            if(!isset($each_item_total[$p])){
                                              $each_item_total[$p]=0;  
                                            }
                                            $grand_total = $grand_total + $each_item_total[$p];
                                            if ($each_item_total[$p] > 0) {
                                                ?>
                                            <td class="total-stl"><?= number_format($each_item_total[$p], 2) ?></td>
                                            <?php
                                        } else {
                                            ?>
                                            <td class="total_zero">-</td>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <td class="total-stl"><?= number_format($grand_total, 2) ?></td>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </body>
    </html>