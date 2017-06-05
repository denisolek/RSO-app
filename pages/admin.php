<?php
if ($user==NULL or $user['id']==NULL or $user['isAdmin']==false) {
  redirectJS('login');
}
$reviewMessage = json_decode(getMessageToReview(), true);
echo '
<div class="col-md-8 offset-md-2 content">
  <h4>Posts waiting for approval: </h4>
  <h1>3</h1>
  <div class="card" style="margin-top: 40px;">
    <h3 class="card-header">'.$reviewMessage['name'].' '.$reviewMessage['surname'].'</h3>
    <div class="card-block">
      <h4 class="card-title">'.$reviewMessage['createdOn'].'</h4>
      <p class="card-text">'.$reviewMessage['text'].'</p>
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
';
?>
