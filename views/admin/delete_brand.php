<?php

$connect = mysqli_connect('localhost','root','','estore');
$id = $_GET['id'];
$sql_up = "DELETE FROM brands WHERE brand_id = $id";
$quer_up = mysqli_query($connect, $sql_up);
header('location: admin.php') ;

?>