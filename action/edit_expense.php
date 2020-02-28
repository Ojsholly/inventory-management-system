<?php
header('Location: ../view_edit_expense.php');
$expense = $_POST["expense"] ;
$amount = $_POST["amount"];
$staff = $_POST["staff_name"];
$id = $_POST["expense_id"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pos";

echo '<div class="alert alert-success"> expense sucessfully updated </div>';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to update a record
$sql = "UPDATE expenses SET name ='$expense', amount = '$amount', staff_name = '$staff' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo '<div class="alert alert-success fade in">';
  echo '<a href="view_edit_expense.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
  echo '<strong>The product expense has been successfully updated.</strong>';
  echo '</div>';
} else {
  echo '<div class="alert alert-danger fade in">';
  echo '<a href="view_edit_expense.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
  echo '<strong>Error:  '.$sql. "<br>" . $conn->error.'</strong>';
  echo '</div>';
}
$conn->close();

 ?>
