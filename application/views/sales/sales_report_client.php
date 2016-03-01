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
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabl-bg">
                            <table class="table table-bordered" cellpadding="3" cellspacing="3">
                                <thead>
                                    <?php
                                    // $month_array=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                    $month_array = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
                                    ?>
                                    <tr>
                                        <th colspan="2"></th>
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
                                    if ($client_id) {
                                        $sale_condition = array('id' => $client_id);
                                    } else {
                                        $sale_condition = array();
                                    }                                 
                                    $client = $this->obj_client->get_all($sale_condition);
                                    foreach ($client as $client_results) {    
                                            for ($p=$start_month; $p<=$end_month; $p++) {
                                                $each_item_total[$p] = 0;
                                            }
                                            
                                                for ($i = $start_month; $i <= $end_month; $i++) {
                                                    $from_date = $year . '-' . $i . -1;
                                                    $to_date = $year . '-' . $i . -31;
                                                    $conditions = array('date <=' => $to_date,
                                                        'date >= ' => $from_date);
                                                    $conditions['client_id'] = $client_results['id'];                                                
                                                    $sales = $this->obj_sales->get_all_data_client($conditions, 'orders.id', 'asc');
                                                    if ($sales) {
                                                        $m = 0;
                                                        foreach ($sales as $result) {
                                                            $total_array[$i] = $result['total'];
                                                            $client_user_id_array[$m] = $client_results['client_user_id'];
                                                            $client_name_array[$m] = $client_results['client_name'];
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
                                                            <td>-</td>
                                                            <?php
                                                        }
                                                        ?>
                                                        <?php
                                                    }
                                                    ?>
                                                    <td class="total"><?= number_format($grand_total, 2) ?></td>
                                                </tr>
                                                <?php
                                            
                                       
                                        ?>
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