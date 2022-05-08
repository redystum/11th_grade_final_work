<?php

function logout(){
    unset($_SESSION['name']);
    unset($_SESSION['type']);
}

function backtomain(){
    echo '<a href="index.php"><button type="submit" class="submit_button">Back to Main Page</button></a>';
}

?>