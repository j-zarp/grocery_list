<?php
$item = $_GET['item'];
$how = $_GET['how'];

$con = mysqli_connect('localhost','username','password','database');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

if($how=='checked') {
  $stmt = $con->prepare('DELETE FROM groceries WHERE priority = -1');
} else {
  //prevent SQL injections
  $stmt = $con->prepare('DELETE FROM groceries WHERE name = ?');
  $stmt->bind_param('s',$item);
}
$success = $stmt->execute();
if (!$success) {
  echo "Error: " . $con->error;
}
$stmt->close();

mysqli_close($con);
?>

