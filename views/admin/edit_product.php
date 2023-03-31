<?php
$connect = mysqli_connect('localhost','root','','estore');

$id = $_GET['id'];

$sql_brand = "SELECT * FROM brands";
$query_brand = mysqli_query($connect, $sql_brand);

$sql_up = "SELECT * FROM products where product_id = $id";
$query_up = mysqli_query($connect, $sql_up);
$row_up =  mysqli_fetch_assoc($query_up);

if(isset($_POST['sbm'])) {
    $product_name = $_POST['product_name'];

    if($_FILES['image']['name']==''){
        $image = $row_up['image'];
    }else{
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_image'];
        move_uploaded_file($image_tmp, 'assect/image/products/'.$image);
    }

    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $brand_id = $_POST['brand_id'];

    $sql = "UPDATE products SET product_name = '$product_name', image = '$image', price = $price, 
    quantity = $quantity, description = '$description' , brand_id = $brand_id WHERE product_id = $id";
    $query = mysqli_query($connect, $sql);
    header('location: admin.php');

}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Edit product</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="">Product name</label>
                    <input type="text" name="product_name" class="form-control" value="<?php echo $row_up['product_name']; ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="">Product image</label>
                    <input type="file" name="image">
                </div>

                <div class="form-group mb-3">
                    <label for="">Price</label>
                    <input type="number" name="price" class="form-control" value="<?php echo $row_up['price']; ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="">Quantity</label>
                    <input type="number" name="quantity" class="form-control" value="<?php echo $row_up['quantity']; ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" value="<?php echo $row_up['description']; ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="">Brand</label>
                    <select class="form-control" name="brand_id">
                        <?php
                        while($row_brand = mysqli_fetch_assoc($query_brand)) { ?>
                        <option value="<?php echo $row_brand['brand_id']; ?>">
                            <?php echo $row_brand['brand_name']; ?>
                        </option>
                        <?php }?>
                    </select>
                </div>

                <button name="sbm" class="btn btn-success" type="submit">Edit</button>

            </form>
        </div>
    </div>
</div>