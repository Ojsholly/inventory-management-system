
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="col-12">Company Profile</h4>
                        <?php

                            if(isset($_POST['submit'])){
                                $target = "products/";
                                $target = $target . basename( $_FILES['picture']['name']);
                                $filename=basename( $_FILES['picture']['name']);
                                move_uploaded_file($_FILES['picture']['tmp_name'], $target);

                                $name = mysqli_escape_string($dbc, $_POST['name']);
                                $address = mysqli_escape_string($dbc, $_POST['address']);
                                $email = mysqli_escape_string($dbc, $_POST['email']);
                                $number = mysqli_escape_string($dbc, $_POST['phone']);

                                $sql = "UPDATE company_details SET name = '".$name."', address = '".$address."', email = '".$email."', phone = '".$number."', logo = '".$filename."' WHERE id = 1";
                                $result = mysqli_query($dbc, $sql);
                                if ($result){
                                    echo '<div class="alert alert-success">Company Details Updated successfully</div>';
                                }else{
                                    echo '<div class="alert alert-warning">No changes were Made</div>';
                                }
                            }

                        ?>
                        <form class="form-sample" action="" method="post" enctype="multipart/form-data">
                            <?php
                            $query = "SELECT * FROM company_details WHERE id = 1";
                            $result2 = mysqli_query($dbc, $query);
                            $row = mysqli_fetch_assoc($result2);


                            ?>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Company Name</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Enter Company name" class="form-control" required="" name="name" value="<?php echo  htmlentities( $row['name'])?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Company Email</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Enter email" class="form-control" required="" name="email" value="<?php echo  htmlentities( $row['email'])?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Company Address</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Enter Address" class="form-control" required="" name="address" value="<?php echo  htmlentities( $row['address'])?>"/>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Enter amount of product in stock." class="form-control" required="" name="phone" value="<?php echo  htmlentities( $row['phone'])?>""/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Upload Logo</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control-file" name="picture">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-rounded btn-primary" name="submit">Submit</button>
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
