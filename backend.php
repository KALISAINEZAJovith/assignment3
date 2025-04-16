<?php
$con=mysqli_connect(hostname: "localhost",username: "root",password: "", database:"users");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo "Connected successfully";
// escape variables for security
$names = mysqli_real_escape_string(mysql: $con, string: $_POST['names']);
$address = mysqli_real_escape_string(mysql: $con, string: $_POST['address']);
$benefit = mysqli_real_escape_string(mysql: $con, string: $_POST['benefit']);
$salary = mysqli_real_escape_string(mysql: $con, string: $_POST['salary']);
$period = mysqli_real_escape_string(mysql: $con, string: $_POST['period']);

if ($benefit > 100 || $benefit < 0) {
    echo "Invalid benefit percentage. It should be between 0 and 100.";
    // redirect to assigment.php

}

if ($salary <= 0) {
    echo "Invalid salary. It should be greater than 0.";
    // redirect to assigment.php
}

if ($names == "o" || $address == "0") {
    echo "Invalid names. It should not be empty.";
    // redirect to assigment.php
}

if ($period <= 0) {
    echo "Invalid employment period. It should be greater than 0.";
    // redirect to assigment.php
}

$sql="INSERT INTO employee (names, address, salary, period, benefit)   VALUES ('$names', '$address', '$salary', '$period', '$benefit')";
if (!mysqli_query(mysql: $con,query: $sql)) {
       die('Error: ' . mysqli_error(mysql: $con));
}
       echo "1 record added";mysqli_close(mysql: $con);
// redirect to assigment.php
header("Location: frontend.php");
?>