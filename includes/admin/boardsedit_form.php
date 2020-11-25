<?php 
//boardsedit_form.php
//mise en page formutaire
?>
<div class="container rounded bg-white mt-5 mb-5 col-xl-10 col-md-9">
    <div class="row">
        <div class="col-xl-3 col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="../<?php echo $data['board_image']; ?>" width="90"><span class="font-weight-bold"><?php echo $data['board_name'] ?></span><span> </span></div>
                              
        </div>
        <div class="col-xl-9 col-md-9 border-right">
            <div class="p-3 py-5">
                <form method="post">
                    <div class="text-center <?php echo $UpdateOKClass . ' ' . $nameclasserr; ?>">
                        <?php echo $UpdateOK; ?>    
                        <?php echo $usernameErr; ?>
                       
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Board Edit : <?php echo $data['board_name'] ?></h4> 
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md-4"><label class="labels">Board ID</label><input type="text" class="form-control" value="<?php echo $data['board_id']; ?>" readonly></div>
                        <div class="col-md-4">
                            <label class="labels">Create Date</label>
                            <input type="text" class="form-control" value="<?php echo $data['board_creat_date'] ?>" readonly>
                        </div>
                        <div class="col-md-4"><label class="labels">Update Date</label><input type="text" class="form-control" value="<?php echo $data['board_upd_date']; ?>" readonly></div>
                    </div>
                    <div class="row mt-3">
                   
                     
                        <div class="col-md-4"><label class="labels">Board Status (0= disable/1=enable)</label>
                            <select class="custom-select" name="board_status">    
                                                  <?php 
                            for($i=0;$i<=1;$i++)
                            {
                                if ($i == $data['board_status']){
                                    echo "<option value='$i' selected>".$i."</option>";
                                } else {
                                    echo "<option value='$i'>".$i."</option>";
                                }
                            }
                            ?>
                            </select>
                        </div>

                        <div class="col-md-4"><label class="labels">Image Board</label>
                            <select class="custom-select" name="board_image">    

                                    <?php //board_image_cur
                                    if ($handle = opendir('../assets/topics/')) {

                                    while (false !== ($entry = readdir($handle))) {

                                        if ($entry != "." && $entry != ".." && $entry != ".DS_Store") {

                                            if ($entry == $board_image_cur){
                                                echo "<option value='$entry' selected>".$entry."</option>";
                                            } else {
                                                echo "<option value='$entry'>".$entry."</option>";
                                            }
                                        }
                                    }

                                    closedir($handle);
                                    }

                                    ?>


                            </select>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Board Name  <?php echo $usernameErr; ?></label><input type="text" class="form-control   <?php echo $nameclasserr; ?>" name="board_name" value="<?php echo $data['board_name'] ?>"></div>
                        <div class="col-md-12"><label class="labels">Create by</label><input type="text" class="form-control" name="user_name" value="<?php echo $data2['user_name'] ?>" readonly></div>
                    </div>




                    <div class="row mt-3">
                        <div class="col-md-12"><label for="board_description">Board Description</label><textarea class="form-control" id="board_description" name="board_description" rows="3"><?php echo $data['board_description']; ?></textarea>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <input type="submit" class="btn btn-primary rounded-pill" name = "update_board" Value = "Update board">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

