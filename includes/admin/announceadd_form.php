<?php 
//announceadd_form.php
//mise en page formutaire
?>
<div class="container rounded bg-white mt-5 mb-5 col-xl-10 col-md-9">
    <div class="row">
        <div class="col-xl-3 col-md-3 border-right">
            
                              
        </div>
        <div class="col-xl-9 col-md-9 border-right">
            <div class="p-3 py-5">
                <form method="post">
                    <div class="text-center <?php echo $UpdateOKClass . ' ' . $nameclasserr . ' ' . $contentclasserr; ?>">
                        <?php echo $UpdateOK; ?>    
                        <?php echo $usernameErr; ?>
                       
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Create New Announce: </h4> 
                    </div>
                    <div class="mt-3 row">
    
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Subject </label><input type="text" class="form-control   <?php echo $nameclasserr; ?>" name="ann_subject" value="<?php echo $ADD_ann_subject; ?>"></div>
                        
                    </div>




                    <div class="row mt-3">
                        <div class="col-md-12"><label for="ann_content">Announce Content</label><textarea class="form-control   <?php echo $contentclasserr; ?>" id="ann_content" name="ann_content" rows="3"><?php echo $ADD_ann_content; ?></textarea>
                        </div>
                    </div>

                    <div class="row mt-3">
                   
                     



                   <div class="col-md-4"><label class="labels">Status (0= disable/1=enable)</label>
                       <select class="custom-select" name="ann_status">    
                                             <?php 
                       for($i=0;$i<=1;$i++)
                       {
                           if ($i == $ADD_ann_status){
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
                        <div class="col-md-12"><label class="labels">Create by</label><input type="text" class="form-control" name="user_name" value="<?php echo $_SESSION['user_name'] ?>" readonly></div>
                    </div>

                    <div class="mt-5 text-center">
                        <input type="submit" class="btn btn-primary rounded-pill" name = "create_ann" Value = "Create Announce">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

