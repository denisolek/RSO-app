<?php
if ($user==NULL or $user['id']==NULL or $user['isAdmin']==false) {
  redirectJS('login');
}
?>
