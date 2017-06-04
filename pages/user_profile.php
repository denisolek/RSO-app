<?php
if ($user==NULL or $user['id']==NULL) {
  redirectJS('login');
} else {
  echo 'Witaj ' . $user['username'];
}
?>
