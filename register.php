<?php
include_once('./layout/header.php');
?>
<div class="container">
  <div class="row content">
    <div class="col-md-6 offset-md-3">
      <form method="post" action="register.php">
        <div class="form-group row">
          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="name" class="form-control" id="inputName" placeholder="Name">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputSurname" class="col-sm-2 col-form-label">Surname</label>
          <div class="col-sm-10">
            <input type="name" class="form-control" id="inputSurname" placeholder="Surname">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
          <div class="col-sm-10">
            <input type="name" class="form-control" id="inputAddress" placeholder="Address">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputNip" class="col-sm-2 col-form-label">Nip</label>
          <div class="col-sm-10">
            <input type="name" class="form-control" id="inputNip" placeholder="Nip">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPesel" class="col-sm-2 col-form-label">Pesel</label>
          <div class="col-sm-10">
            <input type="name" class="form-control" id="inputPesel" placeholder="Pesel">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Avatar</label>
          <label class="custom-file text-left">
            <input type="file" id="file" class="custom-file-input">
            <span class="custom-file-control"></span>
          </label>
        </div>
        <div class="form-group">
            <input class="btn btn-primary btn-block" type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
</div>
<?php
include_once('./layout/footer.php');
?>
