
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title"><?php if ($formatted_start_date == $formatted_end_date){
                    echo $report .' for '. $formatted_start_date;
                }else{
                echo $report. ' from '. $formatted_start_date .' to '. $formatted_end_date;
                } ?><p style="float: right; color: green;"><a href="generate_report.php "> Click here</a> to generate another report</p> </h1>
              <p></p>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" cellspacing="1" width="100%">

                <?php

                if(isset($_POST['submit']) && $_POST['report'] == 1){ //for sales report
                    //echo $_POST['start_date'];
                    //echo $_POST['end_date'];

                    $count = $total = 0;
                    $sql ="SELECT * FROM sales  WHERE (when_sold BETWEEN '".$_POST['start_date']."' AND '".$_POST['end_date']."')";
                    $sales = mysqli_query($dbc, $sql);
                    //print_r($sales);
                    if (mysqli_num_rows($sales) > 0){
                        echo ' <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                       <!-- <th>Trans. ID</th>-->
                        <th>Date Sold</th>
                    </tr>
                    </thead>

                    <tbody>';
                    while ($row = mysqli_fetch_assoc($sales)):
                        $count++;
                        $total += $row['total'];
                        if ($row['payment_method'] == 1){
                            $payment = 'Cash';
                        }elseif($row['payment_method'] == 0){
                            $payment = 'POS';
                        }

                        ?>



                        <tr>
                            <td><?php echo $count?></td>
                            <td><?php echo $row['products']?></td>
                            <td><?php echo $row['quantity']?></td>
                            <td><?php echo number_format($row['total'],2)?></td>
                            <td><?php echo $payment?></td>
<!--                            <td>--><?php //echo $row['txn_id']?><!--</td>-->
                            <td><?php echo $row['when_sold']?></td>
                        </tr>

                    <?php endwhile; ?>


                    </tbody>
                        <tr>
                            <td style="font-weight: bolder; font-size: 15px">Total Amount:</td>
                            <td></td>
                            <td></td>
                            <td style="font-weight: bolder; font-size: 15px">#<?php echo number_format($total, 2);  ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php }else{
                        echo '<div class= "alert alert-warning">No Report Could be Generated</div>';
                    }

                    ?>




                <?php
                }elseif (isset($_POST['submit']) && $_POST['report'] == 4){

                    $count = $total = 0;
                    $transaction_made = get_from_db('txn_made');
                    $sql ="SELECT * FROM txn_made WHERE (date BETWEEN '".$_POST['start_date']."' AND '".$_POST['end_date']."')";
                    $sales = mysqli_query($dbc, $sql);
                    //print_r($sales);
                    if (mysqli_num_rows($sales) > 0){
                        echo ' <thead>
                     <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Amount Given</th>
                                    <th>Mode Of Payment</th>
                                    <th>Transaction ID</th>
                                    <th>Date</th>
                                </tr>
                    </thead>

                    <tbody>';
                        while ($row = mysqli_fetch_array($sales)):
                            $count++;
                            $total += $row['amount'];

                            ?>



                            <tr>
                                <td><?php echo $count?></td>
                                <td><?php echo ucfirst($row['name'])?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo number_format($row['amount'], 2)?></td>
                                <td><?php echo $row['mode']?></td>
                                <td><?php echo $row['txn_id']?></td>
                                <td><?php echo $row['date']?></td>
                            </tr>

                        <?php endwhile; ?>


                        </tbody>
                        <tr>
                            <td style="font-weight: bolder; font-size: 15px">Total Amount:</td>
                            <td></td>
                            <td></td>
                            <td style="font-weight: bolder; font-size: 15px">#<?php echo number_format($total, 2);  ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php }else{
                        echo '<div class= "alert alert-warning">No Report Could be Generated</div>';
                    } ?>



                    <?php
                }elseif (isset($_POST['submit']) && $_POST['report'] == 6){

                    $count = $total = 0;
                    $product_refund = get_from_db('product_refund');
                    $sql ="SELECT * FROM product_refund WHERE (date_refunded BETWEEN '".$_POST['start_date']."' AND '".$_POST['end_date']."')";
                    $sales = mysqli_query($dbc, $sql);
                    //print_r($sales);
                    if (mysqli_num_rows($sales) > 0){
                        echo ' <thead>
                     <tr>
                                    <th>S/N</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Reason</th>
                                    <th>Transaction ID</th>
                                    <th>Date Refunded</th>
                                </tr>
                    </thead>

                    <tbody>';
                        while ($row = mysqli_fetch_array($sales)):
                            $count++;
                            $total += $row['amount'];

                            ?>



                            <tr>
                                <td><?php echo $count?></td>
                                <td><?php echo ucfirst($row['product'])?></td>
                                <td><?php echo $row['quantity'] ?></td>
                                <td><?php echo number_format($row['amount'], 2)?></td>
                                <td><?php echo $row['why_return']?></td>
                                <td><?php echo $row['txn_id']?></td>
                                <td><?php echo $row['date_refunded']?></td>
                            </tr>

                        <?php endwhile; ?>


                        </tbody>
                        <tr>
                            <td style="font-weight: bolder; font-size: 15px">Total Amount:</td>
                            <td></td>
                            <td></td>
                            <td style="font-weight: bolder; font-size: 15px">#<?php echo number_format($total, 2);  ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php }else{
                        echo '<div class= "alert alert-warning">No Report Could be Generated</div>';
                    } ?>







                    <?php
                }elseif (isset($_POST['submit']) && $_POST['report'] == 5){

                    $count = $total = 0;
                    $transaction_made = get_from_db('txn_made');
                    $sql ="SELECT * FROM txn_recieved WHERE (date BETWEEN '".$_POST['start_date']."' AND '".$_POST['end_date']."')";
                    $sales = mysqli_query($dbc, $sql);
                    //print_r($sales);
                    if (mysqli_num_rows($sales) > 0){
                        echo ' <thead>
                     <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Amount Received</th>
                                    <th>Mode Of Payment</th>
                                    <th>Transaction ID</th>
                                    <th>Date</th>
                                </tr>
                    </thead>

                    <tbody>';
                        while ($row = mysqli_fetch_array($sales)):
                            $count++;
                            $total += $row['amount'];

                            ?>



                            <tr>
                                <td><?php echo $count?></td>
                                <td><?php echo ucfirst($row['name'])?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo number_format($row['amount'], 2)?></td>
                                <td><?php echo $row['mode']?></td>
                                <td><?php echo $row['txn_id']?></td>
                                <td><?php echo $row['date']?></td>
                            </tr>

                        <?php endwhile; ?>


                        </tbody>
                        <tr>
                            <td style="font-weight: bolder; font-size: 15px">Total Amount:</td>
                            <td></td>
                            <td></td>
                            <td style="font-weight: bolder; font-size: 15px">#<?php echo number_format($total, 2);  ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php }else{
                        echo '<div class= "alert alert-warning">No Report Could be Generated</div>';
                    } ?>




                    <?php
                }elseif (isset($_POST['submit']) && $_POST['report'] == 7){

                    $count = $total = 0;
                    $sql ="SELECT * FROM expenses  WHERE (date BETWEEN '".$_POST['start_date']."' AND '".$_POST['end_date']."')";
                    $sales = mysqli_query($dbc, $sql);
                    //print_r($sales);
                    if (mysqli_num_rows($sales) > 0){
                        echo ' <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Staff Name</th>
                        <th>Expense</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                    </thead>

                    <tbody>';
                        while ($row = mysqli_fetch_assoc($sales)):
                            $count++;
                            $total += $row['amount'];
                            ?>
                            <tr>
                                <td><?php echo $count?></td>
                                <td><?php echo $row['staff_name']?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo number_format($row['amount'],2)?></td>
                                <td><?php echo $row['date']?></td>
                            </tr>

                        <?php endwhile; ?>


                        </tbody>
                        <tr>
                            <td style="font-weight: bolder; font-size: 15px">Total Amount:</td>
                            <td></td>
                            <td></td>
                            <td style="font-weight: bolder; font-size: 15px">#<?php echo number_format($total, 2);  ?></td>
                            <td></td>
                            <td></td>
                        </tr>



                    <?php }else{
                        echo '<div class= "alert alert-warning">No Report Could be Generated</div>';
                    } ?>








                    <?php
                }elseif(isset($_POST['submit']) && $_POST['report'] == 2){

                    echo ' <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Staff Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                    </tr>
                    </thead>

                    <tbody>';

                $count = $total = 0;
                $staffs = get_from_db('staff');
                while ($row = mysqli_fetch_array($staffs)):
                    $count++;
                    ?>


                    <tr>
                        <td><?php echo $count?></td>
                        <td><?php echo $row['first_name'] .$row['last_name'] ?></td>
                        <td><?php echo $row['phone_number']?></td>
                        <td><?php echo $row['email']?></td>
                    </tr>

                <?php endwhile; ?>



                </tbody>


                <?php }elseif(isset($_POST['submit']) && $_POST['report'] == 3){ #product
                echo ' <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Product</th>
                         <th>Category</th>
                        <th>Price</th>
                         <th>Number in Stock</th>
                    </tr>
                    </thead>

                    <tbody>';

                $count = $total = 0;
                $products = get_from_db('products');
                while ($row = mysqli_fetch_array($products)):
                    $count++;
                    $category=get_from_another_table($row['category_id'], 'id', 'category');
                    ?>


                    <tr>
                        <td><?php echo $count?></td>
                        <td><?php echo ucfirst($row['name'])?></td>
                        <td><?php echo $category[0]['category_name']?></td>
                        <td><?php echo $row['price']?></td>
                        <td><?php echo $row['stock_count']?></td>
                    </tr>

                <?php endwhile; ?>


                </tbody>

                <?php
                }elseif(isset($_POST['submit'])&& $_POST['report'] = ''){
                    $_SESSION['message'] = 'stop oh';
                } ?>

                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7 grid-margin stretch-card">
        <!--weather card-->

        <!--weather card ends-->
      </div>

    </div>

  </div>
