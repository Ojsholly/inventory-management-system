<?php
$page = 'modal';
include ('view/header.php');
?>
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-lg-4 grid-margin stretch-card">
        <div class="container">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#exampleModal">
            Checkout
          </button>

          <!-- Modal -->
          <div style="margin: 20px; "  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">

              <div class="modal-content" id="slip_modal_to_print" style="padding-top: 150px;box-sizing: border-box">
                <div class="modal-header" >

                        <div class="card-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <h4 class="card-title">Receipt</h4>
                            <p style="font-family: 'Courier New';">

                                Date&Time: <?php date_default_timezone_set('Africa/Lagos'); echo date('d-m-Y   h:sa')?>
                            </p>
                            <table style="border: hidden; font-family: 'Courier New';" width="100%">
                                <tbody><tr>
                                    <th>S/N</th>
                                    <th>Items</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
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
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-success" id="print_fn_slip" aria-label="Print">Print</button>
                        </div>


                </div>
                <div class="modal-body">

                </div>
              </div>
            </div>
          </div>         <!--weather card ends-->
        </div>

      </div>

    </div>


    <?php include ('view/footer.php'); ?>
