
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p>Recently Bought Products</p>
              </span>
            </div>
        </div>

        <div class="row">
            <?php
                    $query = "SELECT * FROM sales ORDER BY sales_id DESC LIMIT 12";
                    $result = mysqli_query($dbc, $query);
                    While ($row = mysqli_fetch_array($result)):
                        $sql = "SELECT * FROM products WHERE name = '".$row['products']."'";
                    $result2 = mysqli_query($dbc, $sql);
                        While ($row2 = mysqli_fetch_array($result2)):

            ?>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <img src="products/<?php echo $row2['image'] == '' ? 'product.jpg' : $row2['image'] ?>" width="50px" height="50px">
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right"><?php echo $row['quantity']. ' ' . $row['products']?></p>
                                <div class="fluid-container">
                                    <h5 class="font-weight-medium text-right mb-0">#<?php echo number_format($row['total'], 2)?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <?php endwhile;?>
                    <?php endwhile;?>

        </div>

        <div class="row">
            <div class="col-lg-7 grid-margin stretch-card">
                <!--weather card-->

                <!--weather card ends-->
            </div>

        </div>

    </div>