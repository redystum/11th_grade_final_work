<?php

session_start();


if (!isset($_SESSION['name']))
{
    $_SESSION['name'] = "";
    $_SESSION['type'] = "";
    $_SESSION['mailError'] = "no";
    $_SESSION['phoneError'] = "no";
    $_SESSION['theme'] = "white";
    $_SESSION['email'] = "";

}

function hashGenerator($pwd){
    return md5($pwd);
}

function test_hash($pwd, $hash){
    return hashGenerator($pwd) == $hash;
}

function is_loged(){
    return $_SESSION['name'] != "";
}

function is_admin(){
    return $_SESSION['type'] == "Admin";
}

