<?php
$connect = mysqli_connect('localhost','root','','estore');
$sql_brand = "SELECT * FROM brands";
$query_brand = mysqli_query($connect, $sql_brand);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Add product</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="">Product name</label>
                    <input type="text" name="product_name" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="">Product image</label>
                    <input type="file" name="image">
                </div>

                <div class="form-group mb-3">
                    <label for="">Price</label>
                    <input type="number" name="price" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="">Quantity</label>
                    <input type="number" name="quantity" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control">
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

                <button name="sbm" class="btn btn-success" type="submit">Add</button>

            </form>
        </div>
    </div>
</div>