<?php
$con = mysqli_connect("localhost", "root", "", "users");
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = intval($_POST['id']);
$names = mysqli_real_escape_string($con, $_POST['names']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$salary = mysqli_real_escape_string($con, $_POST['salary']);
$period = mysqli_real_escape_string($con, $_POST['period']);
$benefit = mysqli_real_escape_string($con, $_POST['benefit']);

$sql = "UPDATE employee SET names='$names', address='$address', salary='$salary', period='$period', benefit='$benefit' WHERE id=$id";

if (mysqli_query($con, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($con);
}

mysqli_close($con);
header("Location: frontend.php");
exit();
?>
