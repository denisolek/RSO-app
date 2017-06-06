<?php
require_once('./core/functions.php');
$user=session_check();
add_admin();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="container">
          <a class="navbar-brand" href="/">RSO - APP</a>
          <ul class="nav navbar-nav mr-auto">
            <?php
              if ($user['id']!=NULL) {
                echo '
                <li class="nav-item">
                    <a class="nav-link" href="profile">My profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="wall">Wall</a>
                </li>
                ';
                if ($user['isAdmin']==true) {
                  echo '
                  <li class="nav-item">
                      <a class="nav-link" href="admin">Admin Panel</a>
                  </li>
                  ';
                }
              } else {
                echo '
                <li class="nav-item">
                    <a class="nav-link" href="login">Login</a>
                </li>
                ';
              }
            ?>
          </ul>
          <ul class="nav navbar-nav">
            <li class="nav-item">
                <span class="nav-text" style="color: #1a83de;"><b>RS 1</b></span>
            </li>
          <?php
            if ($user['id']!=NULL) {
              echo '
                  <li class="nav-item">
                      <a class="nav-link" href="logout">LOGOUT</a>
                  </li>
              ';
            }
          ?>
          </ul>
      </div>
    </nav>
