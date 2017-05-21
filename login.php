<?php
include_once('./layout/header.php');
?>

<div class="container">
  <div class="row content">
    <div class="col-md-6 offset-md-3">
      <form method="post" action="login.php">
        <div class="form-group row">
          <label for="inputLogin" class="col-sm-2 col-form-label">Login</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputLogin" placeholder="Login">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
            <input class="btn btn-primary btn-block" type="submit" value="Sign in">
        </div>
      </form>
    </div>
  </div>
  <div class="row login-register">
    <div class="col-4 offset-md-4">
      You don't have an account?
    </div>
  </div>
  <div class="row">
    <div class="col-4 offset-md-4">
      <a class="btn btn-warning" href="register.php" role="button">Register</a>
    </div>
  </div>
</div>

<?php
include_once('./layout/footer.php');
?>
