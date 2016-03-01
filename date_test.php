<?php
$timestamp    = strtotime('1-02-2016');
echo date('Y-m-d', strtotime('first day of this month', $timestamp)).'<br/>';
echo date('Y-m-d', strtotime('last day of this month', $timestamp)).'<br/>';

?>
