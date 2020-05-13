<?php
$item = $_GET['item'];

$con = mysqli_connect('localhost','username','password','database');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

//prevent SQL injections
if ($stmt = mysqli_prepare($con,"SELECT priority FROM groceries WHERE name = ?")) {
  mysqli_stmt_bind_param($stmt, "s", $item);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $p_old);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);

  $p_new = 0;
  if ($p_old == 0) {
  	$p_new = -1;
  }
  
  if ($stmt = mysqli_prepare($con,"UPDATE groceries SET priority = ? WHERE name = ?")) {
    mysqli_stmt_bind_param($stmt, "is", $p_new, $item);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }
}

mysqli_close($con);
?>

