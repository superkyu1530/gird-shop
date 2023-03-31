<header class="header navbar-area">
    <div class="topbar">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="top-middle">
            <ul class="useful-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="top-end">
                <?php if (isset($_SESSION['user'])) : ?>
                    <div class='user'>
                    <?php if(check_role() == "admin") : ?>
                        <a href="/admin.php">
                        <i class="lni lni-user"></i>
                        Hello <?= $_SESSION['user']['username']; ?></a>
                    <?php else : ?> 
                        <a href="#">
                      <i class="lni lni-user"></i>
                        Hello <?= $_SESSION['user']['username']; ?></a> 
                    <?php endif; ?> 
                    </div>
                    <ul class="user-login">
                        <li>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="lni lni-power-switch"></i> Sign Out
                            </a>
                        </li>
                    </ul>
                <?php else : ?>
                    <div class='user'>
                        <i class="lni lni-user"></i>
                        Hello Guest
                    </div>
                    <ul class="user-login">
                        <li>
                            <a href="login.php">Sign In</a>
                        </li>
                        <li>
                            <a href="register.php">Register</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        </div>
    </div>
    </div>

    <div class="header-middle">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-lg-3 col-md-3 col-7">
            <a class="navbar-brand" href="index.php">
            <img src="assets/images/logo/logo.svg" alt="Logo" />
            </a>
        </div>
        <div class="col-lg-5 col-md-7 d-xs-none">
            <div class="main-menu-search">
            <div class="navbar-search search-style-5">
                <div class="search-select">
                </div>
                <div class="search-input">
                <input type="text" placeholder="Search" />
                </div>
                <div class="search-btn">
                <button><i class="lni lni-search-alt"></i></button>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-2 col-5">
            <div class="middle-right-area">
            <div class="nav-hotline">
                <i class="lni lni-phone"></i>
                <h3>
                Hotline:
                <span>(+100) 123 456 7890</span>
                </h3>
            </div>
            <div class="navbar-cart">
                <div class="wishlist">
                <a href="javascript:void(0)">
                    <i class="lni lni-heart"></i>
                    <span class="total-items">0</span>
                </a>
                </div>
                <div class="cart-items">
                <a href="javascript:void(0)" class="main-btn">
                    <i class="lni lni-cart"></i>
                    <span class="total-items">2</span>
                </a>

                <div class="shopping-item">
                    <div class="dropdown-cart-header">
                    <span>2 Items</span>
                    <a href="#">View Cart</a>
                    </div>
                    <ul class="shopping-list">
                    <li>
                        <a
                        href="javascript:void(0)"
                        class="remove"
                        title="Remove this item"
                        ><i class="lni lni-close"></i
                        ></a>
                        <div class="cart-img-head">
                        <a class="cart-img" href="product-details.php"
                            ><img
                            src="assets/images/header/cart-items/item1.jpg"
                            alt="#"
                        /></a>
                        </div>
                        <div class="content">
                        <h4>
                            <a href="product-details.php">
                            Apple Watch Series 6</a
                            >
                        </h4>
                        <p class="quantity">
                            1x - <span class="amount">$99.00</span>
                        </p>
                        </div>
                    </li>
                    <li>
                        <a
                        href="javascript:void(0)"
                        class="remove"
                        title="Remove this item"
                        ><i class="lni lni-close"></i
                        ></a>
                        <div class="cart-img-head">
                        <a class="cart-img" href="product-details.php"
                            ><img
                            src="assets/images/header/cart-items/item2.jpg"
                            alt="#"
                        /></a>
                        </div>
                        <div class="content">
                        <h4>
                            <a href="product-details.php"
                            >Wi-Fi Smart Camera</a
                            >
                        </h4>
                        <p class="quantity">
                            1x - <span class="amount">$35.00</span>
                        </p>
                        </div>
                    </li>
                    </ul>
                    <div class="bottom">
                    <div class="total">
                        <span>Total</span>
                        <span class="total-amount">$134.00</span>
                    </div>
                    <div class="button">
                        <a href="order.php" class="btn animate"
                        >Order</a
                        >
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

    <div class="container">
    <div class="row align-items-center">
        <div class="col-lg-8 col-md-6 col-12">
        <div class="nav-inner">


            <nav class="navbar navbar-expand-lg">
            <button
                class="navbar-toggler mobile-menu-btn"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="toggler-icon"></span>
                <span class="toggler-icon"></span>
                <span class="toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse sub-menu-bar"
                id="navbarSupportedContent"
            >
                <ul id="nav" class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a
                    href="index.php"
                    class="active"
                    aria-label="Toggle navigation"
                    >Home</a
                    >
                </li>
                <li class="nav-item">
                    <a
                    class="dd-menu collapsed"
                    href="javascript:void(0)"
                    data-bs-toggle="collapse"
                    data-bs-target="#submenu-1-2"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    >Pages</a
                    >
                    <ul class="sub-menu collapse" id="submenu-1-2">
                    <li class="nav-item"><a href="login.php">Login</a></li>
                    <li class="nav-item">
                        <a href="register.php">Register</a>
                    </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a
                    class="dd-menu collapsed"
                    href="javascript:void(0)"
                    data-bs-toggle="collapse"
                    data-bs-target="#submenu-1-3"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    >Shop</a
                    >
                    <ul class="sub-menu collapse" id="submenu-1-3">
                    <li class="nav-item">
                        <a href="product-grids.php"></a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php">Smart Phone</a>
                    </li>
                    <li class="nav-item">
                        <a href="cart.php">Cart</a>
                    </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" aria-label="Toggle navigation"
                    >Contact Us</a
                    >
                </li>
                </ul>
            </div>
            </nav>
        </div>
        </div>
    </div>
    </div>
</header>