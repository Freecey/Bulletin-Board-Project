<?php 
// loginfail.php
//
// TABLE logattempts
// logattempt_ip		varchar(40)	NOT NULL 	 
// logattempt_browser	varchar(255)	NOT NULL 	 
// logattempt_urlfrom	varchar(255)	NOT NULL 	 
// logattempt_date	datetime	NOT NULL 	DEFAULT CURRENT_TIMESTAMP
// logattempt_email	varchar(128)	NOT NULL 	
// logattempt_pwd 	varchar(255)	NOT NULL 	DEFAULT	0

include 'includes/function/getip.php';


$logattempt_ip      = getRealIpAddr();
$logattempt_browser = $_SERVER['HTTP_USER_AGENT'];
$logattempt_urlfrom = $_SERVER['HTTP_REFERER'];
$logattempt_email   = $user_email;
$logattempt_pwd     = $_POST['user_pass'];


$loginfailinsert = $conn->prepare("INSERT INTO logattempts(logattempt_ip,logattempt_browser,logattempt_urlfrom,logattempt_email,logattempt_pwd)
values(:logattempt_ip, :logattempt_browser, :logattempt_urlfrom, :logattempt_email, :logattempt_pwd)
");
$loginfailinsert->bindParam (':logattempt_ip',$logattempt_ip);
$loginfailinsert->bindParam (':logattempt_browser',$logattempt_browser);
$loginfailinsert->bindParam (':logattempt_urlfrom',$logattempt_urlfrom);
$loginfailinsert->bindParam (':logattempt_email',$logattempt_email);
$loginfailinsert->bindParam (':logattempt_pwd',$logattempt_pwd);
$loginfailinsert->execute();


?>  