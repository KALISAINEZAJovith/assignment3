<?php
$con = mysqli_connect("localhost", "root", "", "users");
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = intval($_GET['id']);
$sql = "DELETE FROM employee WHERE id = $id";

if (mysqli_query($con, $sql)) {
  echo "Record deleted successfully.";
} else {
  echo "Error deleting record: " . mysqli_error($con);
}

mysqli_close($con);
header("Location: frontend.php");
exit();
?>
