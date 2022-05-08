<?php

session_start();


if (!isset($_SESSION['name']))
{
    $_SESSION['name'] = "";
    $_SESSION['type'] = "";
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

