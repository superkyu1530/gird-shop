<?php

$connect = mysqli_connect('localhost','root','','estore');


if(isset($_POST['sbm'])) {

    $brand_name = $_POST['brand_name'];

    $sql_up = "INSERT INTO brands (brand_name)
    VALUES ('$brand_name')";
    $query_up = mysqli_query($connect, $sql_up);
    header('location: admin.php');
}

require "./bootstrap.php";

$view = 'admin/add_brand.php';

if(check_role() == "admin") {
    echo $template->renderLayout($view);
    } else {
        header("Location: index.php");
    }

?>