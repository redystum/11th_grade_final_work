<!doctype html>
<?php require_once './includes/connect.php';
require_once './includes/login.php';
require_once './includes/functions.php'; ?>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <?php
  
  if($_SESSION['theme'] == 'dark'){
    echo '<link rel="stylesheet" href="./css/styleLoginDark.css">';
  } else {
    echo '<link rel="stylesheet" href="./css/styleLogin.css">';
  }

  ?>
<link rel="shortcut icon" href="./img/Logos/FinalLogo.ico" type="image/x-icon">

</head>

<body>

  <!-- Navbar -->
  <?php require_once './navbar.php'; ?>


  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="loginformdiv" id="loginformdiv">

          <?php

          $usr = $_POST['email'] ?? null;
          $pwd = $_POST['pwd'] ?? null;

          $theme = $_POST['theme'] ?? null;

          if ($theme) {
            if ($theme == "dark") {
              $_SESSION['theme'] = "dark";
            } else {
              $_SESSION['theme'] = "light";
            }
          }

          $_SESSION['pwdError'] = "no";
          $_SESSION['userError'] = "no";

          if (is_null($usr) || is_null($pwd)) {
            if ($_SESSION['name'] != '') {
              require_once './login_content.php';
            } else {
              require "./login_form.php";
            }
          } else {
            $q = "SELECT userName, userPwd, userType, userMail FROM users WHERE userMail like '$usr' or userPhone like '$usr' LIMIT 1";
            $result = $db->query($q);
            $reg = $result->fetch_object();
            if (!$result) {
              echo "<h2>Hi " . $usr . " !</h2>";
              echo '<h4>Error connecting to database, try again...</h4>';
            } else {
              if ($result->num_rows == 0) {
                $_SESSION['userError'] = "yes";
                require_once './login_form.php';
              } else {
                if (test_hash($pwd, $reg->userPwd)) {
                  echo "<h2>Hi " . $reg->userName . " !</h2>";
                  echo "<h4>You are <span class='sucesstext'>successfully</span> logged in.</h4>";
                  $_SESSION['name'] = $reg->userName;
                  $_SESSION['type'] = $reg->userType;
                  $_SESSION['email'] = $reg->userMail;
                  $_SESSION['pwdError'] = "no";
                  $_SESSION['userError'] = "no";
                } else {
                  $_SESSION['pwdError'] = "yes";
                  require_once './login_form.php';
                }
              }
            }
          }
          $_POST = array();
          backtomain();
          ?>


        </div>
      </div>
      <div class="col-md-6">
        <div class="img_div">
          <img src="./img/others/log.png" alt="" class="img-fluid" id="loginimg">
        </div>
      </div>
    </div>
  </div>

  <script>
    const isOnTop = (id) => {
      let element = document.querySelector(id),
        divs = document.querySelectorAll('#loginformdiv');

      return [...divs].some(div =>
        div.getBoundingClientRect().right > element.getBoundingClientRect().left
      );
    }

    let element = document.getElementById('loginimg');
    if (isOnTop('#loginimg')) {
      element.style.opacity = '0.5';
    } else {
      element.style.opacity = '1';
    }

    window.addEventListener('resize', function(event) {
      if (isOnTop('#loginimg')) {
        element.style.opacity = '0.5';
      } else {
        element.style.opacity = '1';
      }
    }, true);
  </script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>