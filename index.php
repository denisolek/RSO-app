<?php
include_once('./layout/header.php');
show_menu($user);
echo $user['username'];
include_once('./layout/footer.php');
?>
