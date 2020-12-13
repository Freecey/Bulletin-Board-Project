<?php
//topicnew_form.php

?>
<div class="container rounded bg-white mt-5 mb-5 col-xl-10 col-md-9">
    <div class="row">


            <div class="p-3 py-5 col-12">
            <?php  echo '<form method="POST" action="'.$_SERVER['REQUEST_URI'].'">'; ?>
                    <div class="text-center <?php echo $user_id_nok_class; ?>">
                        <?php echo $user_id_nok; ?>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Edit Post </h4>
                    </div>
                    <div class="row col-mt-12">
                        <div class="col-md-12"><label class="labels">Subject </label><input type="text" class="form-control " name="topic_subject" value="<?php echo $Topic_info['topic_subject'] ?>" readonly></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12"><label for="post_content">Message </label><textarea class="form-control" id="post_content" name="post_content" rows="3"><?php 
                        if(isset($_POST['post_content'])){
                            echo $_POST['post_content']; 
                        }else{
                            echo $PostDATA['post_content'];
                        }
                        ?></textarea>
                        </div>
                    </div>

                    <div class="row mt-3">



                    </div>
                    <div class="mt-5 text-center">
                        <input type="submit" class="btn btn-primary rounded-pill" name = "post_edit" Value = "Edit Post">
                        <a href="javascript:history.go(-1)"><button class="btn btn-primary rounded-pill" type="button" >Back</button></a>
                        <input type="submit" class="btn btn-secondary rounded-pill" name = "delete_post" Value = "Delete Post">
                    </div>

                </form>
            </div>

    </div>
</div>