<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Login ACtivity</h4>

                        <div class="table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>IP Address</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    $login = get_from_db('login_activity');
                                    while ($row = mysqli_fetch_array($login)) :
                                        $count++;
                                        $first_name = get_from_another_table($row['username'], '', 'staff');

                                        $spoilage_date = date('Y-m-d', strtotime($row['last_update'] . ' +' . $row['shelf_life']  . " days"));
                                    ?>
                                    <tr>
                                        <td><?php echo $count ?></td>
                                        <td><img
                                                src="products/<?php echo $row['image'] == '' ? 'product.jpg' : $row['image'] ?>">
                                        </td>
                                        <td><?php echo ucfirst($row['name']) ?></td>
                                        <td><?php echo number_format($row['price'], 2) ?></td>
                                        <td><?php echo $category[0]['category_name'] = 0 ? 'Not Categorized' : $category[0]['category_name'] ?>
                                        </td>
                                        <td><?php echo $row['stock_count'] ?></td>
                                        <td>
                                            <?php
                                                $today = date("Y-m-d");
                                                if ($today >= $spoilage_date) {
                                                ?>
                                            <span class="badge badge-danger">Stale</span>
                                            <?php
                                                } else {
                                                ?>
                                            <span class="badge badge-success">Fresh</span>
                                            <?php
                                                }
                                                ?>
                                        </td>
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
                                    </tr>

                                    <?php
                                        echo '
                    <div class="modal fade" id="viewModal' . $count . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Category Info.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    ';
                                        echo '<br> Name : ' . ucfirst($row['name']);
                                        echo '<br> Price : ' . number_format($row['price'], 2);
                                        echo '<br> Category Name : ' . $category[0]['category_name'];
                                        echo '<br> Stock Count : ' . $row['stock_count'];
                                        echo '<br> Info : ' . $row['info'];
                                        echo '<br> Shelf Life : ' . $row['shelf_life'] . ' day(s)';
                                        echo '<br> Expiry Date : ' . $row['expiry_date'];
                                        echo '<br> Last Update : ' . $row['last_update'];
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
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category Info.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form class="form-sample" action="" method="post">
                    <p class="card-price">
                    <b>Category Info</b>
                    </p>
                    <div class="form-group row">

                    <div class="col-sm-6">';
                                        echo '<input type="text" class="form-control" required value="' . $row['id'] . '" name="product_id" hidden/>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label" >Name</label>
                    <div class="col-sm-6">';
                                        echo '<input type="text" class="form-control" required value="' . ucfirst($row['name']) . '" name="" disabled/>
                            <input type="text" class="form-control" required value="' . ucfirst($row['name']) . '" name="product" hidden/>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> Price</label>
                    <div class="col-sm-6"> ';
                                        echo '<input type="text" class="form-control" value="' . number_format($row['price'], 2) . '" name="price" >
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> Category Name</label>
                    <div class="col-sm-6"> ';
                                        echo '<input type="text" class="form-control" value="' . $category[0]['category_name'] . '" name="category_name" >
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> Stock Count</label>
                    <div class="col-sm-6"> ';
                                        echo '<input type="text" class="form-control" value="' . $row['stock_count'] . '" name="stock_count" >
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Shelf Life(In days)</label>
                    <div class="col-sm-6"> ';
                                        echo '<input type="number" min="1"  class="form-control" value="' . $row['shelf_life'] . '" name="shelf_life" required="" >
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> Info</label>
                    <div class="col-sm-6"> ';
                                        echo '<input type="text" class="form-control" value="' . $row['info'] . '" name="info" required="" >
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> Expiry Date</label>
                    <div class="col-sm-6"> ';
                                        echo '<input type="date" min="' . date('Y-m-d') . '" class="form-control" value="' . $row['expiry_date'] . '" name="expiry_date" >
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
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    ';
                                        echo "Are you sure you want to delete the following product?<br>";
                                        echo '<br>Product Name : ' . $row['name'];
                                        echo '<br> price : ' . $row['price'];
                                        echo '<br> Category Name : ' . $category[0]['category_name'];
                                        echo '<br> Stock Count : ' . $row['stock_count'];
                                        echo '<br> Info : ' . $row['info'];
                                        echo '
                    <form class="form-sample" action="" method="post">
                    <div class="form-group row">
                    <div class="col-sm-6">';
                                        echo '<input type="text" class="form-control" required value=" ' . $row['id'] . ' " name="product_id" hidden/>
                    </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-6">';
                                        echo '<input type="text" class="form-control" required value=" ' . $row['name'] . ' " name="category" hidden/>
                    </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-6"> ';
                                        echo '<textarea class="form-control" rows="7" name="price" hidden>' . $row['price'] . '</textarea>
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
