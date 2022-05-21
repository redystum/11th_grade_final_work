<?php

function logout(){
    unset($_SESSION['name']);
    unset($_SESSION['type']);
    $_SESSION['mailError'] = "no";
    $_SESSION['phoneError'] = "no";
    $_SESSION['theme'] = "white";
}

function backtomain(){
    echo '<a href="index.php"><button type="submit" class="submit_button">Back to Main Page</button></a>';
}

?>