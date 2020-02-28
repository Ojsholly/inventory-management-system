<?php
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$start_date = new DateTime($start_date);
$end_date = new DateTime($end_date);
$formatted_start_date = $start_date->format('M d Y');
$formatted_end_date = $end_date->format('M d Y');
?>
<?php

switch ($_POST['report']){
    case '1':
        $report = 'Sales Report';
        break;
    case '2':
        $report = 'Staff Report';
        break;
    case '3':
        $report = 'Product Report';
        break;
    case '4':
        $report = 'Money Given Report';
        break;
    case '5':
        $report = 'Money Received Report';
        break;
    case '6':
        $report = 'Refunds Report';
        break;
    case '7':
        $report = 'Expense Report';
        break;
}
?>
<?php if ($formatted_start_date == $formatted_end_date){
   $page = $report .' for '. $formatted_start_date;
}else{
    $page = $report. ' from '. $formatted_start_date .' to '. $formatted_end_date;
} ?>
<?php
//$page = 'Report';
include ('view/header.php');
include ('action/report.php');
include ('view/footer.php');
?>