<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="col-12">Add A new Product.</h4>
                        <?php
                        $product_name = '';
                        $category = '';

                        $price = '';
                        $info = '';
                        $expiry_date = '';
                        $shelf_life = '';
                        $stock_count = '';
                        $product_name = '';

                        if (isset($_POST['submit'])) {


                            if ($_POST['category'] == '') {

                                echo "<div class='alert alert-warning'> Category cannot be empty  </div>";
                            } else {
                                $product_name = trim(stripcslashes($_POST['product_nam']));

                                $category = stripcslashes($_POST['category']);

                                $price = stripcslashes($_POST['price']);

                                $shelf_life = stripcslashes($_POST['shelf_life']);

                                $expiry_date = stripcslashes($_POST['expiry_date']);

                                $update_time = date('Y-m-d');

                                $target = "products/";
                                $target = $target . basename($_FILES['picture']['name']);

                                $filename = basename($_FILES['picture']['name']);

                                //Writes the Filename to the server
                                move_uploaded_file($_FILES['picture']['tmp_name'], $target);

                                // $product_img = 'C:\xampp\htdocs\pos\api\uploads';

                                $info = stripcslashes($_POST['info']);

                                $stock_count = stripcslashes($_POST['amount']);

                                $table = 'products';


                                $data_exist = data_exist($table, 'name', $product_name);

                                if ($data_exist) {
                                    echo "<div class='alert alert-warning'> Product Already exists  </div>";
                                } else {



                                    $data = array("name" => $product_name, "category_id" => $category, "price" => $price, "image" => $filename, "info" => $info, "stock_count" => $stock_count, "shelf_life" => $shelf_life, "expiry_date" => $expiry_date);

                                    $table = "products";
                                    $staff = insertData($dbc, $data, $table);


                                    echo '<div class="alert alert-success"> New product successfully added. </div>';
                                }
                            }
                        }
                        ?>
                        <form class="form-sample" action="" method="post" enctype="multipart/form-data">
                            <p class="card-description">
                                <b>Product Info</b>
                            </p>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Enter product name." class="form-control" required="" value="<?php echo $_POST['product_nam'] ?>" name="product_nam" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Barcode</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Barcode" class="form-control" required="" value="<?php echo $_POST['product_nam'] ?>" name="barcode" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product Category</label>

                                <div class="col-sm-6">
                                    <select class="js-example-basic-single" name="category" style="width: 100%">
                                        <option value="">Select Category</option>
                                        <?php

                                        $category = getAllData($dbc, "category");

                                        foreach ($category as $item) {
                                            //    echo $item['filename'];
                                            //  echo $item['filepath'];

                                            // to know what's in $item
                                        ?>
                                            <option value="<?php echo $item['id']; ?>"><?php echo $item['category_name']; ?>
                                            </option><?php     // echo '<pre>'; var_dump($category);
                                                    }

                                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Enter product price." class="form-control" required="" value="<?php echo $price ?>" name="price" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Amount Of Product In Stock</label>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Enter amount of product in stock." class="form-control" required="" name="amount" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Expiry Date</label>
                                <div class="col-sm-6">
                                    <input type="date" min="<?php echo date('Y-m-d') ?>" class="form-control" required="" name="expiry_date" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Shelf Life</label>
                                <div class="col-sm-6">
                                    <input type="number" placeholder="Enter shelf life ." class="form-control" required="" name="shelf_life" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Additional Product Information</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" rows="7" placeholder="Enter product info." value="<?php echo $info ?>" name="info"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Upload Product Image</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control-file" name="picture">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-rounded btn-primary" name="submit">Add Product</button>
                        </form>
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