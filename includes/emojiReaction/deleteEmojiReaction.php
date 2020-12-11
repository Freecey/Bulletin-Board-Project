<?php
session_start();
    $reactId= '';
    $reactUserId= '';
    include($_SERVER['DOCUMENT_ROOT'].'/includes/function/functions.php');
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        $currentUserId= $_SESSION['user_id'];
        if( isset($_GET['reaction_id'])) {
            $reactId = $_GET['reaction_id'];
            $reactions = getReactionsById($reactId);

            foreach($reactions as $reaction) {
                print_r($reaction, TRUE);
                if ($reaction['postreact_user'] == $currentUserId) {
                    removeReaction($reactId);
                } else {
                    // addReaction($reaction['postreact_post'], $currentUserId, $reaction['postreact_content']);
                    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
                    $query = $conn->prepare('INSERT INTO postreact(postreact_post, postreact_user, postreact_content)
                                                VALUES (:postId, :userId, :content)');
                    $query->execute(['postId'=>$reaction['postreact_post'], 'userId'=>$currentUserId, 'content'=>$reaction['postreact_content']]);
                }
            }
        }
    } else {
        header('Content-type: application/json');
        $response_array['status'] = 'You are not logged';
        echo json_encode($response_array);
    }
?>