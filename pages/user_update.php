<?php
if ($user==NULL or $user['id']==NULL)
{
  redirectJS('login');
} else {
  if (isset($_POST['btn-update'])) {
    updateProfile($user['id'], $_POST['name_update'], $_POST['surname_update'], $_POST['nip_update'], $_POST['pesel_update'], $_POST['address_update']);
    redirectJS('profile');
  }
  echo '
  <div class="container">
    <div class="row content">
      <div class="col-md-6 offset-md-3">
        <form method="post" action="update">
          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input name="name_update" class="form-control" id="inputName" placeholder="Name" value="'.show($user['name']).'">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputSurname" class="col-sm-2 col-form-label">Surname</label>
            <div class="col-sm-10">
              <input name="surname_update" class="form-control" id="inputSurname" value="'.show($user['surname']).'">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputNip" class="col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-10">
              <input name="nip_update" class="form-control" id="inputNip" value="'.show($user['nip']).'">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPesel" class="col-sm-2 col-form-label">PESEL</label>
            <div class="col-sm-10">
              <input name="pesel_update" class="form-control" id="inputPesel" value="'.show($user['pesel']).'">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <input name="address_update" class="form-control" id="inputAddress" value="'.show($user['address']).'">
            </div>
          </div>
          <div class="form-group">
              <input name="btn-update" class="btn btn-primary btn-block" type="submit" value="Update user profile">
          </div>
        </form>
      </div>
    </div>
  </div>
  ';
}
?>
