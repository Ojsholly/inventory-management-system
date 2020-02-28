<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/1/2018
 * Time: 3:27 AM
 */

if (!isset($_GET['submit']) && $_SERVER['PHP_SELF'] == '/pos/check_out.php'){
    redirect_to('products.php');
}
if (!isset($_POST['submit']) && $_SERVER['PHP_SELF'] == '/pos/report.php' && $_POST['report'] == '' && !isset($_POST['report'])){
    redirect_to('generate_report.php?message=Please Select Report To Generate');
}

if ($page == 'View Product Refund' && !isset($_GET['txn_id'])){
    redirect_to('refund_product.php?message=Please Enter Transaction ID');
}
if ($page == 'View Product Refund' && isset($_GET['txn_id'])) {
    $refund = get_from_table('sales', 'txn_id', $_GET['txn_id']);
    $num = mysqli_num_rows($refund);
    if ($num == 0) {
        redirect_to('refund_product.php?failed=Invalid Transaction ID');
    }
}