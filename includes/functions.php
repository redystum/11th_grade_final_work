<?php

function logout(){
    unset($_SESSION['name']);
    unset($_SESSION['type']);
}

?>