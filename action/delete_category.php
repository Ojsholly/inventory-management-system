<?php
header('Location: ../view_edit_category.php?message=success');
$category_name = $_POST["category"] ;
$description = $_POST["description"];
$id = $_POST["category_id"];

echo $category_name;
echo $description;
echo $id;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM category WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo '<div class="alert alert-success fade in">';
  echo '<a href="view_edit_category.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
  echo '<strong>The product category has been successfully updated.</strong>';
  echo '</div>';
} else {
  echo '<div class="alert alert-danger fade in">';
  echo '<a href="view_edit_category.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
  echo '<strong>Error:  '.$data. "<br>" . $conn->error.'</strong>';
  echo '</div>';
}
$conn->close();

 ?>
