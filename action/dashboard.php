<?php
if ($title == "Analyst") {
    $sql = "SELECT MAX(price) as max_price, name FROM products ORDER BY price LIMIT 5";
    $results = mysqli_query($dbc, $sql);
    // var_dump($sql)."<br>";
    // exit(var_dump($results." ".mysqli_error($dbc)));
    $data = mysqli_fetch_assoc($results);

    $highest_price_product = $data["name"];
    $highest_price = $data["max_price"];
} else {
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row purchace-popup">
            <div class="col-12">
                <span class="d-block d-md-flex align-items-center">
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right"></p>
                                <div class="fluid-container">
                                    <h5 class="font-weight-medium text-right mb-0">
                                        <a href="view_edit_product.php">Products with Highest Prices</a>
                                    </h5>
                                    <table class="table table-hover table-responsive table-striped">
                                        <tr>
                                            <td>Product</td>
                                            <td>Price</td>
                                        </tr>
                                        <?php
                                        $query = "SELECT * FROM products ORDER BY price DESC LIMIT 10";
                                        $result = mysqli_query($dbc, $query);
                                        while ($row = mysqli_fetch_array($result)) :


                                        ?>
                                        <tr>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo number_format($row['price'], 2) ?></td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right"></p>
                                <div class="fluid-container">
                                    <h5 class="font-weight-medium text-right mb-0">
                                        <a href="recently_sold_products.php">Recently Sold Products</a>
                                    </h5>
                                    <table class="table table-hover table-responsive table-striped">
                                        <tr>
                                            <td>Product</td>
                                            <td>Quantity</td>
                                            <td>Price</td>
                                        </tr>
                                        <?php
                                        $query = "SELECT * FROM sales ORDER BY sales_id DESC LIMIT 10";
                                        $result = mysqli_query($dbc, $query);
                                        while ($row = mysqli_fetch_array($result)) :
                                            $sql = "SELECT * FROM products WHERE name = '" . $row['products'] . "'";
                                            $result2 = mysqli_query($dbc, $sql);
                                            while ($row2 = mysqli_fetch_array($result2)) :

                                        ?>
                                        <tr>
                                            <td><?php echo $row['products'] ?></td>
                                            <td><?php echo $row["quantity"] ?></td>
                                            <td><?php echo number_format($row['total'], 2) ?></td>
                                        </tr>
                                        <?php endwhile; ?>
                                        <?php endwhile; ?>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">
                                    Total Number of Products per Category</p>
                                <div class="fluid-container">
                                    <h5 class="font-weight-medium text-right mb-0">
                                    </h5>
                                    <table class="table table-responsive table-hover table-striped">
                                        <tr>
                                            <td>SN</td>
                                            <td>Product Name</td>
                                            <td>Frequency</td>
                                        </tr>
                                        <?php
                                        $count = 1;
                                        $sql = "SELECT * FROM category";
                                        $results = mysqli_query($dbc, $sql);
                                        if (mysqli_num_rows($results) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_array($results)) {

                                                $frequency = count_category_frequencies($row["id"]);
                                                echo "<tr><td>" . $count++ . "</td><td>" . $row["category_name"] . "</td><td>" . $frequency . "</td></tr>";
                                            }
                                        } else {
                                            echo "No categories added yet.";
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if ($title == "Analyst") {
            ?>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right"></p>
                                <div class="fluid-container">
                                    <h5 class="font-weight-medium text-right mb-0">
                                        Stale and Expiring Items
                                    </h5>
                                    <?php
                                        $sql = "SELECT * FROM products";
                                        $results = mysqli_query($dbc, $sql);
                                        $count = 1;
                                        while ($row = mysqli_fetch_array($results)) {

                                            $today = date("Y-m-d");
                                            $spoilage_date = date('Y-m-d', strtotime($row['last_update'] . ' +' . $row['shelf_life']  . " days"));
                                            $spoilage_date = date('Y-m-d', strtotime($spoilage_date . '-' . '1 days'));
                                            if ($today >= $spoilage_date) {
                                                echo "<tr><td>" . $count++ . "</td><td>" . $row["name"] . "</td><td><span class='badge badge-danger'>Stale</span></td></tr>";
                                            } elseif ($today >= $row["expiry_date"]) {

                                                echo "<tr><td>" . $count++ . "</td><td>" . $row["name"] . "</td><td><span class='badge badge-danger'>Expired</span></td></tr>";
                                            }
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            } elseif ($title == "Admin") {
            ?>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right"></p>
                                <div class="fluid-container">
                                    <h5 class="font-weight-medium text-right mb-0">
                                        <a href="view_edit_staff.php">Number of Analysts</a>
                                    </h5>
                                    <?php
                                        $sql = "SELECT COUNT(id) as count FROM staff WHERE role = 1";
                                        $results = mysqli_query($dbc, $sql);
                                        $data = mysqli_fetch_assoc($results);
                                        $analyst_count = $data["count"];
                                        ?>
                                    <h3 class="font-weight-bold"><a
                                            href="view_edit_staff.php"><?php echo $analyst_count ?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>

        </div>

        <div class="row">
            <div class="col-lg-7 grid-margin stretch-card">
                <!--weather card-->

                <!--weather card ends-->
            </div>

        </div>

    </div>
