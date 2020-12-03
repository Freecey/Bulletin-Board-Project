<?php
    $postId = '';
    if( isset($_GET['post_id'])) {
        include('./../function/functions.php');
        $postId = $_GET['post_id'];
    } else {
        
        $postId = $post['post_id'];
    }
    $reactions = getReactions($postId);
    while($reaction = $reactions->fetch()) {
?>
<button type="button" class="btn btn-light btn-sm reactionButton">
    <?= $reaction['postreact_content']; ?><span class="badge">1</span>
</button>
<?php  
    }
    $reactions->closeCursor();
?>