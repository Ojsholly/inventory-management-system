<?php
header('Location: ../view_edit_product.php');

$id = $_POST["product_id"];
$product = $_POST["product"];
$category_name = $_POST["category_name"] ;
$price = $_POST["price"];
$stock_count = $_POST["stock_count"];
$info = $_POST["info"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pos";

echo '<div class="alert alert-success"> Category sucessfully updated </div>';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to update a record
$sql = "UPDATE products SET name='$product', price = '$price', info='$info', stock_count='$stock_count'   WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo '<div class="alert alert-success fade in">';
  echo '<a href="view_edit_category.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
  echo '<strong>The product category has been successfully updated.</strong>';
  echo '</div>';
} else {
  echo '<div class="alert alert-danger fade in">';
  echo '<a href="view_edit_category.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
  echo '<strong>Error:  '.$sql. "<br>" . $conn->error.'</strong>';
  echo '</div>';
}
$conn->close();

 ?>
