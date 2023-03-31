<?php
$connect = mysqli_connect('localhost','root','','estore');
$sql = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id";
$query = mysqli_query($connect, $sql);
?>

<section class="hero-area">
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-12 custom-padding-right">
        <div class="slider-head">
            <div class="hero-slider">
            <div
                class="single-slider"
                style="
                background-image: url(assets/images/hero/iphone14.jpg);
                "
            >
                <div class="content">
                <!--<h2>
                    <span>No restocking fee ($35 savings)</span>
                    M75 Sport Watch
                </h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur elit, sed do
                    eiusmod tempor incididunt ut labore dolore magna aliqua.
                </p>
                <h3><span>Now Only</span> $320.99</h3> -->
                <div class="button">
                    <a href="#" class="btn">Shop Now</a>
                </div>
                </div>
            </div>

            <div
                class="single-slider"
                style="
                background-image: url(assets/images/hero/z-fold4.jpg);
                "
            >
                <div class="content">
              <!--  <h2>
                    <span>Big Sale Offer</span>
                    Get the Best Deal on CCTV Camera
                </h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur elit, sed do
                    eiusmod tempor incididunt ut labore dolore magna aliqua.
                </p>
                <h3><span>Combo Only:</span> $590.00</h3>-->
                <div class="button">
                    <a href="#" class="btn">Shop Now</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-lg-4 col-12">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
            <div
                class="hero-small-banner"
                style="
                background-image: url('assets/images/hero/iphone14.jpg');
                "
            >
                <div class="content">
                <h2>
                    <span>New line required</span>
                    iPhone 14 Pro Max
                </h2>
                <h3>$1599</h3>
                </div>
            </div>
            </div>
            <div class="col-lg-12 col-md-6 col-12">
            <div class="hero-small-banner style2">
                <div class="content">
                <h2>Weekly Sale!</h2>
                <p>
                    Saving up to 50% off all online store items this week.
                </p>
                <div class="button">
                    <a class="btn" href="#">Shop Now</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

<section class="iphone-product section">
    <div class="container">
    <div class="row">
        <div class="col-12">
        <div class="section-title">
            <h2>Smart Phone</h2>
        </div>
        </div>
    </div>
    <div class="row">
    <?php
    $i=1;
    while($row = mysqli_fetch_assoc($query)) {
    ?>
        <div class="col-lg-3 col-md-6 col-12">
        <div class="single-product">
            <div class="product-image">
            <img src="assets/images/products/<?php echo $row['image']; ?>" />
            <div class="button">
                <a href="product_detail.php?id=<?php echo $row['product_id']; ?>" class="btn">
                    <i class="lni lni-cart"></i> Add to Cart</a>
            </div>
            </div>
            <div class="product-info">
            <span class="brand"><?php echo $row['brand_name']; ?></span>
            <h4 class="title">
                <a href="product_detail.php?id=<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></a>
            </h4>
            <ul class="review">
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><span>5.0 Review(s)</span></li>
            </ul>
            <div class="price">
                <span>$<?php echo $row['price']; ?></span>
            </div>
            </div>
        </div>
        </div>
        <?php } ?>
    </div>
    </div>
</section>


