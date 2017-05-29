<?php
include_once('./layout/header.php');

if (isset($_POST['btn-signup'])) {

  if ($_POST['username'] == '' || $_POST['password'] == '' || $_POST['confirm_password'] == '') {
    alert('Fields cant be empty !');
  } else {
    if ($_POST['password'] == $_POST['confirm_password']) {
      if (isUsernameAvailable($_POST['username'])) {
        register($_POST['username'], $_POST['password']);
        alert('Registered ! You can now login :)');
      } else {
        alert('Username already exists!');
      }
    } else {
      alert('Password and confirm password are different!');
    }
  }
}

?>
<div class="container">
  <div class="row content">
    <div class="col-md-6 offset-md-3">
      <form method="post" action="register.php">
        <div class="form-group row">
          <label for="inputUsername" class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-9">
            <input name="username" class="form-control" id="inputUsername" placeholder="Username">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputConfirmPassword" class="col-sm-3 col-form-label">Re-password</label>
          <div class="col-sm-9">
            <input type="password" name="confirm_password" class="form-control" id="inputConfirmPassword" placeholder="Confirm password">
          </div>
        </div>
        <div class="form-group">
            <input name="btn-signup" class="btn btn-primary btn-block" type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
</div>
<?php
include_once('./layout/footer.php');
?>
