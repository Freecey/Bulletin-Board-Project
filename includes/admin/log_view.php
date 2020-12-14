<?php 
//log_view.php


//  TABLE `logattempts` 
//     `logattempt_id` int NOT NULL,
//     `logattempt_ip` varchar(40) NOT NULL,
//     `logattempt_browser` varchar(255) NOT NULL,
//     `logattempt_urlfrom` varchar(255) DEFAULT NULL,
//     `logattempt_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
//     `logattempt_email` varchar(128) NOT NULL,
//     `logattempt_pwd` varchar(255) NOT NULL DEFAULT '0'

$req_logfail = $conn->query("SELECT * FROM logattempts ORDER BY logattempt_date DESC LIMIT 20"); 
$req_loginok = $conn->query("SELECT * FROM loginok  ORDER BY loginok_date DESC LIMIT 20"); 
?>