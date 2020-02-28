
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
          <?php
          if(isset($_POST['return'] )) {
			  if ($_POST['quantity'] == '') {
				  $error = '<div class = "alert alert-danger">Quantity cannot be empty</div>';
			  }else{

              $price = ($_POST['amount']/$_POST['real_quantity']) * $_POST['quantity'].'<br>'; //refunded price

              $sales_price = ($_POST['real_quantity'] - $_POST['quantity']) * ($_POST['amount']/$_POST['real_quantity']);

              $product = get_from_table('sales', 'sales_id', $_POST['sales_id']);
              $row = mysqli_fetch_assoc($product);
              if (insert_refund($row, $price)) {
                  if (update_quantity($sales_price)) {
                      if (update_stock($row)) {
                          $msg = 'Products Refunded';
                          if(delete_sales_refunded()){
                              $msg = 'Products Refunded';
						     }
                          }
                      }
                  }
              }
          }
          ?>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <?php if(isset($msg)) echo '<div class = "alert alert-success">'.$msg. '</div>'?>
				<?php if(isset($error)) echo $error?>
              <h4 class="card-title">View Product Refund </h4>
              <div class="table-responsive">
                <table id= "table" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Product</th>
                      <th>Quantity</th>
                        <th>Amount</th>
                        <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = $total = 0;
                    $refund = get_from_table('sales', 'txn_id', $_GET['txn_id']);
                    $num = mysqli_num_rows($refund);
                    while ($row = mysqli_fetch_array($refund)):
                      $count++;
                      $total += $row['total']
                        ?>
                      <tr>
                        <td><?php echo $count?></td>
                        <td><?php echo ucfirst($row['products'])?></td>
                        <td><?php echo $row['quantity']?></td>
                        <td><?php echo number_format($row['total'],2)?></td>
                          <td><?php echo $row['when_sold']?></td>
                       <td>
                        <button type="button" class="btn btn-icons btn-rounded btn-success" data-tooltip="View" data-toggle="modal" data-target="#viewModal<?php echo $count; ?>">
                          <i class="mdi mdi-eye"></i>
                        </button>

                       <button type="button" class="btn btn-icons btn-rounded btn-primary"  data-toggle="modal" data-target="#editModal<?php echo $count; ?>"  data-tooltip="Refund" >
                          <i class="mdi mdi-barcode"></i>
                        </button>

                    </td>
                  </tr>

                  <?php
                        #VIEW MODAL
                  echo '
                  <div class="modal fade" id="viewModal'.$count.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">View Product Info.</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                  ';
                  echo '<br> Product  : '.ucfirst($row['products']);
                  echo '<br> Quantity : '.$row['quantity'];
                  echo '<br> Amount  : '.$row['total'];
                  echo '<br> Date:'.$row['when_sold'] ;
                  echo '
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  </div>
                  </div>
                  </div>
                  ';
                  ?>
                <?php
                        #EDIT MODAL
                echo '
                <div class="modal fade" id="editModal'.$count.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Refund'; echo " ". $row['products'].'</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form class="form-sample" action="" method="post">
                <p class="card-amount">
                <b></b>
                </p>
                <div class="form-group row">
                <div class="col-sm-6">';
                echo '<input type="text" class="form-control" required value="'.$row['sales_id'].'" name="sales_id" hidden/>
                     <input type="text" class="form-control" required value="'.$row['quantity'].'" name="real_quantity" hidden/>
                     <input type="text" class="form-control" required value="'.$row['total'].'" name="amount" hidden/>
                </div>
                </div>
                <div class="form-group row">
                <label class="col-sm-3 col-form-label" >Who</label>
                <div class="col-sm-6">';
                echo '<input type="text" class="form-control" required value="" name="who"/>
                </div>
                </div>
                <div class="form-group row">
                <label class="col-sm-3 col-form-label" >Select Quantity</label>
                <div class="col-sm-6">';
                  echo ' <select name="quantity" style= "width: 100%";>';
                  echo '<option value="">Select Quantity to Return</option>';
                  for ($i = 1; $i <= $row['quantity']; $i++ ){
                      echo   '<option value="'.$i.'">'.$i.'</option>';
                  }
                  echo '</select>';
               echo '</div>
                </div>
                <div class="form-group row">
                <label class="col-sm-3 col-form-label">Reason For Returning</label>
                <div class="col-sm-6"> ';
                echo ' <textarea class="form-control" name="why"></textarea>';
                echo '  </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="return">Refund ';echo $row['products'].'</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                        </div>
                        </div>
                        </div>
                            ';
                ?>

                <?php endwhile;?>
              </tbody>
                    <tr>
                        <td style="font-weight: bolder; font-size: 15px">Total Amount:</td>
                        <td></td>
                        <td></td>
                        <td style="font-weight: bolder; font-size: 15px">#<?php echo number_format($total, 2);  ?></td>
                        <td></td>
                        <td>

                        </td>
                    </tr>
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
