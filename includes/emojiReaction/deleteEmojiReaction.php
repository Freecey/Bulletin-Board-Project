<?php
    session_start();
    header('Content-type: application/json');

    include($_SERVER['DOCUMENT_ROOT'].'/includes/function/functions.php');
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) && isset($_GET['reaction_id'])) {
            $reactions = getReactionsById($_GET['reaction_id']);
            foreach($reactions as $reaction) {
                
                if ($reaction['postreact_user'] == $_SESSION['user_id']) {
                    $response_array['status'] = 'removed';
                    removeReaction($_GET['reaction_id']);
                } else {
                    $response_array['status'] = 'added';
                    addReaction($reaction['postreact_post'], $_SESSION['user_id'], $reaction['postreact_content']);
                }
                $response_array['status'] .= $reaction['postreact_user']. ' ';
            }
    } else {
        $response_array['status'] = 'You are not logged';
    }
    echo json_encode($response_array);
?>