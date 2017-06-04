<?php
if ($user==NULL or $user['id']==NULL or $user['isAdmin']==false) {
  redirectJS('login');
}
?>

<div class="col-md-8 offset-md-2 content">
  <h4>Posts waiting for approval: </h4>
  <h1>3</h1>
  <div class="card" style="margin-top: 40px;">
    <h3 class="card-header">Denis Olek</h3>
    <div class="card-block">
      <h4 class="card-title">2017-06-01 08:37:21</h4>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <form>
        <div class="row justify-content-around" style="margin-top: 50px;">
          <div class="col-md-6">
            <input name="btn-accept" class="btn btn-success btn-block" type="submit" value="ACCEPT">

          </div>
          <div class="col-md-6">
            <input name="btn-decline" class="btn btn-danger btn-block" type="submit" value="REJECT">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
