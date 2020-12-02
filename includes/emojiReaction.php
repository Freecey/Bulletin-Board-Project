<?php
    session_start();
    require('./../includes/connect.php');
    $postId = '';
    $emoji = '';
    $userId = $_SESSION['user_id'];
    if( isset($_GET['post_id'], $_GET['post_id'])) {
        $postId = $_GET['post_id'];
        $emoji = $_GET['emoji'];
    }

    $query = $conn->prepare('INSERT INTO `postreact`(`postreact_post`, `postreact_user`, `postreact_content`)
                            VALUES (:postId,:userId,:emoji)');
    $query->execute(array('postId'=>$postId, 'userId'=>$userId, 'emoji'=>$emoji));
    echo 'les données récupérées sont '. $postId . ', ' . $emoji . ' et le user id: '. $userId .'. Tout est à jour.';

?>