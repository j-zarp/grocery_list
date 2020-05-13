<?php
$item = $_GET['item'];
$p = intval($_GET['p']);

$con = mysqli_connect('localhost','username','password','database');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

//prevent SQL injections
$stmt = $con->prepare('INSERT INTO groceries (name, priority) VALUES (?, ?)');
$stmt->bind_param('si',$item, $p);
$success = $stmt->execute();
if (!$success) {
  echo "Error: " . $con->error;
}
$stmt->close();

mysqli_close($con);
?>

