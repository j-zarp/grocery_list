<?php
$item = $_GET['item'];

$con = mysqli_connect('localhost','username','password','database');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

//prevent SQL injections
$stmt = $con->prepare('DELETE FROM groceries WHERE name = ?');
$stmt->bind_param('s',$item);
$success = $stmt->execute();
if (!$success) {
  echo "Error: " . $con->error;
}
$stmt->close();

mysqli_close($con);
?>

