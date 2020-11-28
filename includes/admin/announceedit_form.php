<?php 
//announceedit.php
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
                        <h4 class="text-right">Announce Edit : <?php echo $data['ann_subject'] ?></h4> 
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md-4"><label class="labels">Ann ID</label><input type="text" class="form-control"  name="ann_id" value="<?php echo $data['ann_id']; ?>" readonly></div>
                        <div class="col-md-4">
                            <label class="labels">Create Date</label>
                            <input type="text" class="form-control" value="<?php echo $data['ann_date'] ?>" readonly>
                        </div>
                        <div class="col-md-4"><label class="labels">Update Date</label><input type="text" class="form-control" value="<?php echo $data['ann_date_update']; ?>" readonly></div>
                        <div class="col-md-6"><label class="labels">Create by</label><input type="text" class="form-control" value="<?php echo $data2['user_name'] ?>" readonly></div>
                        <div class="col-md-6"><label class="labels">Update by</label><input type="text" class="form-control" name="ann_upd_by" value="<?php echo $data3['user_name'] ?>" readonly></div>
                    </div>
                    <div class="row mt-3">
                   
                     
                        <div class="col-md-12"><label class="labels">Status (0= disable/1=enable)</label>
                        </div>
                        <div class="col-md-4">

                            <select class="col-md-4 custom-select" name="ann_status">    
                                                  <?php 
                            for($i=0;$i<=1;$i++)
                            {
                                if ($i == $data['ann_status']){
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
                        <div class="col-md-12"><label class="labels">Subject  <?php echo $usernameErr; ?></label><input type="text" class="form-control   <?php echo $nameclasserr; ?>" name="ann_subject" value="<?php echo $data['ann_subject'] ?>"></div>
                    </div>




                    <div class="row mt-3">
                        <div class="col-md-12"><label for="ann_content">Content</label><textarea class="form-control" id="ann_content" name="ann_content" rows="3"><?php echo $data['ann_content']; ?></textarea>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <input type="submit" class="btn btn-primary rounded-pill" name = "update_ann" Value = "Update Announce">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

