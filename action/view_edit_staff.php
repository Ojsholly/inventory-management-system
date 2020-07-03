<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php

                        if (isset($_POST['submit'])) {

                            $firstname = mysqli_real_escape_string($dbc, $_POST['first_name']);
                            $lastname = mysqli_real_escape_string($dbc, $_POST['last_name']);
                            $phone_number = mysqli_real_escape_string($dbc, $_POST['phone_number']);
                            $role = mysqli_real_escape_string($dbc, $_POST['role']);
                            $email = $_POST['email'];


                            $sql = "UPDATE staff SET first_name = '" . $firstname . "', last_name = '" . $lastname . "', email = '" . $email . "', role = '" . $role . "' WHERE id = '" . $_POST['staff_id'] . "'";
                            $result = mysqli_query($dbc, $sql);
                            if ($result) {
                                echo '<div class="alert alert-success"> Updated successfully</div>';
                            } else {
                                echo '<div class="alert alert-warning">No changes were Made</div>';
                            }
                        } elseif (isset($_POST['delete'])) {

                            $sql = "DELETE FROM staff WHERE id='" . $_POST['staff_id'] . "'";
                            $result = mysqli_query($dbc, $sql);
                            if ($result) {

                                echo '<div class="alert alert-success"> Deleted successfully</div>';
                            } else {
                                echo '<div class="alert alert-warning">Failed</div>';
                            }
                        }
                        ?>
                        <h4 class="card-title">View/Edit Staffs </h4>
                        <div class="table-responsive">
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Email Address</th>
                                        <th>Phone Number</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $count = 0;
                                    $staffs = get_from_db('staff');
                                    while ($row = mysqli_fetch_array($staffs)) :
                                        $count++;
                                        if ($row['role'] == 0) {
                                            $title = 'Staff';
                                        } elseif ($row['role'] == 1) {
                                            $title = 'Analyst';
                                        } elseif ($row['role'] == 2) {
                                            $title = 'Admin';
                                        }
                                    ?>
                                    <tr>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo ucfirst($row['first_name']) . " " . ucfirst($row['last_name']) ?>
                                        </td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['phone_number'] ?></td>
                                        <td><?php echo $title ?></td>
                                        <td>
                                            <button type="button" class="btn btn-icons btn-rounded btn-success"
                                                data-tooltip="View" data-toggle="modal"
                                                data-target="#viewModal<?php echo $count; ?>">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-icons btn-rounded btn-warning"
                                                data-tooltip="Edit" data-toggle="modal"
                                                data-target="#editModal<?php echo $count; ?>">
                                                <i class="mdi mdi-table-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-icons btn-rounded btn-danger"
                                                data-tooltip="Delete" data-toggle="modal"
                                                data-target="#deleteModal<?php echo $count; ?>">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </td>
                                        <?php
                                            echo '
                                    <div class="modal fade" id="viewModal' . $count . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">View staff Profile.</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    ';
                                            echo '<br> Staff Name : ' . ucfirst($row['first_name']) . " " . ucfirst($row['last_name']);
                                            echo '<br> Phone Number : ' . $row['phone_number'];
                                            echo '<br> Email Address : ' . $row['email'];
                                            echo '<br> Role: ' . $title;
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
                                    <div class="modal fade" id="editModal' . $count . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit staff details.</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <form class="form-sample" action="" method="post">
                                    <p class="card-amount">
                                    <b>staff Details</b>
                                    </p>
                                    <div class="form-group row">
                                    <div class="col-sm-6">';
                                            echo '<input type="text" class="form-control" required value=" ' . $row['id'] . ' " name="staff_id" hidden/>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" >First Name</label>
                                    <div class="col-sm-6">';
                                            echo '<input type="text" class="form-control" required value=" ' . ucfirst($row['first_name']) . ' " name="first_name"/>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" >Last Name</label>
                                    <div class="col-sm-6">';
                                            echo '<input type="text" class="form-control" required value=" ' . ucfirst($row['last_name']) . ' " name="last_name"/>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email Address</label>
                                    <div class="col-sm-6"> ';
                                            echo '<input class="form-control" type="email" value="' . $row['email'] . '" name="email">
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone Number</label>
                                    <div class="col-sm-6"> ';
                                            echo '<input class="form-control" type="tel" value="' . $row['phone_number'] . '" name="phone_number">
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Role</label>
                                    <div class="col-sm-6"> ';
                                            echo ' <select class="form-control" name="role">';
                                            echo '<option value="' . $row['role'] .  '" >' . $title . '</option>';
                                            echo '     <option value="0">Staff</option>
                                               <option value="1">Analyst</option>
                                               <option value="2">Administrator</option>
                                              </select>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
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
                                    <div class="modal fade" id="deleteModal' . $count . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            echo '<br> Staff Name : ' . ucfirst($row['first_name']) . " " . ucfirst($row['last_name']);
                                            echo '<br> Phone Number : ' . $row['phone_number'];
                                            echo '<br> Email Address : ' . $row['email'];
                                            echo '
                                    <form class="form-sample" action="" method="post">
                                    <div class="form-group row">
                                    <div class="col-sm-6">';
                                            echo '<input type="text" class="form-control" required value=" ' . $row['id'] . ' " name="staff_id" hidden/>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
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
