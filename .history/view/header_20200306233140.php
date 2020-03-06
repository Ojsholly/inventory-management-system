<?php
session_start();
include('inc/functions.php');

include('inc/redirect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>POS | <?php echo $page ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">


    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />

    <!-- Bootstrap CDN -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <!---Datatables-->
    <!--    <script src = " https://code.jquery.com/jquery-3.3.1.js"> </script>-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"> </script>
    <script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
    </script>

    <!--select 2 --->
    <link rel="stylesheet" href="../dist/css/select2.css">
    <link rel="stylesheet" href="../dist/css/select2.min.css">

    <link href="select2.css" rel="stylesheet" />
    <script src="select2.js"></script>
    <script>
    $(document).ready(function() {
        $("#e1").select2();
    });
    </script>






    <style>
    .anyClass {
        height: 400px;
        overflow-y: scroll;
    }

    [data-tooltip] {
        position: relative;
        z-index: 2;
        cursor: pointer;
    }

    /* Hide the tooltip content by default */
    [data-tooltip]:before,
    [data-tooltip]:after {
        visibility: hidden;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=0);
        opacity: 0;
        pointer-events: none;
    }

    /* Position tooltip above the element */
    [data-tooltip]:before {
        position: absolute;
        bottom: 150%;
        left: 50%;
        margin-bottom: 5px;
        margin-left: -80px;
        padding: 7px;
        width: 160px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        background-color: #000;
        background-color: hsla(0, 0%, 20%, 0.9);
        color: #fff;
        content: attr(data-tooltip);
        text-align: center;
        font-size: 14px;
        line-height: 1.2;
    }

    /* Triangle hack to make tooltip look like a speech bubble */
    [data-tooltip]:after {
        position: absolute;
        bottom: 150%;
        left: 50%;
        margin-left: -5px;
        width: 0;
        border-top: 5px solid #000;
        border-top: 5px solid hsla(0, 0%, 20%, 0.9);
        border-right: 5px solid transparent;
        border-left: 5px solid transparent;
        content: " ";
        font-size: 0;
        line-height: 0;
    }

    /* Show tooltip content on hover */
    [data-tooltip]:hover:before,
    [data-tooltip]:hover:after {
        visibility: visible;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
        filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=100);
        opacity: 1;
    }

    hr {
        display: block;
        color: black;
        margin-top: 0.5em;
        margin-bottom: 0.5em;
        margin-left: auto;
        margin-right: auto;
        border-style: inset;
        border-width: 3px;
    }

    </style>

</head>

<body>
    <?php
    include('authenticate.php');
    ?>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" href="dashboard.php">
                    <img src="assets/images/logo.svg" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="dashboard.php">
                    <img src="assets/images/logo-mini.svg" alt="logo" />
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown d-none d-xl-inline-block">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <span class="profile-text">Hello, <?php echo $title ?> !</span>
                            <img class="img-xs rounded-circle" src="assets/images/faces/face1.png" alt="Profile image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <a class="dropdown-item" href="login.php?message=logout">
                                Sign Out
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas " id="sidebar"
                <?php if ($page == 'Products') echo 'style="display: none;"' ?>>
                <ul class="nav ">
                    <li class="nav-item nav-profile">
                        <div class="nav-link">
                            <div class="user-wrapper">
                                <div class="profile-image">
                                    <img src="assets/images/faces/face1.png" alt="profile image">
                                    <div class="text-wrapper">
                                        <p class="profile-name">Administrator</p>
                                        <div>
                                            <small class="designation text-muted"><?php echo $title; ?></small>
                                            <span class="status-indicator online"></span>
                                        </div>
                                    </div>
                                </div>
                                <a href="add_product.php" class="nav-link">
                                    <button class="btn btn-success btn-block">Add Product
                                        <i class="mdi mdi-plus"></i>
                                    </button></a>
                            </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <i class="menu-icon mdi mdi-television"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">
                            <i class="menu-icon mdi mdi-table"></i>
                            <span class="menu-title">Sell Items</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-content-copy"></i>
                            <span class="menu-title">Category</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="category">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="add_category.php">Add Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="view_edit_category.php">View/Edit Category</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-content-copy"></i>
                            <span class="menu-title">Products</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="products">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="add_product.php">Add Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="view_edit_product.php">View/Edit Products</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"
                        <?php if ($_SESSION['role'] == 0 || $_SESSION['role'] == 1) echo 'style="display: none;"' ?>>
                        <a class="nav-link" data-toggle="collapse" href="#Staff" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-content-copy"></i>
                            <span class="menu-title">Staff Management</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="Staff">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="create_staff.php">Create Staff</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="view_edit_staff.php">View/Edit Staff</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="view_login_activity.php">View Login Activity</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
