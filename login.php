<!doctype html>
<?php require_once './includes/connect.php';
 require_once './includes/login.php'; ?>
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
  <?php require_once './navbar.php'; ?>


  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="loginformdiv" id="loginformdiv">

          <?php

          $usr = $_POST['name'] ?? null;
          $pwd = $_POST['pwd'] ?? null;

          if (is_null($usr) || is_null($pwd)) {
            if ($_SESSION['name'] != '') {
              echo '<h2>Hi ' . $_SESSION['name'] . '!</h2>';
              echo "<h4>You are successfully logged in.</h4>";
              echo '<br><br><br>';
              echo "You can logout by clicking the button below.";
              echo '<a href="logout.php"><button type="submit" class="submit_button">Logout</button></a>';
            } else {
            require "./login_form.php";
          }
          } else {
            echo "<h2>Hi " . $usr . " !</h2>";
            $q = "SELECT userName, userPwd, userType FROM users WHERE userName = '$usr' LIMIT 1";
            $result = $db->query($q);
            if (!$result) {
              echo '<h4>Error connecting to database</h4>';
            } else {
              if ($result->num_rows == 0) {
                echo '<h4>User not found</h4>';
              } else {
                $reg = $result->fetch_object();
                if (test_hash($pwd, $reg->userPwd)) {
                  echo "<h4>You are successfully logged in.</h4>";
                  $_SESSION['name'] = $reg->userName;
                  $_SESSION['type'] = $reg->userType;;
                } else {
                  echo "<h4>Login failed</h4>";
                }
              }
            }
          }

          ?>

        </div>
      </div>
      <div class="col-md-6 img_div">
        <img src="./img/log.png" alt="" class="img-fluid" id="loginimg">
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