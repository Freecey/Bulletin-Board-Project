<?php
    $postId = '';
    if( isset($_GET['post_id'])) {
        include($_SERVER['DOCUMENT_ROOT'].'/includes/function/functions.php');
        $postId = $_GET['post_id'];
    } else {
        $postId = $post['post_id'];
    }

    $groupReactions = array();
    $reactions = getReactions($postId);
    foreach($reactions as $reaction) {
        $groupReactions[$reaction['postreact_content']][] = $reaction;
    }
    
    foreach($groupReactions as $reaction) {
        // print("<pre>".print_r($reaction,true)."</pre>");
        $users = '';
        foreach($reaction as $name) {
            $user = getUser($name['postreact_user']);
            $users .= $user['user_name']. ' ';
        }
    ?>
    <button type="button" class="btn btn-light btn-sm reactionButton" data-toggle="tooltip" data-placement="top" title="<?= $users ?>" onclick="deleteEmojiButton(<?= $reaction[0]['postreact_id']; ?>, <?= $reaction[0]['postreact_post']; ?>)">
    <?= $reaction[0]['postreact_content']; ?><span class="badge"><?= count($reaction) ?></span>
    </button>
    <?php
    }
    
?>
<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>