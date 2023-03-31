<?php
$connect = mysqli_connect('localhost','root','','estore');
$sql = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id";
$query = mysqli_query($connect, $sql);
$sql_up = "SELECT * FROM brands";
$query_up = mysqli_query($connect, $sql_up);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Product list</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Product name</th>
                        <th>Product image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Brand</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        while($row = mysqli_fetch_assoc($query)) {?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td>
                            <img style="width: 100px;" src="assets/images/products/<?php echo $row['image']; ?>">
                        </td>
                        <td><?php echo $row['price']; ?>$</td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['brand_name']; ?></td>
                        <td><a href="edit_product.php?id=<?php echo $row['product_id']; ?>">Edit</a></td>
                        <td><a onclick="return Del()" href="delete_product.php?id=<?php echo $row['product_id']; ?>" >Delete</a></td>
                    </tr>
                    <?php  
                    } 
                    ?>
                </tbody>
            </table>
            <a class="btn btn-primary" href="add_product.php">Add product</a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Brand list</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Brand name</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $j = 1;
                        while($row_up = mysqli_fetch_assoc($query_up)) {?>
                    <tr>
                    <tr>
                        <td><?php echo $j++; ?></td>
                        <td><?php echo $row_up['brand_name']; ?></td>
                        <td><a onclick="return Del()" href="delete_brand.php?id=<?php echo $row_up['brand_id']; ?>" >Delete</a></td>
                    </tr>
                    <?php  
                    } 
                    ?>
                </tbody>
            </table>
            <a class="btn btn-primary" href="add_brand.php">Add brand</a>
        </div>
    </div>
</div>
<script>
    function Del(){
        return confirm("Are you want to delete product? Are you sure?" );
    }
</script>