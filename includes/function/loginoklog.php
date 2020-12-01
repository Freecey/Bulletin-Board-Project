<?php 
// loginfail.php
//
// CREATE TABLE `loginok` (
//     `loginok_id` int NOT NULL AUTO_INCREMENT,
//     `loginok_user_id` int NOT NULL,
//     `loginok_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
//     `loginok_browser` varchar(255) NOT NULL,
//     `loginok_urlfrom` varchar(255) DEFAULT NULL,
//     `loginok_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP

//include 'includes/function/getip.php';


$loginok_ip      = $userlast_ip;
$loginok_browser = $_SERVER['HTTP_USER_AGENT'];
$loginok_urlfrom = $_SERVER['HTTP_REFERER'];
$loginok_user_id   = $_SESSION['user_id'];


$loginfailinsert = $conn->prepare("INSERT INTO loginok(loginok_ip,
                                                            loginok_browser,
                                                            loginok_urlfrom,
                                                            loginok_user_id)
values(:loginok_ip,
       :loginok_browser,
       :loginok_urlfrom,
       :loginok_user_id)
");
$loginfailinsert->bindParam (':loginok_ip',$loginok_ip);
$loginfailinsert->bindParam (':loginok_browser',$loginok_browser);
$loginfailinsert->bindParam (':loginok_urlfrom',$loginok_urlfrom);
$loginfailinsert->bindParam (':loginok_user_id',$loginok_user_id);
$loginfailinsert->execute();


?>  