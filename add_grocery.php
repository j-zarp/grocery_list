<?php
$item = $_GET['item'];
$p = intval($_GET['p']);

$con = mysqli_connect('localhost','username','password','database');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"groceries_db");

//prevent SQL injections
$stmt = $con->prepare('INSERT INTO groceries (name, priority) VALUES (?, 0)');
$stmt->bind_param('s',$item);
$success = $stmt->execute();
if (!$success) {
  echo "Error: " . $con->error;
}
$stmt->close();

mysqli_close($con);
?>

