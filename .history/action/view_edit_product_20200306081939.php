<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Product</h4>
                        <?php
            if (isset($_POST['submit'])) {

              $id = $_POST["product_id"];
              $product = $_POST["product"];
              $category_name = $_POST["category_name"];
              $price = $_POST["price"];
              $stock_count = $_POST["stock_count"];
              $info = $_POST["info"];
              $expiry_date = $_POST['expiry_date'];
              $shelf_life = $_POST['shelf_life'];
              $update_time = date('Y-m-d H:i:s');

              //header('Location: ../view_edit_product.php?message=success');


              //                      $sql = "UPDATE sales SET products = '" . $product . "' WHERE product_id = '" . $id . "' ";
              //                      $result = mysqli_query($dbc, $sql);


              $where = 'where id = "' . $id . '"';

              $table_name = "products";

              $data = array("name" => $product, "price" => $price, "info" => $info, "stock_count" => $stock_count, "expiry_date" => $expiry_date, "shelf_life" => $shelf_life, "last_update" => $update_time);

              updateData($dbc, $data, $table_name, $where);


              echo '<div class="alert alert-success">Product Changed</div>';
            }


            ?>
                        <?php

            if (isset($_POST['delete'])) {

              $sql = "DELETE FROM products WHERE id='" . $_POST['product_id'] . "'";
              $result = mysqli_query($dbc, $sql);
              if ($result) {

                echo '<div class="alert alert-success"> Deleted successfully</div>';
              } else {
                echo '<div class="alert alert-warning">Failed</div>';
              }
            }
            ?>
                        <div class="table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Image</th>
                                        <th>Product name</th>
                                        <th>(#)Price</th>
                                        <th>Category</th>
                                        <th>Amount In Stock</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                  $count = 0;
                  $product = get_from_db('products');
                  while ($row = mysqli_fetch_array($product)) :
                    $count++;
                    $category = get_from_another_table($row['category_id'], 'id', 'category');
                    // $today = date("Y-m-d H:i:s");
                    // $today = new DateTime($today);
                    // $last_update = new DateTime($row['last_update']);

                    // $interval = date_diff($last_update, $today);
                    // $interval =  $interval->format('%R%a');
                    $spoilage_date = $row['last_update'];
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
                        if ($interval >= ($row['shelf_life'] - 1)) {
                          echo $interval;
                        ?>
                                            <span class="badge badge-success">Viable</span>
                                            <?php
                        } else { #
                          echo $interval;
                        ?>
                                            <span class="badge badge-danger">Non-Viable</span>
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
