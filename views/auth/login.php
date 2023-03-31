<div class="breadcrumbs">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-12">
          <div class="breadcrumbs-content">
            <h1 class="page-title">Login</h1>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <ul class="breadcrumb-nav">
            <li>
              <a href="index.php"><i class="lni lni-home"></i> Home</a>
            </li>
            <li>Login</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="account-login section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
          <form class="card login-form" method="post" action ="<?= $_SERVER['PHP_SELF'] ?>">
            <div class="card-body">
              <div class="title">
                <h3>Login Now</h3>
              </div>
              <?php if ($isPost == true && !empty($errors)) : ?>
                <div class="alert alert-danger">
                  <ul>
                    <?php foreach ($errors as $err) {
                      echo "<li> $err </li>";
                    } ?>
                  </ul>
                </div>
              <?php endif; ?>
              <div class="form-group input-group">
                <label for="username">Username</label>
                <input
                  class="form-control"
                  type="text"
                  id="username"
                  name="username"
                  required
                  <?php if (isset($_SESSION['time']) && ((time() - $_SESSION['time']) < $timeLimit)) echo "disabled"?>
              >
              </div>
              <div class="form-group input-group">
                <label for="password">Password</label>
                <input
                  class="form-control"
                  type="password"
                  id="password"
                  name="password"
                  required
                  <?php if (isset($_SESSION['time']) && ((time() - $_SESSION['time']) < $timeLimit)) echo "disabled"?>
                >
              </div>
              <div
                class="
                  d-flex
                  flex-wrap
                  justify-content-between
                  bottom-content
                "
              >
                <div class="form-check">
                  <input
                    type="checkbox"
                    name="remember_me"
                    value="remember_password"
                    class="form-check-input width-auto"
                    id="remember_me"
                  >
                  <label class="form-check-label" for="remember_me">Remember me</label>
                </div>
                <a class="lost-pass" href="account-password-recovery"
                  >Forgot password?</a
                >
              </div>
              <div class="button">
                <button class="btn" type="submit">Login</button>
              </div>
              <p class="outer-link">
                Don't have an account?
                <a href="register.php">Register here </a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>