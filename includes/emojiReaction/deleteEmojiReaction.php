<?php
    session_start();
    header('Content-type: application/json');

    include($_SERVER['DOCUMENT_ROOT'].'/includes/function/functions.php');
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) && isset($_GET['reaction_id']) && isset($_GET['reaction_post'])) {
            $reactionById = getReactionById($_GET['reaction_id']);
            foreach($reactionById as $reactId) {
                //$reactions = getReactions($_GET['reaction_post']);
                require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
                $query = $conn->prepare('SELECT * FROM postreact WHERE postreact_post = ? AND postreact_content = ?');
                $query->execute([$_GET['reaction_post'], $reactId['postreact_content']]);
                $counter = 0;
                foreach($query as $reaction) {
                    if ($reaction['postreact_user'] == $_SESSION['user_id']) {
                        $counter = 1;
                    break;
                    }
                }
                if ($counter == 1) {
                    $response_array['status'] = 'removed';
                    removeReaction($_GET['reaction_id']);
                } else {
                    $response_array['status'] = 'added';
                    addReaction($reactId['postreact_post'], $_SESSION['user_id'], $reactId['postreact_content']);
                }
            }
            
            
    } else {
        $response_array['status'] = 'You are not logged';
    }
    echo json_encode($response_array);
?>