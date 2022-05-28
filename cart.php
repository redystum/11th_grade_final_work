<!doctype html>
<html lang="en">
<?php require_once './includes/connect.php'; ?>
<?php require_once './includes/login.php'; ?>
<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <?php
  if($_SESSION['theme'] == 'dark'){
    echo '<link rel="stylesheet" href="./css/cartDark.css">';
  } else {
    echo '<link rel="stylesheet" href="./css/cart.css">';
  }
?>
</head>

<body>

  <!-- Navbar -->
  <?php require_once './navbar.php'; ?>
  
  <div style="height: 100px;"></div>

  <?php

  if ($_SESSION['email']) {

    $c = $_POST['cart'] ?? null;

    if ($c) {

      if ($c == "buyall") {
        $result = $db->query("SELECT * FROM users WHERE userMail = '" . $_SESSION['email'] . "'");
        if ($result) {
          $oldcart = $result->fetch_assoc()['userCart'];
          $cart =  json_decode($oldcart, true);
          $len = count($cart['cart']);
          $i = 0;
          while ($i <= $len - 1) {
            $atual = $cart['cart'][$i];
            unset($cart['cart'][$i]);
            $s = array_push($cart['purchased'], $atual);
            $i++;
          }
          sort($cart['purchased']);
          sort($cart['cart']);
          $cart = json_encode($cart);
          $update = $db->query("UPDATE users SET userCart = '$cart' WHERE userMail = '" . $_SESSION['email'] . "'");
        }
      } else {

        $s = explode("__", $c);

        $pos = $s[0];
        $command = $s[1];

        if ($command == 'remove') {
          $result = $db->query("SELECT * FROM users WHERE userMail = '" . $_SESSION['email'] . "'");
          if ($result) {
            $oldcart = $result->fetch_assoc()['userCart'];
            $cart =  json_decode($oldcart, true);
            $error = false;
            if (array_key_exists($pos, $cart['cart'])) {
              $atual = $cart['cart'][$pos];
            } else {
              $error = true;
            }
            if (!$error) {
              unset($cart['cart'][$pos]);
              sort($cart['purchased']);
              sort($cart['cart']);
              $cart = json_encode($cart);
              $db->query("UPDATE users SET userCart = '$cart' WHERE userMail = '" . $_SESSION['email'] . "'");
            }
          }
        } else if ($command == 'pay') {
          $result = $db->query("SELECT * FROM users WHERE userMail = '" . $_SESSION['email'] . "'");
          $oldcart = $result->fetch_assoc()['userCart'];
          $cart =  json_decode($oldcart, true);
          $error = false;
          if (array_key_exists($pos, $cart['cart'])) {
            $atual = $cart['cart'][$pos];
          } else {
            $error = true;
          }
          if (!$error) {
            unset($cart['cart'][$pos]);
            array_push($cart['purchased'], $atual);
            sort($cart['purchased']);
            sort($cart['cart']);
            $cart = json_encode($cart);
            $db->query("UPDATE users SET userCart = '$cart' WHERE userMail = '" . $_SESSION['email'] . "'");
          }
        } else {
          echo 'An error has occurred';
          return;
        }
      }
    }
    
    
    require_once './cart_layout.php';
  } else {
    header("Location: ./login.php");
  }
  
  $_POST = array();
  $pos = null;
  $command = null;
  $c = null;

  // echo $_POST['cart'] ?? 'post <br>';
  // echo $pos ?? 'pos <br>';
  // echo $command ?? 'command <br>';
  // echo $c ?? 'c <br>';

  ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>