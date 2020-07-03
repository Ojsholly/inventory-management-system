<?php
session_start();

include ("inc/functions.php");
$error = array();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin Free Bootstrap Admin Dashboard Template</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
               <?php
               $username = '';
               $role='';
               if(isset($_POST["login"])) {
                   $username = stripslashes($_POST["email"]);
                   $password = stripslashes($_POST["password"]);
                   $hashed_password = md5($password);
                   global $dbc;
                   $result = mysqli_query($dbc, "select * from staff where email = '" . $username . "'");
                   $row = mysqli_fetch_assoc($result);

                   if (mysqli_num_rows($result) == 0) {
                        $error['failed'] = 'Invalid Login Details';
                   } else {
                       if ($hashed_password == $row['password']) {
                           $_SESSION['email'] = $username;

                           $_SESSION['role'] = $row['role'] ;


                           echo '<div class="alert alert-success">Login Successful</div>';

                          echo '<script>window.location.href = "dashboard.php";</script>';
                       }else{
                           $error['password'] = 'Invalid Login Details';
                       }
                       $error['success'] = "yes there is user";
                   }

               }

               if (isset($error['failed']) &&  $error['failed'] = 'Invalid Login Details' ){

                   echo '<div class="alert alert-danger">'.$error['failed'] . '</div>';
               }

               if (isset($error['password'])){
                   echo '<div class="alert alert-danger">'.$error['password'] . '</div>';
               }
               if (isset($_GET['message']) && $_GET['message'] == 'logout'){
                   unset($_SESSION['email']);
                   unset($_SESSION['role']);
                   echo '<div class="alert alert-warning">Logout Successful</div>';
                   echo '<script>window.location.href = "login.php";</script>';
//                   echo '<meta http-equiv="refresh" content="3;URL=\'login.php\'" />';
               }
//code to fetch login details

?>
              <form action="" method="post">
                <div class="form-group">
                  <label class="label">Email</label>
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" type="email" required value="<?php echo $username?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="*********" name="password" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block" type="submit" name="login">Login</button>
              </form>
            </div>
            <p class="footer-text text-center">copyright © 2018 Cloudware. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>
