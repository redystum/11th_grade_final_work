<!doctype html>
<!-- PHP packages -->
<?php require_once './includes/connect.php'; ?>
<?php require_once './includes/login.php'; ?>
<html lang="en">

<head>
  <title>
    <?php
    $c = $_GET['course'] ?? 0;
    $result = $db->query("SELECT * FROM courses WHERE courseId = '$c'");

    if ($result->num_rows == 0) {
      echo "Course not found";
    } else {
      echo $result->fetch_assoc()['courseName'] . " | Artistic Design";
    }
    ?>
  </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  <link rel="stylesheet" href="./css/styleCourse.css">

</head>

<body>

  <?php require_once './navbar.php'; ?>

  <button type="button" class="dontexist" onclick="showdialog();" id="showdialogbtn"></button>

  <?php
  $c = $_GET['course'] ?? 0;
  $result = $db->query("SELECT * FROM courses WHERE courseId = '$c'");

  if ($result) {
    if ($result->num_rows == 0) {
      require_once './404.php';
    } else {

      $course = $_POST['submitCourse'] ?? null;

      if ($course) {
        if ($_SESSION['name'] == '') {
          header('location: ./login.php');
        } else {
          $result = $db->query("SELECT * FROM users WHERE userMail = '" . $_SESSION['email'] . "'");
          if ($result) {
            $oldcart = $result->fetch_assoc()['userCart'];
            $cart =  json_decode($oldcart, true);
            array_push($cart['cart'], $course);
            $cart = json_encode($cart);
            $db->query("UPDATE users SET userCart = '$cart' WHERE userMail = '" . $_SESSION['email'] . "'");
            echo '<script>
            setTimeout(function(){
              document.getElementById("showdialogbtn").click();
            }, 1000);
      </script>';
          }
        }
      }

      $_POST = array();

      require_once './courses_layout.php';
    }
  } else {
    require_once './404.php';
  }

  ?>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <img src="./img/logo_progeto_final_logo.png" class="rounded me-2" alt="">
          <strong class="me-auto">Artistic Design</strong>
          <small></small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          Suceffully added to cart!
        </div>
      </div>
    </div>

  <script>
    function showdialog() {
      const toastTrigger = document.getElementById('liveToastBtn')
      const toastLiveExample = document.getElementById('liveToast')
      const toast = new bootstrap.Toast(toastLiveExample)
      toast.show()
    }
  </script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>