<?php

$connect = mysqli_connect('localhost','root','','estore');


if(isset($_POST['sbm'])) {
    $product_name = $_POST['product_name'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $brand_id = $_POST['brand_id'];

    $sql = "INSERT INTO products (product_name, image, price, quantity, description, brand_id)
    VALUES ('$product_name', '$image', '$price', '$quantity', '$description', '$brand_id')";
    $query = mysqli_query($connect, $sql);
    move_uploaded_file($image_tmp, 'assets/images/products/'.$image);
    header('location: admin.php');
}

require "./bootstrap.php";

$view = 'admin/add_product.php';
if(check_role() == "admin") {
echo $template->renderLayout($view);
} else {
    header("Location: index.php");
}

?>