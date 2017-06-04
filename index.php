<?php
$uri = $_SERVER["REQUEST_URI"];
include "layout/header.php";
switch ($uri) {
    case "/":
        include "pages/home.php";
        break;
    case "/register":
        include "pages/register.php";
        break;
    case "/login":
        include "pages/login.php";
        break;
    case "/logout":
        include "pages/logout.php";
        break;
    case "/admin":
        include "pages/admin.php";
        break;
    case "/profile":
        include "pages/user_profile.php";
        break;
    case "/wall":
        include "pages/wall.php";
        break;
    case "/update":
        include "pages/user_update.php";
        break;
    case "/upload":
        include "pages/upload.php";
        break;
    default:
        include "pages/404.php";
        break;
}
include "layout/footer.php";
?>
