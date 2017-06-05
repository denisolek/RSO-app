<?php
if ($user==NULL or $user['id']==NULL) {
  redirectJS('login');
}

if (isset($_POST['btn-post'])) {
  if ($_POST['add_post'] == '') {
    alert('At least write something ...');
  } elseif (addPost($user['id'], $_POST['add_post'])) {
    alert('Post has been added - now its waiting for admin approval.');
  }
}

$last_posts = get_posts();
echo '
<div class="row justify-content-around">
  <div class="row col-md-6  content">
    <form class="col-md-7 offset-md-5 " method="post" action="wall">
      <div class="form-group">
        <label for="postInput"><h5>Post your message!</h5></label>
        <textarea name="add_post" class="form-control" id="postInput" rows="4"></textarea>
        <small class="form-text text-muted">It will show here after admin approval.</small>
      </div>
      <button name="btn-post" type="submit" class="btn btn-primary" style="min-width: 300px;">Submit</button>
    </form>
  </div>
  <div class="col-md-6 content" >
    <div class="col-md-8">
      <h5>Your posts waiting for approval: </h5>
    </div>
    <div class="col-md-8">
      <h1 style="margin-top: 50px;">'.waitingPostsCount($user['id']).'</h1>
    </div>
  </div>
</div>
<div class="row col-md-8 offset-md-2 post-container">
';
foreach ($last_posts as $key=>$post) {
    $postNumber = $key+1;
    echo '
    <div class="col-md-6">
      <div class="card single-card">
        <h3 class="card-header">'.$postNumber.'. <img src="'.verifyThumbnailSmall($post['username']).'" alt="Card image cap"> '.$post['name'].' '.$post['surname'].'</h3>
        <div class="card-block">
          <h6 class="card-title">'.$post['createdOn'].'</h6>
          <p class="card-text">'.$post['text'].'</p>
        </div>
      </div>
    </div>
    ';
}

echo '
</div>
';
?>
