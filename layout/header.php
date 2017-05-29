<?php
require_once('functions.php');
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
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="container">
          <a class="navbar-brand" href="index.php">RSO - APP</a>
          <ul class="nav navbar-nav mr-auto">
              <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="wall.php">Wall</a>
              </li>
          </ul>
          <?php
            if ($user['id']!=NULL) {
              echo '
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">LOGOUT</a>
                    </li>
                </ul>
              ';
            }
          ?>
      </div>
    </nav>
