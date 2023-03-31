<div class="breadcrumbs">
<div class="container">
<div class="row align-items-center">
    <div class="col-lg-6 col-md-6 col-12">
    <div class="breadcrumbs-content">
        <h1 class="page-title">Registration</h1>
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
    <ul class="breadcrumb-nav">
        <li>
        <a href="index.php"><i class="lni lni-home"></i> Home</a>
        </li>
        <li>Registration</li>
    </ul>
    </div>
</div>
</div>
</div>

<div class="account-login section">
<div class="container">
<div class="row">
    <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
    <div class="register-form" id="register-form">
        <?php if ($isPost && isset($errors['failed'])) : ?>
            <div class="row">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?=$errors['failed']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>
        <form class="row g-3 needs-validation" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" id="form_register" novalidate>
        <div class="title">
        <h3>No Account? Register</h3>
        <p>
            Registration takes less than a minute but gives you full control over your orders.
        </p>
        </div>
        <div class="form-floating mb-3">
            <div class="form-group">
                <label for="username">Username</label>
                <input 
                    type="username" 
                    name="username" 
                    class="form-control <?= isset($errors['username']) ? ' is-invalid' :'' ?>" 
                    onkeyup="ValidateID()"
                    id="username" 
                    placeholder="Your username"
                    required
                    />
                <div id="v-user"></div>
                <div class="invalid-feedback">
                    <?php echo $errors['username'];?>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    class="form-control <?= isset($errors['email']) ? ' is-invalid' :'' ?>"
                    pattern="^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$"
                    type="email"
                    id="email"
                    onkeyup="ValidateMail()"
                    name="email"
                    placeholder="name@example.com"
                    required
                />
                <div id="v-email"></div>
                <div class="invalid-feedback">
                    <?php echo $errors['email'];?>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <div class="form-group">
                <label for="password">Password</label>
                <input
                    class="form-control <?= isset($errors['password']) ? ' is-invalid' :'' ?>"
                    type="password"
                    id="password"
                    onkeyup="ValidatePwd()"
                    name="password"
                    placeholder="Password"
                    required
                />
                <div id="v-pwd"></div>
                <div class="invalid-feedback">
                    <?php echo $errors['password'];?>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <div class="form-group">
                <label for="comfirm_password">Comfirm Password</label>
                <input
                    class="form-control <?= isset($errors['comfirm_password']) ? ' is-invalid' :'' ?>"
                    type="password"
                    onkeyup="ValidateRePwd()"
                    id="comfirm_password"
                    name="comfirm_password"
                    placeholder="Password"
                    required
                />
                <div id="v-repwd"></div>
                <div class="invalid-feedback">
                    <?php echo $errors['comfirm_password'];?>
                </div>
            </div>
        </div>
        <div class="form-floating">
            <div class="form-check">
                <label class="form-check-label" for="terms">Agree to terms and conditions</label>
                <input class="form-check-input <?= isset($errors['terms']) ? ' is-invalid' :'' ?>"
                    type="checkbox"
                    value="terms"
                    id="terms"
                    name="terms"
                    require>
                <div id="v-terms"></div>
                <div class="invalid-feedback">
                    <?php echo $errors['terms'];?>
                </div>
            </div>
        </div>
        <div class="button">
            <button class="btn" type="submit" onmouseover="ValidateCB()">Register</button>
        </div>
        <p class="outer-link">
            Already have an account? <a href="login.php">Login Now</a>
        </p>
        </form>
    </div>
    </div>
</div>
</div>
</div>