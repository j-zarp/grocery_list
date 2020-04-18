<?php
$item = $_GET['item'];

$con = mysqli_connect('localhost','username','password','database');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"groceries_db");

$sql = "SELECT priority FROM groceries WHERE name = '" . $item . "'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);

$p_old = intval($row["priority"]);
$p_new = 0;
if ($p_old == 0) {
	$p_new = -1;
}

$sql = "UPDATE groceries SET priority = " . $p_new . " WHERE name = '" . $item . "'";
$result = mysqli_query($con,$sql);
echo $result;

mysqli_close($con);
?>

