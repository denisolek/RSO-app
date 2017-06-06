<?php
if (isset($_POST['btn-signup'])) {

  if ($_POST['username_reg'] == '' || $_POST['password_reg'] == '' || $_POST['confirm_password_reg'] == '' || $_POST['name_reg'] == '' || $_POST['surname_reg'] == '') {
    alert('Fields cant be empty !');
  } else {
    if ($_POST['password_reg'] == $_POST['confirm_password_reg']) {
      if (isUsernameAvailable($_POST['username_reg'])) {
        register($_POST['username_reg'], $_POST['password_reg'],  $_POST['name_reg'], $_POST['surname_reg']);
        alert('Registered ! You can login now :)');
        redirectJS('login');
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
      <form method="post" action="register">
        <div class="form-group row">
          <label for="inputUsername" class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-9">
            <input name="username_reg" class="form-control" id="inputUsername" placeholder="Username">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input type="password" name="password_reg" class="form-control" id="inputPassword" placeholder="Password">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputConfirmPassword" class="col-sm-3 col-form-label">Re-password</label>
          <div class="col-sm-9">
            <input type="password" name="confirm_password_reg" class="form-control" id="inputConfirmPassword" placeholder="Confirm password">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputName" class="col-sm-3 col-form-label">Name</label>
          <div class="col-sm-9">
            <input name="name_reg" class="form-control" id="inputName" placeholder="Name">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputSurname" class="col-sm-3 col-form-label">Surname</label>
          <div class="col-sm-9">
            <input name="surname_reg" class="form-control" id="inputSurname" placeholder="Surname">
          </div>
        </div>
        <div class="form-group">
            <input name="btn-signup" class="btn btn-primary btn-block" type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
</div>
