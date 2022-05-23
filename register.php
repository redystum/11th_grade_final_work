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

  <link rel="stylesheet" href="./css/styleLogin.css">

</head>

<body>

  <!-- Navbar -->
  <?php require_once './navbar-fixed.php'; ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="loginformdiv" id="loginformdiv">

          <?php

          $mail = $_POST['email'] ?? null;
          $pwd = $_POST['pwd'] ?? null;
          $name = $_POST['name'] ?? null;
          $phone = $_POST['phone'] ?? null;
          $sex = $_POST['sex'] ?? null;

          if (is_null($name)) {
            if ($_SESSION['name'] != '') {
              echo '<h2>Hi ' . $_SESSION['name'] . '!</h2>';
              echo "<h4>You are <span class='sucesstext'>successfully</span> logged in.</h4>";
              echo '<br><br><br>';
              echo "You can go to the home page by clicking on the button below";
              echo '<a href="index.php"><button type="submit" class="submit_button">Home</button></a>';
            } else {
              require "./register_form.php";
            }
          } else {

            $verifyEmail = $db->query("SELECT * FROM users WHERE userMail = '$mail'");
            $verifyPhone = $db->query("SELECT * FROM users WHERE userPhone = '$phone'");

            if ($verifyEmail) {
              if ($verifyEmail->num_rows > 0) {
                $_SESSION['mailError'] = "yes";
              } else {
                $_SESSION['mailError'] = "no";
              }
            } else {
              $_SESSION['mailError'] = "no";
            }
            if ($verifyPhone) {
              if ($verifyPhone->num_rows > 0) {
                $_SESSION['phoneError'] = "yes";
              } else {
                $_SESSION['phoneError'] = "no";
              }
            } else {
              $_SESSION['phoneError'] = "no";
            }

            if ($_SESSION['mailError'] == "yes" || $_SESSION['phoneError'] == "yes") {
              require_once './register_form.php';
            } else {

              $pwdMd5 = md5($pwd);
              $q = "INSERT INTO users (userName, userPwd, userMail, userSex, userPhone, userCart) VALUES ('$name', '$pwdMd5', '$mail', '$sex', '$phone', '{\"cart\":[],\"purchased\":[]}')";

              $result = $db->query($q);

              echo '<h2>Registered <span class="sucesstext">successfully</span></h2>';
              echo '<p>Go to the login page to login!</p>';
              echo '<a href="login.php"><button type="submit" class="submit_button">Go to the login page</button></a>';

              $_POST = array();
            }
          }



          backtomain();

          ?>
        </div>
      </div>
      <div class="col-md-6 img_div">
        <img src="./img/log.png" alt="" class="img-fluid" id="loginimg">
      </div>
    </div>
  </div>


  <style>
    .loginformdiv {
      position: absolute;
      top: 15% !important;
      padding: 20px;
      left: 5% !important;
    }
  </style>
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

  <script>
    function onlyNumberKey(evt) {

      // Only ASCII character in that range allowed
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
      return true;
    }
  </script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>