

<?php include 'connect.php'; 

    $topic_id = $_GET['id'];

    $new_post_msg = $conn -> prepare('SELECT * FROM posts WHERE post_topic = ?');
    $new_post_msg -> execute(array($topic_id));

    if (isset($_POST['new_post_submit'], $_POST['new_post'])) {
        $new_post_msg = htmlspecialchars($_POST['new_post']);
        if (isset($_SESSION['user_id'])) {
            if (!empty($new_post_msg)) {
                $insert = $conn -> prepare('INSERT INTO posts(post_topic, post_content, post_by,  post_date)VALUES( ?, ?, ?, NOW())');
                $insert ->execute(array($topic_id, $new_post_msg, $_SESSION['user_id'],));
                $post_alert = "Your message has been posted.";
            }else{ 
            $post_alert = "Your message cannot be empty.";
            }      
        }else{ 
            $post_alert = "Please login or register.";
        }
    }
?>


<?php 
    if (isset($_SESSION['user_id'])) { ?>
    <form id="newPostArea" method="post">
        <div class="form-group">
            <textarea id="text-editor" name="new_post" type="text" class="form-control" placeholder="Your message"></textarea>
        </div>
        <button name="new_post_submit" id="btn-submit-post" type="submit" class="btn btn-primary btn-rounded">Submit</button>
    </form>
    <?php if (isset($post_alert)) { echo $post_alert; }?>
<?php }else{ ?>
    <p>Please login or register to post a reply.</p>
<?php } ?>

<script>
    displayTextEditor()
</script>


