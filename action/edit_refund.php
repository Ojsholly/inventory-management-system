<?php
header('Location: ../view_edit_refund.php');
$refund_name = $_POST["refund"] ;
$amount = $_POST["amount"];
$staff = $_POST["staff_name"];
$id = $_POST["refund_id"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pos";

echo '<div class="alert alert-success"> refund sucessfully updated </div>';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to update a record
$sql = "UPDATE refund SET refund_name ='$refund_name', amount = '$amount', staff_name = '$staff' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo '<div class="alert alert-success fade in">';
  echo '<a href="view_edit_refund.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
  echo '<strong>The product refund has been successfully updated.</strong>';
  echo '</div>';
} else {
  echo '<div class="alert alert-danger fade in">';
  echo '<a href="view_edit_refund.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
  echo '<strong>Error:  '.$sql. "<br>" . $conn->error.'</strong>';
  echo '</div>';
}
$conn->close();

 ?>
