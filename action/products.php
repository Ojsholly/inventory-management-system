<?php
$ai = array( 'person'=>'bayo', 'food'=>'bolie');

?>
<div class="main-panel" style="width: 100%;">
    <div class="content-wrapper">
        <div class="row purchace-popup" >
		       <div class="col-md-3 grid-margin stretch-card">
              <div class="card" style="border-radius: 15px">
                <div class="card-body">

                    <form action="" method="post">
                        <input type="text" name="q"  value="<?php echo $name; ?>" hidden/>

                    <select class="js-example-basic-single" name="country" style= "width: 100%" id="select_id">
                        <option value="">Search Product</option>
                        <?php
                        $product = get_from_db('products');
                        while ($row=mysqli_fetch_assoc($product)){
                            $name = $row['name'];
                            echo '<option value="'.$row['name'].  '" >'.$row['name']. '         '.  '['.$row['stock_count'] .']'.  '</option>';
                        }
                        ?>

                    </select>
                        <br><br>

                            <h4 class="card-title" style="text-align: center" >Frequently Bought Products</h4>
                        <div class="anyClass" style="padding:0px; margin:0px;">
                        <?php

                        $sql = "SELECT products, SUM(quantity) AS TotalQuantity FROM sales GROUP BY products ORDER BY SUM(quantity) DESC LIMIT 10";
                        $result = mysqli_query($dbc, $sql);
                        while ($row = mysqli_fetch_array($result)):
                            $sql2 = "SELECT * FROM products WHERE name = '".$row['products']."'";
                            $result2 = mysqli_query($dbc, $sql2);
                           $row2 = mysqli_fetch_assoc($result2);
                        ?>
                                <div class="card-body frequently_bought" style="background-color: white;cursor:pointer; border-radius: 05px; padding: 3px; margin: 0px; <?php if ($row2['stock_count'] == 0) echo 'pointer-events: none;'?>" data_to_use="<?php echo $row2['name'].'-'.$row2['stock_count'].'-'.$row2['price'] ?>">
                                    <div class="clearfix" >
                                        <div class="float-left">
                                            <img src="products/<?php echo $row2['image'] == '' ? 'product.jpg' : $row2['image'] ?>" width="70px" height="100%" style="border-radius: 05px; padding-botto">
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 text-right" style="text-align: center"><?php echo $row['products'] .  '['.$row2['stock_count'] .']'?></h5>
                                            <div class="fluid-container">
                                                <p class="font-weight-medium text-right mb-0">#<?php echo number_format($row2['price'], 2); ?></p>
                                            </div>
                                            <button type="button" class="btn btn-icons btn-inverse-light" data-tooltip="Add to Cart" style="float: right">
                                                <i class="mdi mdi-cart"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <br>
<?php endwhile; ?>
                        </div>



                    </form>
                </div>
              </div>
            </div>
            <div class="col-md-9 grid-margin stretch-card">
              <div class="card" style="border-radius: 15px">
                <div class="card-body">
                  <h4 class="card-title"><i class='mdi mdi-cart'></i>Cart</h4>
                    <h5 class="message_ctn"></h5>
                  <div class="template-demo">
                      <div class="table-responsive">
                      <table id= "table" class="table table-bordered d_table_holder" width="100%">
                          <thead>
                          <tr>
                              <th>S/N</th>
                              <th>Name</th>
                              <th>Quantity</th>
                              <th>(#)Price</th>
                              <th>(#)Total</th>
                              <th>Action</th>
                          </tr>
                          </thead>
                          <tbody class="j_populate">
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                          </tr>

                          </tbody>
                          <tfoot>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="cart_full_amount"></th>
                            <th style="width: auto"><button type='button' data-tooltip='Check Out' class='btn btn-success btn-block' id="checkout_btn" data-toggle="modal" data-target="#exampleModal"><i class='mdi mdi-eye'></i> Checkout</button></th>
                          </tfoot>
                      </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>


            <div style="margin-top: 50px;" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Customer Checkout.</h5>
                            <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="do_not_submit">
                            <div class="modal-body">
                                <label for="exampleInputEmail1">List Of products to buy</label>
                                <div id="all_items_to_checkout">

                                </div>
                                    <label for="" id="total_price_holder"></label>

                                    <p id="error_text"></p>
                                    <p class="text-center" id="customer_change"></p>
                                    <div class="form-group">
                                        <input type="number" name="amount_collected" id="amount_collected" class="form-control" placeholder="Enter Amount collected">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary close_modal" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="print_slip_btn" data-toggle="modal" data-target="#slip_modal">Print Slip</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal -->
                <div style="margin: 20px; "  class="modal fade" id="slip_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <div class="modal-content" id="slip_modal_to_print" style="padding-top: 150px;box-sizing: border-box">
                            <?php
                                $company = get_from_db('company_details');
                                $row = mysqli_fetch_array($company);
                            ?>
                            <div style="display: flex; align-items: center; margin-left: 10px;">
                                <img src="products/<?php echo $row['logo'] == '' ? 'product.jpg' : $row['logo'] ?>"  width="40px" height="40px" style="margin-left: 100px;"> <h4 style="font-family: 'Courier New'"><?php echo $row['name'] ?></h4>
                            </div>
                            <!-- From here -->
                            <div class="modal-header" >

                                <div class="card-body">
                                    <h4 class="card-title" style="font-family: 'Courier New'">Receipt</h4>
                                    <p style="font-family: 'Courier New';">
                                        Date&Time: <?php date_default_timezone_set('Africa/Lagos'); echo date('d-m-Y   h:sa')?>
                                    </p>

                                    <table style="border: hidden; font-family: 'Courier New';" id="receipt_table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Items</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Bread</td>
                                                <td>50</td>
                                                <td>5000</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Bread</td>
                                                <td>50</td>
                                                <td>5000</td>
                                            </tr>
                                        <tr>
                                            <td colspan="3" align="right" style="font-weight: bold">Total Price:</td>
                                            <td>10000</td>
                                        </tr>
                                        </thead>
                                    </table>

                                    <div class="btn-to-hide">
                                        <button type="button" class="btn btn-secondary close_modal" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success" id="print_fn_slip" aria-label="Print">Print</button>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-body">
                                <div style="font-family: 'Courier New'">
                                    <p style="text-align: center;"><?php echo $row['address']?></p>
                                    <p style="text-align: center;"><?php echo $row['email']?>, <?php echo $row['phone']?> </p>
                                    <h5 class="transaction_id_holder"></h5>
                                </div>

                            <!-- To Here -->
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