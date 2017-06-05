<?php
if ($user==NULL or $user['id']==NULL or $user['isAdmin']==false) {
  redirectJS('login');
}
$reviewPost = json_decode(getMessageToReview(), true);
if (isset($_POST['btn-accept'])) {
  acceptPost($reviewPost);
} elseif (isset($_POST['btn-decline'])) {
  declinePost($reviewPost);
}
$reviewPost = json_decode(getMessageToReview(), true);
echo '
<div class="col-md-8 offset-md-2 content">
  <h4>Posts waiting for approval: </h4>
  <h1>'.adminWaitingPostsCount().'</h1>
';
if ($reviewPost !== NULL) {
  echo '
  <div class="card" style="margin-top: 40px;">
    <h3 class="card-header">'.$reviewPost['name'].' '.$reviewPost['surname'].'</h3>
    <div class="card-block">
      <h4 class="card-title">'.$reviewPost['createdOn'].'</h4>
      <p class="card-text">'.$reviewPost['text'].'</p>
      <form method="post" action="admin">
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
  ';
}
echo '
</div>
';
?>
