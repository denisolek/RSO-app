<?php
include '../config/globals.php';

 ?>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?php echo $GLOBALS['index']; ?>">RSO - APP</a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="<?php var_dump($home); echo $home; ?>">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="<?php echo $login ?>">Login</a>
      <a class="nav-item nav-link" href="<?php echo $wall ?>">WALL</a>
    </div>
  </div>
</nav>
