<?php
//topicnew_form.php

?>
<!-- <div class="container rounded bg-white mt-5 mb-5 col-xl-10 col-md-9"> -->
    <div class="row">


            <div class="p-3 py-5 col-12">
                <form method="post">
                    <div class="text-center <?php echo $user_id_nok_class; ?>">
                        <?php echo $user_id_nok; ?>
                    </div>

                    <!-- <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Create New Topic </h4>
                    </div> -->
                    <div class="row col-mt-12">
                        <div class="col-md-12"><label class="labels">Subject <?php echo $usernameErr; ?></label><input type="text" class="form-control  <?php echo $nameclasserr; ?>" name="topic_subject" value="<?php echo htmlentities($_POST['topic_subject']) ?>"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12"><label for="post_content">Message <?php echo $MsgErr; ?></label><textarea class="form-control  <?php echo $Msgclasserr; ?>" id="post_content" name="post_content" rows="3"><?php echo htmlentities($_POST['post_content']); ?></textarea>
                        </div>
                    </div>

                    <div class="row mt-3">


                        <div class="col-md-6 col-6"><label class="labels">Board</label>
                            <select class="custom-select form-control" name="board_id">

                            <?php $i = 1;
                                if ($req_boards) {
                                    while ($row = $req_boards->fetch()) {
                                        $i++;
                                        if ($_GET['id'] == $i - 1) {
                                            echo "<option value='" . $row['board_id'] . "' selected>" . $row['board_name'] . "</option>";
                                        } else {
                                            echo "<option value='" . $row['board_id'] . "'>" . $row['board_name'] . "</option>";
                                        }

                                    }
                                } else {echo "DATA NOT FOUND";}?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <input type="submit" class="btn btn-primary rounded-pill" name = "topic_new" Value = "Create New Topic " >
                        <a href="javascript:history.go(-1)"><button class="btn btn-primary rounded-pill" type="button" >Back</button></a>
                    </div>

                </form>
            </div>

    </div>
<!-- </div> -->
