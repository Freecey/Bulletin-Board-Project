<?php 
//topicsedit.php
//mise en page formutaire
?>
<div class="container rounded bg-white mt-5 mb-5 col-xl-10 col-md-9">
    <div class="row">
        <div class="col-xl-3 col-md-3 border-right">
                              
        </div>
        <div class="col-xl-9 col-md-9 border-right">
            <div class="p-3 py-5">
                <form method="post">
                    <div class="text-center <?php echo $UpdateOKClass . ' ' . $nameclasserr; ?>">
                        <?php echo $UpdateOK; ?>    
                        <?php echo $usernameErr; ?>
                       
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Topic Edit : <?php echo $data['topic_subject'] ?></h4> 
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md-4"><label class="labels">Topic ID</label><input type="text" class="form-control"  name="topic_id" value="<?php echo $data['topic_id']; ?>" readonly></div>
                        <div class="col-md-4">
                            <label class="labels">Create Date</label>
                            <input type="text" class="form-control" value="<?php echo $data['topic_date'] ?>" readonly>
                        </div>
                        <div class="col-md-4"><label class="labels">Update Date</label><input type="text" class="form-control" value="<?php echo $data['topic_date_upd']; ?>" readonly></div>
                        <div class="col-md-6"><label class="labels">Create by</label><input type="text" class="form-control" value="<?php echo $data2['user_name'] ?>" readonly></div>
                        <div class="col-md-6 col-6"><label class="labels">On Board</label>
                            <select class="custom-select form-control" name="topic_board">

                            <?php $i = 1;
                                if ($req_boards) {
                                    while ($row = $req_boards->fetch()) {
                                        $i++;
                                        if ($data['topic_board'] == $i - 1) {
                                            echo "<option value='" . $row[board_id] . "' selected>" . $row[board_name] . "</option>";
                                        } else {
                                            echo "<option value='" . $row[board_id] . "'>" . $row[board_name] . "</option>";
                                        }

                                    }
                                } else {echo "DATA NOT FOUND";}?>
                            </select>
                        </div>



                    </div>
                    <div class="row mt-3">
                   
                     
                        <div class="col-md-12"><label class="labels">Status (0= normal/1=close/2=deleted)</label>
                        </div>
                        <div class="col-md-4">

                            <select class="col-md-4 custom-select" name="topic_status">    
                                                  <?php 
                            for($i=0;$i<=2;$i++)
                            {
                                if ($i == $data['topic_status']){
                                    echo "<option value='$i' selected>".$i."</option>";
                                } else {
                                    echo "<option value='$i'>".$i."</option>";
                                }
                            }
                            ?>
                            </select>
                        </div>



                    </div>

                    
                        
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Subject  <?php echo $usernameErr; ?></label><input type="text" class="form-control   <?php echo $nameclasserr; ?>" name="topic_subject" value="<?php echo $data['topic_subject'] ?>"></div>
                    </div>

                    <div class="mt-5 text-center">
                        <input type="submit" class="btn btn-primary rounded-pill" name = "update_topic" Value = "Update Topic">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

