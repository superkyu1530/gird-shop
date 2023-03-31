<?php

$connect = mysqli_connect('localhost','root','','estore');
$id = $_GET['id'];
$sql = "DELETE FROM products WHERE product_id = $id";
$query = mysqli_query($connect, $sql);
header('location: admin.php') ;

?>