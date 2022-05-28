<?php
echo '<h2>Hi ' . $_SESSION['name'] . '!</h2>';
echo "<h4>You are <span class='sucesstext'>successfully</span> logged in.</h4>";
?>
<br><br>
<h4>Cart / Courses</h4>
<p>You can access your cart and purchased courses <br> by clicking on the button below.</p>

<a href="./cart.php"><button class="savefile">Cart / Courses</button></a>


<div class="image_options">
    <h5>Image options</h5>
    <div class="text-center">
        <h6>Atual image</h6>

        <?php
        function no_image_login()
        {
            echo '<img src="./img/unknown.png" alt="" class="img-fluid imagepreview">';
        }

        $q = "SELECT userPicture, userId FROM users WHERE userName = '" . $_SESSION["name"] . "' LIMIT 1";
        $result = $db->query($q);
        if (!$result) {
            no_image_login();
        } else {
            if ($result->num_rows == 0) {
                no_image_login();
            } else {
                $reg = $result->fetch_object();
                if ($reg->userPicture == 0) {
                    no_image_login();
                } else {
                    echo '<img src="./user_images/' . $reg->userId . '.png" alt="" class="img-fluid imagepreview" >';
                }
            }
        }
        ?>

        <?php
        if (isset($_POST['btn_upload'])) {

            $q = "SELECT userPicture, userId FROM users WHERE userName = '" . $_SESSION["name"] . "' LIMIT 1";
            $result = $db->query($q)->fetch_object();
            $userid = $result->userId;
            $userpicture = $result->userPicture ?? 0;

            $name = $userid . ".png";
            $target_dir = "user_images/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);

            // Select file type
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("png");

            // Check extension
            if (in_array($imageFileType, $extensions_arr)) {
                // Upload file
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name)) {
                    // Insert record
                    if ($userpicture == 0) {
                        $q = "UPDATE users SET userPicture = 1 WHERE userId = '" . $userid . "'";
                        $result = $db->query($q);
                        if (!$result) {
                            echo '<p>Error connecting to database</p>';
                        }
                        echo "<p>Successfully uploaded!</p>";
                    }
                } else {
                    echo "<p>This file is not supported!</p>";
                }
            } else {
                echo "<p>An error occurred while loading your image, try choosing a different one</p>";
            }
        }

        ?>
        <br><br>
        <h6>Change image</h6>
        <form method="post" action="" enctype='multipart/form-data'>
            <label for="imgchange" class="savefile">Upload Image</label>
            <input type='file' name='file' accept="image/png" id="imgchange" class="dontexist" onchange="success_upload();"/>
            <br>
            <input type='submit' value='Save Image' name='btn_upload' class="savefile">
        </form>
    </div>
</div>

<br><br>

<h4>Theme</h4>
<p>You can change the theme of the site to light and dark below.</p>

<form action="./login.php" method="post">
    <div class="form-check">
        <input class="form-check-input" type="radio" id="flexRadioDefault1" name="theme" value="light" <?php if($_SESSION['theme']!='dark'){echo'checked';} ?>>
        <label class="form-check-label" for="flexRadioDefault1">
            Light Mode
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" id="flexRadioDefault2" name="theme" value="dark"  <?php if($_SESSION['theme']=='dark'){echo'checked';} ?>>
        <label class="form-check-label" for="flexRadioDefault2">
            Dark mode
        </label>
    </div>
    <button type="submit" class="submit_button" style="margin-top: 10px !important;">Apply theme</button>
    <p>After clicking the button above, click : <br>
        CTRL + F5</p>
</form>
<?php

if ($_SESSION['type'] == 'Admin') {
    require_once './admin_privileges.php';
}



?>


<br><br><br>
<p>You can logout by clicking the button below.</p>
<a href="logout.php"><button type="submit" class="submit_button" style="margin-top: 0px !important;">Logout</button></a>


<script src="./js/images_change.js"></script>