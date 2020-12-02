<?php 
//boardsedit_form.php
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
                        <h4 class="text-right">Create New Board: </h4> 
                    </div>
                    <div class="mt-3 row">
    
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Board Name  <?php echo $usernameErr; ?></label><input type="text" class="form-control   <?php echo $nameclasserr; ?>" name="board_name" value="<?php echo $ADD_board_name; ?>"></div>
                        
                    </div>




                    <div class="row mt-3">
                        <div class="col-md-12"><label for="board_description">Board Description</label><textarea class="form-control" id="board_description" name="board_description" rows="3"><?php echo $ADD_board_description; ?></textarea>
                        </div>
                    </div>

                    <div class="row mt-3">
                   
                     


                   <div class="col-md-4"><label class="labels">Image Board</label>
                       <select class="custom-select" name="board_image">    

                               <?php //board_image_cur
                               if ($handle = opendir('../assets/topics/')) {

                               while (false !== ($entry = readdir($handle))) {

                                   if ($entry != "." && $entry != ".." && $entry != ".DS_Store") {

                                       if ($entry == $ADD_board_image2){
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
                   <div class="col-md-6"><label class="labels">Board Status <small>(0= disable/1=enable/2=secret)</small></label>
                       <select class="custom-select" name="board_status">    
                                             <?php 
                       for($i=0;$i<=2;$i++)
                       {
                           if ($i == $ADD_board_status){
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
                        <input type="submit" class="btn btn-primary rounded-pill" name = "create_board" Value = "Create board">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

