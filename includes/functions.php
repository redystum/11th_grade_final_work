<?php

function logout(){
    unset($_SESSION['name']);
    unset($_SESSION['type']);
    unset($_SESSION['email']);
    $_SESSION['mailError'] = "no";
    $_SESSION['phoneError'] = "no";
    $_SESSION['theme'] = "white";
}

function backtomain(){
    echo '<a href="index.php"><button type="submit" class="submit_button">Back to Main Page</button></a>';
}

?>