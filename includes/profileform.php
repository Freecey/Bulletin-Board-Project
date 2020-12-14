<?php 
//profileform.php
//mise en page formutaire
?>
<div class="container rounded bg-white mt-5 mb-5 col-xl-10 col-md-9">
    <div class="row form-color">
        <div class="col-xl-3 col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="data:image/webp;base64,<?php echo base64_encode($user_imgDATA_C); ?>" width="90" alt="User's Avatar"><span class="font-weight-bold"><?php echo $user_name ?></span><span class="text-black-50"><?php echo $data_Sel_USR['user_email'] ?></span>
            <span></span></div>

        <div class="d-flex flex-column align-items-center text-center p-3 py-2">
            <div class="form-group">
   


        <div class="">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
            <button type="button" id="btn-post-reply" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#exampleModal">Upload image <i class="fas fa-long-arrow-alt-left"></i></button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="1" role="dialog" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="z-index: 10">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Personnal Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">



<!-- <input type="file" name="myImage" /> -->

<!-- 
<form name="frmImage" enctype="multipart/form-data" action=""
        method="post" class="frmImageUpload">
        <label>Upload Image File:</label><br /> <input name="userImage"
            type="file" class="inputFile" /> <input type="submit"
            value="Submit" class="btnSubmit" />
    </form>
 -->



  <form method="POST" action="includes/upload.php" enctype="multipart/form-data">
    <!-- <span class="input-group-text" ></span> -->

    <div class="input-group justify-content-center ">
 
        <span  id="">Upload a File:</span>
    </div>


    <div class="justify-content-center">
    

        <div class="custom-file input-group-prepend my-3 justify-content-center">
        
            <input type="file"  class="input-group-text" name="uploadedFile" />
        
        </div>
    
        <div class="container">
             <div class="row form-color">
                 <div class="col text-center">
                     <input type="submit" class="input-group-text my-3"  name="uploadBtn" value="Upload" />
                     </div>
                </div>
            </div>
         </div>
  </form>




                        </div>
                    </div>
                </div>
            </div>
        </div>






            </div>
        </div>

        </div>
        <div class="col-xl-9 col-md-9 border-right">
            <div class="p-3 py-5">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="text-center <?php echo $UpdateOKClass . ' ' . $nameclasserr; ?>">
                        <?php echo $UpdateOK; ?>    
                        <?php echo $usernameErr; ?>
                        <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }
  ?>
                       
                    </div>
                    <div class="text-center <?php echo $pwdclasserrmm . ' ' . $UpdPWDOKClass . ' ' . $cpwdclasserrmm; ?>">
                        <?php echo $cpwdmatchErr; ?>    
                        <?php echo $passmatchErr; ?>
                        <?php echo $UpdPWDOK; ?>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Site Settings </h4> 
                    </div>
                    
                    <div class=" mt-2">
                    <label class="labels">Theme</label>

                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="user_theme" id="user_theme0" value="0" <?php if($data_Sel_USR['user_theme'] == 0 ){echo 'checked';} ?>>
                            <label class="form-check-label" for="user_theme0">
                                Default
                            </label>
                        </div>
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="user_theme" id="user_theme1" value="1" <?php if($data_Sel_USR['user_theme'] == 1 ){echo 'checked';} ?>>
                            <label class="form-check-label" for="user_theme1">
                                Dark
                            </label>
                        </div>                        
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="user_theme" id="user_theme6" value="6" <?php if($data_Sel_USR['user_theme'] == 6 ){echo 'checked';} ?>>
                            <label class="form-check-label" for="user_theme1">
                                Dark Blue - Special
                            </label>
                        </div>  
                            <div class="form-check disabled ml-2">
                            <input class="form-check-input" type="radio" name="user_theme" id="user_theme666" value="666" <?php if($data_Sel_USR['user_theme'] == 666 ){echo 'checked';} ?> <?php //if($data_Sel_USR['user_level'] < 3 ){echo 'disabled';} ?>>
                            <label class="form-check-label" for="user_theme666">
                                Devil
                            </label>
                        </div>

                        <div class=" mt-2">
                    <label class="labels">Avatar Image:</label>
                    <div class="form-check  ml-2">
                        <input class="form-check-input" type="radio" name="user_imagefrom"  value="1" <?php if($user_image_C == $user_gravatar){ echo 'checked';} ?>>
                        <label class="form-check-label" for="user_imagefrom">
                            Gravatar image
                        </label>
                    </div>


                    <div class="form-check  ml-2">
                        <input class="form-check-input" type="radio" name="user_imagefrom" value="2" <?php if( $user_image_C == $data_Sel_USR['user_imglocal'] ){ echo 'checked';} ?>>
                        <label class="form-check-label" for="user_imagefrom">
                        Personal Image
                        </label>
                    </div>
                    </label>
                    </div>
                    </div>


                    <div class="d-flex justify-content-between align-items-center my-3">
                        <h4 class="text-right">Profile Settings </h4> 
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" name="user_email" value="<?php echo $data_Sel_USR['user_email'] ?>" readonly></div>
                        <div class="col-md-12"><label class="labels">Alias (Display Name) <?php echo $usernameErr; ?></label><input type="text" class="form-control  <?php echo $nameclasserr; ?>" name="user_name" value="<?php echo htmlentities($data_Sel_USR['user_name'], ENT_QUOTES) ?>" required></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" name="user_fname" value="<?php echo htmlentities($data_Sel_USR['user_fname'], ENT_QUOTES) ?>" required></div>
                        <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" name="user_lname" value="<?php echo htmlentities($data_Sel_USR['user_lname'], ENT_QUOTES) ?>" required></div>
                    </div>
                    <div class="row mt-3">
                        <label class="col-md-12" for="inlineFormCustomSelectPref">Date of Birthday</label>
                        <select class="custom-select col-md-3 ml-3" name="dobd">
                            <option value="<?php echo $dobday ?>">Day</option>
                            <?php 
                            for($i=1;$i<=31;$i++)
                            {
                                if ($i == $dobday){
                                    echo "<option value='$i' selected>".$i."</option>";
                                } else {
                                    echo "<option value='$i'>".$i."</option>";
                                }
                            }
                            ?>
                        </select>
                        <select class="custom-select col-md-3 ml-3" name="dobm">
                            <option value="05">Month</option>
                            <?php 
                            for($i=1;$i<=12;$i++)
                            {
                                if ($i == $dobmonth){
                                    echo "<option value='$i' selected>".$i."</option>";
                                } else {
                                    echo "<option value='$i'>".$i."</option>";
                                }
                            }
                            ?>
                        </select>
                        <select class="custom-select col-md-3 ml-3" name="doby">
                            <option value="">Year</option>
                            <?php 
                            $actual_year = date("Y"); 
                            for($i=($actual_year-100);$i<=($actual_year-15);$i++)
                            {
                                if ($i == $dobyear){
                                    echo "<option value='$i' selected>".$i."</option>";
                                } else {
                                    echo "<option value='$i'>".$i."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12"><label for="user_sign">Signature</label><textarea class="form-control" id="user_sign" name="user_sign" rows="3"><?php echo htmlentities($data_Sel_USR['user_sign'], ENT_QUOTES); ?></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4"><label class="labels ">User ID</label><input type="text" class="form-control labels-inact" value="<?php echo $data_Sel_USR['user_id']; ?>" readonly></div>
                        <div class="col-md-4"><label class="labels">Active account</label><input type="text" class="form-control labels-inact" value="<?php echo $data_Sel_USR['user_active']; ?>" readonly></div>
                        <div class="col-md-4"><label class="labels">User Level</label><input type="text" class="form-control labels-inact" value="<?php echo $user_lvl_text; ?>" readonly></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="labels">Registry Date</label>
                            <input type="text" class="form-control labels-inact" value="<?php echo $data_Sel_USR['user_date'] ?>" readonly>
                        </div>
                        <div class="col-md-4"><label class="labels>Last Login Date</label><input type="text" class="form-control labels-inact" value="<?php echo $data_Sel_USR['user_datelastlog']; ?>" readonly></div>
                        <div class="col-md-4"><label class="labels">Last IP connexion</label><input type="text" class="form-control labels-inact" value="<?php echo $data_Sel_USR['user_last_ip']; ?>" readonly></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Secret Question (for password recovery)</label><input type="text" class="form-control" name="user_secquest" value="<?php echo htmlentities($data_Sel_USR['user_secquest'], ENT_QUOTES); ?>" ></div>
                        <div class="col-md-12"><label class="labels">Secret Answer</label><input type="text" class="form-control" name="user_secansw" value="<?php echo htmlentities($data_Sel_USR['user_secansw'], ENT_QUOTES);?>" ></div>
                    </div>
                    <div class="mt-5 text-center">
                        <input type="submit" class="btn btn-primary rounded-pill" name = "update_profil" Value = "Update Profile">
                        <a href="../"><button class="btn btn-primary rounded-pill" type="button" >Back</button></a>
                    </div>
                    <div class="mt-5 text-center <?php echo $pwdclasserrmm . ' ' . $UpdPWDOKClass . ' ' . $cpwdclasserrmm; ?>">
                        <?php echo $cpwdmatchErr; ?>    
                        <?php echo $passmatchErr; ?>
                        <?php echo $UpdPWDOK; ?>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4"><label class="labels">Old Password</label><input type="password" class="form-control  <?php echo $cpwdclasserrmm; ?>" name="pwd_current" placeholder="*******" value=""></div>
                        <div class="col-md-4"><label class="labels">New Password</label><input type="password" class="form-control  <?php echo $pwdclasserrmm; ?>" name="pwd_new" value="" ></div>
                        <div class="col-md-4"><label class="labels">Confirm New Password</label><input type="password" class="form-control <?php echo $pwdclasserrmm; ?>" name="pwd_newconfirm" value="" ></div>
                    </div>
                    <div class="mt-5 text-center">
                            <input type="submit" class="btn btn-primary rounded-pill" name = "update_pwd" Value = "Change Password">
                            
                    </div>
                </form>
                <div class="mt-5 d-flex align-items-end flex-column">
                <div class="p-2">
               
                <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/modal/account_remove.php'); ?>
                
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

