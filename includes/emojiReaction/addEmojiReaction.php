<?php
    session_start();
    require('./../connect.php');
    $postId = '';
    $emoji = '';
    $userId = $_SESSION['user_id'];
    if( isset($_GET['post_id'], $_GET['post_id'])) {
        $postId = $_GET['post_id'];
        $emoji = $_GET['emoji'];
    }
    header('Content-type: application/json');

    try {
    $query = $conn->prepare('INSERT INTO `postreact`(`postreact_post`, `postreact_user`, `postreact_content`) 
    SELECT :postId, :userId, :emoji 
    WHERE NOT EXISTS 
        (SELECT `postreact_post`, `postreact_user`, `postreact_content` 
        FROM `postreact` 
        WHERE `postreact_post` = :postId
        AND `postreact_user` = :userId
        AND `postreact_content` = :emoji )');
    $query->execute(['postId'=>$postId, 'userId'=>$userId, 'emoji'=>$emoji]);
    $response_array['status'] = 'success';
        echo json_encode($response_array);
    } catch (Exception $e) {
        $response_array['status'] = 'duplicate';
        echo json_encode($response_array);
    }
?>