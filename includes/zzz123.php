<?php
require 'connect.php'; 
$topic_id = 45;

$select_boardid = $conn->prepare("SELECT topic_board FROM topics WHERE topic_id = $topic_id LIMIT 1");
$select_boardid->setFetchMode(PDO::FETCH_ASSOC);
$select_boardid->execute();
$OnBoard_ID=$select_boardid->fetch();
$OnBoard_ID =  $OnBoard_ID[topic_board];
$select_boardstatus = $conn->prepare("SELECT board_status FROM boards WHERE boards.board_id = $OnBoard_ID LIMIT 1");
$select_boardstatus->setFetchMode(PDO::FETCH_ASSOC);
$select_boardstatus->execute();
$Board_Status1=$select_boardstatus->fetch();
    
if($Board_Status1[board_status] == 2)


?>