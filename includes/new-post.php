<?php 
    $_SESSION['topic_id'] = $_GET['id'];
    if (isset($_SESSION['user_id'])) { ?>
    <form id="newPostArea" method="post" action="includes/new-post_post.php">
        <div class="form-group">
            <textarea id="text-editor" name="new_post" type="text" class="form-control" placeholder="Your message"></textarea>
        </div>
        <button name="new_post_submit" id="btn-submit-post" type="submit" class="btn btn-primary btn-rounded">Submit</button>
    </form>
    <?php if (isset($post_alert)) { echo $post_alert; }?>
<?php }else{ ?>
    <p>Please login or register to post a reply.</p>
<?php } ?>

<script>const simplemde = new SimpleMDE();</script>



