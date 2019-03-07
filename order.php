<?php
session_start();
include("dbconnect.php");

$sid = session_id();
$ship = 5;
$date = date("Y-m-d h:i:s");
$sql = "INSERT INTO order_ VALUES(NULL,'$sid','$date',TRUE,'$ship')" ;
echo "<h1>You order was paid successfully!</h1>";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn)."<br />\n$sql");

  session_unset();
  include('index.php');

//$last_row = mysqli_insert_id($conn);
//$query = "INSERT INTO orderdetail VALUES(NULL,'$last_row',)" ;
?>
