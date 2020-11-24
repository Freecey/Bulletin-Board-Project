<?php
//session_userlvl.php
$user_level = $_SESSION['user_level'];

session_start();
if($_SESSION['user_level'] <= 2) {
    header("Location: ../");
    
}

$user_name = $_SESSION['user_name'];
$user_level = $_SESSION['user_level'];
$loginOK = $_SESSION['loginOK'];
false
?>
