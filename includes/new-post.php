<?php 
    $_SESSION['topic_id'] = $_GET['id'];
    if (isset($_SESSION['user_id'])) { ?>
    <form id="newPostArea" method="post" action="includes/new-post_post.php">
        <div class="form-group">
            <textarea id="text-editor" name="new_post" type="text" class="form-control" placeholder="Your message"></textarea>
            <div class="reaction">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="Third group">
                        <button type="button" aria-describedby="tooltip" class="btn btn-outline emojiButton"><i class="far fa-laugh-wink"></i></button>
                    </div>
                </div>
                <div class="emojiTooltip" role="tooltip">
                    <emoji-picker id="postmessage"></emoji-picker>
                    <div id="arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
        <button name="new_post_submit" id="btn-submit-post" type="submit" class="btn btn-primary btn-rounded">Submit</button>
    </form>
    <?php if (isset($post_alert)) { echo $post_alert; }?>
<?php }else{ ?>
    <p>Please login or register to post a reply.</p>
<?php } ?>

<script>
var simplemde = new SimpleMDE({ element: document.getElementById("text-editor") });
</script>
<script>
    document.querySelector('#postmessage')
        .addEventListener('emoji-click', event => {
            console.log(event.detail.unicode);
            let text = simplemde.value();
            let savedText = text;
            console.log(savedText);
            simplemde.value(savedText + event.detail.unicode);
            });
</script>





