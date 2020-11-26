<?php
//session_userlvl.php
$user_level = $_SESSION['user_level'];

session_start();
if($_SESSION['user_level'] <= 2) {
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
