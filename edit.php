<?php
$con = mysqli_connect("localhost", "root", "", "users");
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = intval($_GET['id']);
$result = mysqli_query($con, "SELECT * FROM employees WHERE id = $id");
$row = mysqli_fetch_assoc($result);

echo json_encode($row);

mysqli_close($con);
?>
