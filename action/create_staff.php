      <div class="main-panel">
              <div class="content-wrapper">
                  <div class="row">
                      <div class="col-lg-12 grid-margin stretch-card">
                          <div class="card">
                              <div class="card-body">
                         <?php

                               if(isset($_POST['submit'])){



                                $firstname = stripcslashes($_POST['firstname']);

                                $lastname = stripcslashes($_POST['lastname']);

                                $phone_number = stripcslashes($_POST['phone_number']);

                                $email = stripcslashes($_POST['email']);

                            //    $title = stripcslashes($_POST['title']);

                                   $password = md5(stripcslashes($_POST['password']));


                                   $role = stripcslashes($_POST['role']);

                                   date_default_timezone_set('Africa/Lagos');
                                   $date = date('Y-m-d');



                                   $data_exist = data_exist('staff','email',$email);

                                     if($data_exist)

                                    {
                                    echo "<div class='alert alert-warning'> Staff Already exists  </div>";
                                    }

                                    else {

                                $data = array("first_name"=>$firstname,"last_name"=>$lastname,"phone_number"=>$phone_number,"password"=>$password,"email"=>$email,"role"=>$role,"date"=>$date);

                                $table = "staff";
                                $staff = insertData($dbc,$data,$table);


                                    echo '<div class="alert alert-success"> Staff Added </div>';


                                  }
                              }
                                ?>
                                  <form class="form-sample" action="" method="post" enctype="multipart/form-data">
                                      <p class="card-description">
                                          <b>Personal Info</b>
                                      </p>
                                      <div class="form-group row">
                                          <label class="col-sm-2 col-form-label">First Name</label>
                                          <div class="col-sm-6">
                                              <input type="text" class="form-control" required name="firstname" />
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-sm-2 col-form-label">Last Name</label>
                                          <div class="col-sm-6">
                                              <input type="text" class="form-control" required name="lastname"/>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label class="col-sm-2 col-form-label">Phone Number</label>
                                          <div class="col-sm-6">
                                              <input type="text" class="form-control" required name="phone_number"/>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-sm-2 col-form-label">Email Address</label>
                                          <div class="col-sm-6">
                                              <input type="email" class="form-control" required name="email"/>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label class="col-sm-2 col-form-label">Password</label>
                                          <div class="col-sm-6">
                                              <input type="password" class="form-control" required name="password"/>
                                          </div>
                                      </div>
                                      
                                      <!--<div class="form-group row">
                                          <label class="col-sm-2 col-form-label" name="user_id">User ID</label>
                                          <div class="col-sm-6">
                                              <input type="text" class="form-control" required />
                                          </div>
                                      </div>-->

                                      <div class="form-group row">
                                          <label class="col-sm-2 col-form-label">Role</label>
                                          <div class="col-sm-6">
                                              <select class="form-control" name="role" >
                                                  <option value="">Select Role</option>
                                                  <option value="0">Staff</option>
                                                  <option value="1">Manager</option>
                                                  <option value="2">Administrator</option>
                                              </select>
                                          </div>
                                      </div>
                                  <button type="submit" class="btn btn-rounded btn-primary" name="submit">Save Profile</button>
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
