<?php
$item = $_GET['item'];

$con = mysqli_connect('localhost','username','password','database');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

//prevent SQL injections
if ($stmt = mysqli_prepare($con, "UPDATE groceries SET priority = priority * (-1) WHERE name = ?")) {
  mysqli_stmt_bind_param($stmt, "s", $item);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

mysqli_close($con);
?>

