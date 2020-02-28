<?php

$category_name = $_POST["category"] ;
$description = $_POST["description"];
$id = $_POST["category_id"];

$servername = "localhost";
$password = "";
$username = "root";
$dbname = "pos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// sql to update a record
$sql = "UPDATE category SET category_name='$category_name', description = '$description' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
echo $_SESSION['msg']="Updation successfully completed";

header('Location: ../view_edit_category.php?message=success');

} else {

$_SESSION['msg']="Updation failed";
}
$conn->close();

 ?>
