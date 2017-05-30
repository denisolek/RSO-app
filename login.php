<?php
include_once('./layout/header.php');

if ($user==NULL or $user['id']==NULL)
{
  echo '
  <div class="container">
    <div class="row content">
      <div class="col-md-6 offset-md-3">
        <form method="post" action="login.php">
          <div class="form-group row">
            <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input name="username" class="form-control" id="inputUsername" placeholder="Username">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
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
        You dont have an account?
      </div>
    </div>
    <div class="row">
      <div class="col-4 offset-md-4">
        <a class="btn btn-warning" href="register.php" role="button">Register</a>
      </div>
    </div>
  </div>
  ';
} else {
  echo "Witaj ".$user['name']."!";
}
?>

<?php
include_once('./layout/footer.php');
?>
