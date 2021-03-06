<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View/Edit Product Category </h4>
                        <div class="table-responsive">
                            <?php if (isset($_GET['message']) && $_GET['message'] == 'success') echo '<div class = "alert alert-success">' . $_GET['message'] . '</div>';  ?>
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Number of Items</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                  $count = 0;
                  $category = get_from_db('category');
                  while ($row = mysqli_fetch_array($category)) :
                    $count++;
                    $frequency = count_category_frequencies($row[""]);
                  ?>
                                    <tr>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo ucfirst($row['category_name']) ?></td>
                                        <td><?php echo $row['description'] ?></td>
                                        <td></td>
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
                                            <!--                        <button type="button" class="btn btn-icons btn-rounded btn-danger"  data-tooltip="Delete"data-toggle="modal" data-target="#deleteModal--><?php //echo $count;
                                                                                                                                                                                              ?>
                                            <!--">-->
                                            <!--                          <i class="mdi mdi-delete"></i>-->
                                            <!--                        </button>-->
                                        </td>
                                    </tr>

                                    <?php
                    echo '
                    <div class="modal fade" id="viewModal' . $count . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Category Info.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    ';
                    echo '<br> Category Name : ' . ucfirst($row['category_name']);
                    echo '<br> Description : ' . $row['description'];
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
                  <h5 class="modal-title" id="exampleModalLabel">Edit Category Info.</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                  <form class="form-sample" action="action/edit_category.php" method="post">
                      <p class="card-description">
                          <b>Category Info</b>
                      </p>
                      <div class="form-group row">

                          <div class="col-sm-6">';
                    echo '<input type="text" class="form-control" required value=" ' . $row['id'] . ' " name="category_id" hidden/>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label" >Category Name</label>
                          <div class="col-sm-6">';
                    echo '<input type="text" class="form-control" required value=" ' . ucfirst($row['category_name']) . ' " name="category"/>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Category Description</label>
                          <div class="col-sm-6"> ';
                    echo '<textarea class="form-control" rows="7" name="description">' . $row['description'] . '</textarea>
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
                  <div class="modal fade" id="deleteModal' . $count . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Category.</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                  ';
                    echo "Are you sure you want to delete the following category?<br>";
                    echo '<br>Category Name : ' . ucfirst($row['category_name']);
                    echo '<br> Description : ' . $row['description'];
                    echo '
                  <form class="form-sample" action="action/delete_category.php" method="post">
                      <div class="form-group row">
                          <div class="col-sm-6">';
                    echo '<input type="text" class="form-control" required value=" ' . $row['id'] . ' " name="category_id" hidden/>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-6">';
                    echo '<input type="text" class="form-control" required value=" ' . ucfirst($row['category_name']) . ' " name="category" hidden/>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-6"> ';
                    echo '<textarea class="form-control" rows="7" name="description" hidden>' . $row['description'] . '</textarea>
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
