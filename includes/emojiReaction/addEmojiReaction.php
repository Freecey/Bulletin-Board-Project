<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'].'/includes/function/functions.php');
    $counter = null;
    $postId = '';
    $emoji = '';
    $userId = $_SESSION['user_id'];
    if( isset($_GET['post_id'], $_GET['post_id'])) {
        $postId = $_GET['post_id'];
        $emoji = $_GET['emoji'];
    }
    header('Content-type: application/json');
    $reactions = getReactions($postId);
    foreach($reactions as $reaction) {
        if ($reaction['postreact_user'] == $userId && $reaction['postreact_content'] == $emoji) {
            $counter = 1;
        break;
        }
    }

    if ($counter == 1) {
        $response_array['status'] = 'removed';
        echo json_encode($response_array);
    } else {
        addReaction($postId, $userId, $emoji);
        $response_array['status'] = 'added';
        echo json_encode($response_array);
    }
?>