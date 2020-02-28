<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Money Given</h4>
                        <div class="table-responsive">
                            <table id= "table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Amount</th>
                                    <th>Mode Of Payment</th>
                                    <th>Transaction ID</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count = 0;
                                $money = get_from_db('txn_made');
                                while ($row = mysqli_fetch_array($money)):
                                    $count++;
                                    ?>
                                    <tr>
                                        <td><?php echo $count?></td>
                                        <td><?php echo ucfirst($row['name'])?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td><?php echo $row['amount']?></td>
                                        <td><?php echo $row['mode']?></td>
                                        <td><?php echo $row['txn_id']?></td>
                                        <td><?php echo $row['date']?></td>
                                        <td>
                                            <button type="button" class="btn btn-icons btn-rounded btn-success" data-tooltip="View"data-toggle="modal" data-target="#viewModal<?php echo $count; ?>">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                            <!--                                        <button type="button" class="btn btn-icons btn-rounded btn-warning"  data-tooltip="Edit"data-toggle="modal" data-target="#editModal--><?php //echo $count; ?><!--">-->
                                            <!--                                            <i class="mdi mdi-table-edit"></i>-->
                                            <!--                                        </button>-->
                                            <!--                                        <button type="button" class="btn btn-icons btn-rounded btn-danger"  data-tooltip="Delete" data-toggle="modal" data-target="#deleteModal--><?php //echo $count; ?><!--">-->
                                            <!--                                            <i class="mdi mdi-delete"></i>-->
                                            <!--                                        </button>-->
                                        </td>
                                        <?php
                                        echo '
                                    <div class="modal fade" id="viewModal'.$count.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">View</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    ';
                                        echo '<br>Name : '.ucfirst($row['name']);
                                        echo '<br>Phone Number : '.$row['phone'];
                                        echo '<br>Amount: '.$row['amount'];
                                        echo '<br>Mode of Payment: '.$row['mode'];
                                        echo '<br>Transaction ID: '.$row['txn_id'];
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
                                    <h5 class="modal-title" id="exampleModalLabel">Edit staff details.</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <form class="form-sample" action="action/edit_staff.php" method="post">
                                    <p class="card-amount">
                                    <b>staff Details</b>
                                    </p>
                                    <div class="form-group row">
                                    <div class="col-sm-6">';
                                        echo '<input type="text" class="form-control" required value=" '.$row['id'].' " name="staff_id" hidden/>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" >First Name</label>
                                    <div class="col-sm-6">';
                                        echo '<input type="text" class="form-control" required value=" '.ucfirst($row['first_name']).' " name="first_name"/>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" >Last Name</label>
                                    <div class="col-sm-6">';
                                        echo '<input type="text" class="form-control" required value=" '.ucfirst($row['last_name']).' " name="last_name"/>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email Address</label>
                                    <div class="col-sm-6"> ';
                                        echo '<input class="form-control" type="email" value="'.$row['email'].'" name="email">
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone Number</label>
                                    <div class="col-sm-6"> ';
                                        echo '<input class="form-control" type="tel" value="'.$row['phone_number'].'" name="phone_number">
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pin</label>
                                    <div class="col-sm-6"> ';
                                        echo '<input class="form-control" type="text" value="'.$row['pin'].'" name="pin">
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
                                    <h5 class="modal-title" id="exampleModalLabel">Delete staff.</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    ';
                                        echo "Are you sure you want to delete the following staff?<br>";
                                        echo '<br> Staff Name : '.ucfirst($row['first_name']) ." " .ucfirst($row['last_name']);
                                        echo '<br> Phone Number : '.$row['phone_number'];
                                        echo '<br> Email Address : '.$row['email'];
                                        echo '
                                    <form class="form-sample" action="action/delete_staff.php" method="post">
                                    <div class="form-group row">
                                    <div class="col-sm-6">';
                                        echo '<input type="text" class="form-control" required value=" '.$row['id'].' " name="staff_id" hidden/>
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
                                    </tr>
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
