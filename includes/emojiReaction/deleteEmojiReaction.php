<?php
session_start();
    $reactId= '';
    $reactUserId= '';
    include($_SERVER['DOCUMENT_ROOT'].'/includes/function/functions.php');
    try {
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        $currentUserId= $_SESSION['user_id'];
        if( isset($_GET['reaction_id'])) {
            $reactId = $_GET['reaction_id'];
            $reactions = getReactionsById($reactId);

            while($reaction = $reactions->fetch()) {
                print_r($reaction, TRUE);
                if ($reaction['postreact_user'] == $currentUserId) {
                    removeReaction($reactId);
                } else {
                    addReaction($reaction['postreact_post'], $currentUserId, $reaction['postreact_content']);
                }
            }
        }
    } else {
        $response_array['status'] = 'You are not logged';
        echo json_encode($response_array);
    }
} catch(Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
?>