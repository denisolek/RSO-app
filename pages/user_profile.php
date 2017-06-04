<?php
if ($user==NULL or $user['id']==NULL) {
  redirectJS('login');
}
echo '
<div class="text-center" style="margin-bottom: 30px; margin-top: 30px;">
  <h1>Hello '. $user['username'] . ' !</h1>
</div>
<div class="row col-md-5 offset-md-1">
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
      <td><b>NIP</b></td>
      <td>'.show($user['nip']).'</td>
    </tr>
    <tr>
      <td><b>PESEL</b></td>
      <td>'.show($user['pesel']).'</td>
    </tr>
    <tr>
      <td><b>ADDRESS</b></td>
      <td>'.show($user['address']).'</td>
    </tr>
  </tbody>
</table>
<a class="btn btn-primary btn-block" href="update" role="button">Update profile data</a>
</div>
';
?>
