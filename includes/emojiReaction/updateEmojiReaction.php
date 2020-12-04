<?php
    $postId = '';
    if( isset($_GET['post_id'])) {
        include($_SERVER['DOCUMENT_ROOT'].'/includes/function/functions.php');
        $postId = $_GET['post_id'];
    } else {
        
        $postId = $post['post_id'];
    }
    $reactions = getReactions($postId);
    while($reaction = $reactions->fetch()) {
        $user = getUser($reaction['postreact_user']);
?>
<button type="button" class="btn btn-light btn-sm reactionButton" data-toggle="tooltip" data-placement="top" title="<?= $user['user_name']; ?>" onclick="deleteEmojiButton(<?= $reaction['postreact_id']; ?>, <?= $reaction['postreact_post']; ?>)">
    <?= $reaction['postreact_content']; ?><span class="badge">1</span>
</button>
<?php  
    }
    $reactions->closeCursor();
?>