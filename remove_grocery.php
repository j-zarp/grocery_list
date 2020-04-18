<?php
$item = $_GET['item'];

$con = mysqli_connect('localhost','username','password','database');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, "groceries_db");
$sql = "DELETE FROM groceries WHERE name = '" . $item . "'";
$result = mysqli_query($con,$sql);
echo $result;

mysqli_close($con);
?>

