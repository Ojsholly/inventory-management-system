
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">View/Refund expense </h4>
              <div class="table-responsive">
                <?php
                if(isset($_GET['expense_id']))
                {
                  $expense_id = $_GET['expense_id'];
                }

  //code to approve certificate

                if(isset($_GET['AddRefund']))
                {

                  ?>

                  <script>window.location.href=add_refund.php?id=<?php echo $expense_id ?></script>

                  <?php
                }
                ?>
                <table id= "table" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>expense</th>
                      <th>Amount</th>
                      <th>Staff</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 0;
                    $expense = get_from_table('expenses', 'refund_status', 0);
                    while ($row = mysqli_fetch_array($expense)):
                      $count++;
                      ?>
                      <tr>
                        <td><?php echo $count?></td>
                        <td><?php echo ucfirst($row['name'])?></td>
                        <td><?php echo $row['amount']?></td>
                        <td><?php echo $row['staff_name']?></td>
                        <td>
                          <?php
                          if($row['amount'] == 0) {
                           echo ' Refunded ';
                         }
                         ?>

                         <?php
                         if($row['amount'] != 0) {
                           echo ' Not refunded ';
                         }
                         ?>

                       </td>
                       <td>
                        <button type="button" class="btn btn-icons btn-rounded btn-success" data-tooltip="View" data-toggle="modal" data-target="#viewModal<?php echo $count; ?>">
                          <i class="mdi mdi-eye"></i>
                        </button>

                        <a href="add_refund.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-icons btn-rounded btn-primary"  data-tooltip="Refund">
                          <i class="mdi mdi-check"></i>
                        </button>
                      </a>
                    </td>
                  </tr>
                  
                  <?php
                  echo '
                  <div class="modal fade" id="viewModal'.$count.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">View Expense Info.</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                  ';
                  echo '<br> Expense  : '.ucfirst($row['name']);
                  echo '<br> Amount : '.$row['amount'];
                  echo '<br> Staff Name : '.$row['staff_name'];
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

                <?php endwhile; ?>
              </tbody>
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
