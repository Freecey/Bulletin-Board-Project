<?php
session_start();
    $reactId= '';
    $reactUserId= '';
    header('Content-type: application/json');
    include($_SERVER['DOCUMENT_ROOT'].'/includes/function/functions.php');
    try {
    
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        $currentUserId= $_SESSION['user_id'];
        if( isset($_GET['reaction_id'])) {
            $reactId = $_GET['reaction_id'];
            $users = getReactionsById($reactId);
            while($user = $users->fetch()) {
                if ($user['postreact_user'] == $currentUserId) {
                    removeReaction($reactId);
                    $response_array['status'] = 'success';
                    echo json_encode($response_array);
                } else {
                    $response_array['status'] = 'You are not the author of this reaction';
                    echo json_encode($response_array);
                }
            }
        }
    } else {
        $response_array['status'] = 'You are not logged';
        echo json_encode($response_array);
    }
} catch (Exception $e) {
    echo "Captured Throwable: " . $e->getMessage();
}
?>