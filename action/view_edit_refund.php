
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">View/Edit Refund </h4>
            <div class="table-responsive">
              <table id= "table" class="table table-bordered">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Refund</th>
                    <th>Amount</th>
                    <th>Staff</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $count = 0;
                  $refund = get_from_db('refund');
                  while ($row = mysqli_fetch_array($refund)):
                    $count++;
                     $sql = "SELECT * FROM expenses WHERE id =  '".$row['expense_id']."' ";
                     $result = mysqli_query($dbc, $sql);
                     while ($row2 = mysqli_fetch_array($result)):
                    ?>
                    <tr>
                      <td><?php echo $count?></td>
                      <td><?php echo $row2['name']?></td>
                      <td><?php echo $row['amount']?></td>
                      <td><?php echo $row['staff_name']?></td>
                      <td>
                        <button type="button" class="btn btn-icons btn-rounded btn-success" data-tooltip="View" data-toggle="modal" data-target="#viewModal<?php echo $count; ?>">
                          <i class="mdi mdi-eye"></i>
                        </button>
<!--                        <button type="button" class="btn btn-icons btn-rounded btn-warning"  data-tooltip="Edit" data-toggle="modal" data-target="#editModal--><?php //echo $count; ?><!--">-->
<!--                          <i class="mdi mdi-table-edit"></i>-->
<!--                        </button>-->
<!--                        <button type="button" class="btn btn-icons btn-rounded btn-danger"  data-tooltip="Delete" data-toggle="modal" data-target="#deleteModal--><?php //echo $count; ?><!--">-->
<!--                          <i class="mdi mdi-delete"></i>-->
<!--                        </button>-->
                      </td>
                    </tr>
                    <?php
                    echo '
                    <div class="modal fade" id="viewModal'.$count.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Refund Info.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    ';
                    echo '<br> Refund Item : '.ucfirst($row2['name']);
                    echo '<br> Amount : '.$row['amount'];
                    echo '<br> Staff : '.$row['staff_name'];
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
                    echo '
                    <div class="modal fade" id="editModal'.$count.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Refund details.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form class="form-sample" action="action/edit_refund.php" method="post">
                    <p class="card-amount">
                    <b>Refund Details</b>
                    </p>
                    <div class="form-group row">
                    <div class="col-sm-6">';
                    echo '<input type="text" class="form-control" required value=" '.$row['id'].' " name="refund_id" hidden/>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label" >refund Name</label>
                    <div class="col-sm-6">';
                    echo '<input type="text" class="form-control" required value=" '.ucfirst($row['refund_name']).' " name="refund"/>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Refund Amount</label>
                    <div class="col-sm-6"> ';
                    echo '<input class="form-control" type="number" value="'.$row['amount'].'" name="amount">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Staff</label>
                    <div class="col-sm-6"> ';
                    echo '<input class="form-control" type="text" value="'.$row['staff_name'].'" name="staff_name">
                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>
                    ';
                    ?>
                    <?php
                    echo '
                    <div class="modal fade" id="deleteModal'.$count.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete refund.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    ';
                    echo "Are you sure you want to delete the following refund?<br>";
                    echo '<br>refund Name : '.ucfirst($row['refund_name']);
                    echo '<br> Amount : '.$row['amount'];
                    echo '<br> Staff : '.$row['staff_name'];
                    echo '
                    <form class="form-sample" action="action/delete_refund.php" method="post">
                    <div class="form-group row">
                    <div class="col-sm-6">';
                    echo '<input type="text" class="form-control" required value=" '.$row['id'].' " name="refund_id" hidden/>
                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    ';
                    ?>
                  <?php endwhile; ?>
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
