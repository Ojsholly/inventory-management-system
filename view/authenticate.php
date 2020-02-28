<?php

if (!isset($_SESSION['email']) && !isset($_SESSION['role'])){
    echo '<br><br><br><br><br><br><br>';
    echo '<div class = "alert alert-warning" style="text-align: center"> You are not authorized to view this page <a href = login.php>Please login!</a> </div>';
    echo '<br><br><br><br><br><br><br><br><br><br><br><bbr><br><br>';
    include ('footer.php');
    die();
}

if($_SESSION['role'] == 1 ){
    if($page == 'Create Staff' || $page == 'View and Edit Staff'){
        echo '<br><br><br><br><br><br><br>';
        echo '<div class = "alert alert-warning" style="text-align: center"> You are not authorized to view this page <a href = login.php>Please login!</a> </div>';
        echo '<br><br><br><br><br><br><br><br><br><br><br><bbr><br><br>';
        include ('footer.php');
        die();
    }
}

if($_SESSION['role'] == 0){
    if($page == 'Generate Report' || $page == 'Report' || $page == 'Create Staff' || $page == 'View and Edit Refund'
        || $page == 'View and Edit Staff' || $page == 'Company Profile' || $page == 'Company Profile' || $page == 'View and Edit Expense'
        || $page == 'Add Expense' || $page == 'View Product Refund' || $page == 'Refund Product'){
        echo '<br><br><br><br><br><br><br>';
        echo '<div class = "alert alert-warning" style="text-align: center"> You are not authorized to view this page <a href = login.php>Please login!</a> </div>';
        echo '<br><br><br><br><br><br><br><br><br><br><br><bbr><br><br>';
        include ('footer.php');
        die();
    }

}

if($_SESSION['role'] == 0){
    $title = 'Staff';
}elseif($_SESSION['role'] == 1){
    $title = 'Manager';
}elseif($_SESSION['role'] == 2){
    $title = 'Admin';
}

?>