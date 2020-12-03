<?php
session_start();
    $reactId= '';
    $currentUserId= $_SESSION['user_id'];
    $reactUserId= '';
    include('./../function/functions.php');

    if( isset($_GET['reaction_id'])) {
        $reactId = $_GET['reaction_id'];
    }
    removeReaction($reactId);
?>