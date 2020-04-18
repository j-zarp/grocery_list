<?php

$con = mysqli_connect('localhost','username','password','database');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"groceries_db");
$sql = "SELECT * FROM groceries";
$result = mysqli_query($con,$sql);

echo "{\"content\":[";
$first = true;
while($row = mysqli_fetch_object($result)) {
    if(!$first) {
        echo ", ";
    }
    echo json_encode($row);
    $first = false;
}
echo "]}";
mysqli_close($con);
?>

