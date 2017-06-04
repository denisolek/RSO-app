<?php
if ($user==NULL or $user['id']==NULL) {
  redirectJS('login');
}
echo '
<div class="text-center" style="margin-bottom: 30px; margin-top: 30px;">
  <h1>Hello '. $user['username'] . ' !</h1>
</div>
<div class="row justify-content-around">
  <div class="col-4">
    <table class="table">
      <tbody>
        <tr>
          <td><b>Name</b></td>
          <td>'.show($user['name']).'</td>
        </tr>
        <tr>
          <td><b>Surname</b></td>
          <td>'.show($user['surname']).'</td>
        </tr>
        <tr>
          <td><b>Nip</b></td>
          <td>'.show($user['nip']).'</td>
        </tr>
        <tr>
          <td><b>Pesel</b></td>
          <td>'.show($user['pesel']).'</td>
        </tr>
        <tr>
          <td><b>Address</b></td>
          <td>'.show($user['address']).'</td>
        </tr>
      </tbody>
    </table>
    <a class="btn btn-primary btn-block" href="update" role="button">Update profile data</a>
  </div>
  <div class="col-4">
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="uploads/fullsize/test.png" alt="Card image cap">
      <div class="card-block">
        <h4 class="card-title">Avatar</h4>
        <form action="upload" method="post" enctype="multipart/form-data">
          <label class="custom-file">
            <input name="avatarInput" type="file" id="file" class="custom-file-input">
            <span class="custom-file-control"></span>
            <input type="submit" class="btn btn-warning btn-block" value="Upload" name="submitUpload" style="margin-top: 5px;">
          </label>
        </form>
      </div>
    </div>
  </div>
</div>

';
?>
