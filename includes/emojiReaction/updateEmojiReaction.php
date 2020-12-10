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
            $users .= '<p>'. $user['user_name'] .'</p>';
        }
    ?>
    <button type="button" class="btn btn-light btn-sm reactionButton" data-toggle="tooltip" data-placement="top" title="<?= $users ?>" onclick="deleteEmojiButton(<?= $reaction['postreact_id']; ?>, <?= $reaction['postreact_post']; ?>)">
    <?= $reaction[0]['postreact_content']; ?><span class="badge"><?= count($reaction) ?></span>
    </button>
    <?php
    }
    while($reaction = $reactions->fetch()) {
        $user = getUser($reaction['postreact_user']);
?>
<button type="button" class="btn btn-light btn-sm reactionButton" data-toggle="tooltip" data-placement="top" data-original-title="<?= $user['user_name']; ?>" onclick="deleteEmojiButton(<?= $reaction['postreact_id']; ?>, <?= $reaction['postreact_post']; ?>)">
    <?= $reaction['postreact_content']; ?><span class="badge">1</span>
</button>
<?php  
    }
?>
<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>