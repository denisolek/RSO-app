<?php
$last_posts = get_posts();
echo '
<div class="row col-md-8 offset-md-2 content">
  <form class="col-md-8 offset-md-2">
    <div class="form-group">
      <label for="exampleTextarea"><h5>Post your message!</h5></label>
      <textarea class="form-control" id="exampleTextarea" rows="4"></textarea>
      <small id="emailHelp" class="form-text text-muted">It will show here after admin approval.</small>
    </div>
    <button type="submit" class="btn btn-primary" style="min-width: 300px;">Submit</button>
  </form>
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
