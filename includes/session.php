<?php
//session.php

session_start();
if($_SESSION['loginOK'] !=true) {
    $url=$_SERVER['HTTP_REFERER'];
    if(isset($url)) {
        header("location:$url");    
    } else {
    header("location: /");
}
    
}

$user_name = $_SESSION['user_name'];
$user_level = $_SESSION['user_level'];
$loginOK = $_SESSION['loginOK'];
false
?>
