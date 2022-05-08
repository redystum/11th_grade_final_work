<?php require_once './includes/login.php'; ?>
<?php require_once './includes/connect.php'; ?>

<?php
    if (empty($_SESSION['name'])){
        echo '<a href="login.php"><img src="./img/login.png" alt="" class="img-fluid rounded" style="float: right;" width="25px"></a>';
    } else {

        function no_image(){
        echo '<a href="login.php"><img src="./img/unknown.png" alt="" class="img-fluid rounded" style="float: right;" width="25px"></a>';
        }

        $q = "SELECT userPicture, userId FROM users WHERE userName = '" . $_SESSION["name"] . "' LIMIT 1";
        $result = $db->query($q);
        if (!$result) {
          no_image();
        } else {
          if ($result->num_rows == 0) {
            no_image();
          } else {
            $reg = $result->fetch_object();
            if ($reg->userPicture == 0) {
              no_image();
            } else {
                echo '<a href="login.php"><img src="./user_images/' . $reg->userId . '.png" alt="" class="img-fluid rounded" style="float: right;" width="25px"></a>';
            }
        }

    }
    }
    if (is_admin()) {
    echo '<b style="float: right;"> ADMIN &ensp;</b>';
    }
?>
