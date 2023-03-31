<?php
$connect = mysqli_connect('localhost','root','','estore');
$sql_brand = "SELECT * FROM brands";
$query_brand = mysqli_query($connect, $sql_brand);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Add brand</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="">New brand name</label>
                    <input type="text" name="brand_name" class="form-control">
                </div>
                <button name="sbm" class="btn btn-success" type="submit">Add</button>
            </form>
        </div>
    </div>
</div>