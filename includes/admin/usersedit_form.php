<?php 
//profileform.php
//mise en page formutaire
?>
<div class="container rounded bg-white mt-5 mb-5 col-xl-10 col-md-9">
    <div class="row">
        <div class="col-xl-3 col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="data:image/webp;base64,<?php echo base64_encode($data['user_imgdata']); ?>" width="90"><span class="font-weight-bold"><?php echo $data['user_name'] ?></span><span class="text-black-50"><?php echo $data['user_email'] ?></span><span> </span></div>
                              
        </div>
        <div class="col-xl-9 col-md-9 border-right">
            <div class="p-3 py-5">
                <form method="post">
                    <div class="text-center <?php echo $UpdateOKClass . ' ' . $nameclasserr; ?>">
                        <?php echo $UpdateOK; ?>    
                        <?php echo $usernameErr; ?>
                       
                    </div>
                    <div class="text-center <?php echo $pwdclasserrmm . ' ' . $UpdPWDOKClass . ' ' . $cpwdclasserrmm; ?>">
                        <?php echo $cpwdmatchErr; ?>    
                        <?php echo $passmatchErr; ?>
                        <?php echo $UpdPWDOK; ?>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings </h4> 
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md-4"><label class="labels">User ID</label><input type="text" class="form-control" value="<?php echo $data['user_id']; ?>" readonly></div>
                        <div class="col-md-4">
                            <label class="labels">Registry Date</label>
                            <input type="text" class="form-control" value="<?php echo $data['user_date'] ?>" readonly>
                        </div>
                        <div class="col-md-4"><label class="labels">Last Login Date</label><input type="text" class="form-control" value="<?php echo $data['user_datelastlog']; ?>" readonly></div>
                        <div class="col-md-4"><label class="labels">Last IP connexion</label><input type="text" class="form-control" value="<?php echo $data['user_last_ip']; ?>" readonly></div>
                    </div>
                    <div class="row mt-3">
                   
                     
                        <div class="col-md-4"><label class="labels">Active account</label>
                            <select class="custom-select" name="user_active">    
                                                  <?php 
                            for($i=0;$i<=2;$i++)
                            {
                                if ($i == $data['user_active']){
                                    echo "<option value='$i' selected>".$i."</option>";
                                } else {
                                    echo "<option value='$i'>".$i."</option>";
                                }
                            }
                            ?>
                            </select>
                        </div>

                        <div class="col-md-4"><label class="labels">User Level</label>
                            <select class="custom-select form-control" name="user_level">    
                                                  <?php 
                            for($ilvl=0;$ilvl<=4;$ilvl++)
                            {
                                if ($ilvl == $data['user_level']){
                                    echo "<option value='$user_lvl_text[$ilvl]' selected>".$user_lvl_text[$ilvl]."</option>";
                                } else {
                                    echo "<option value='$user_lvl_text[$ilvl]'>".$user_lvl_text[$ilvl]."</option>";
                                }
                            } 
                            if (666 == $data['user_level']){
                                echo "<option value='$user_lvl_text[666]' selected>".$user_lvl_text[666]."</option>";
                            } else {
                                echo "<option value='$user_lvl_text[666]'>".$user_lvl_text[666]."</option>";
                            }
                            ?>
                            </select>
                        <!-- <input type="text" class="form-control" value="<?php echo $user_lvl_text; ?>"> -->
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" name="user_email" value="<?php echo $data['user_email'] ?>"></div>
                        <div class="col-md-12"><label class="labels">Alias (Display Name) <?php echo $usernameErr; ?></label><input type="text" class="form-control  <?php echo $nameclasserr; ?>" name="user_name" value="<?php echo $data['user_name'] ?>"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" name="user_fname" value="<?php echo $data['user_fname'] ?>"></div>
                        <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" name="user_lname" value="<?php echo $data['user_lname'] ?>"></div>
                    </div>

                    <div class="row mt-3">
                        <label class="col-md-12" for="inlineFormCustomSelectPref">Date of Birthday</label>
                        <select class="custom-select col-md-2 ml-2" name="dobd">
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
                        <select class="custom-select col-md-2 ml-2" name="dobm">
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
                        <select class="custom-select col-md-2 ml-2" name="doby">
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
                        <div class="col-md-12"><label for="user_sign">Signature</label><textarea class="form-control" id="user_sign" name="user_sign" rows="3"><?php echo $data['user_sign']; ?></textarea>
                        </div>
                    </div>




                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Secret Question (for password recovery)</label><input type="text" class="form-control" name="user_secquest" value="<?php echo $data['user_secquest']; ?>" ></div>
                        <div class="col-md-12"><label class="labels">Secret Answer</label><input type="text" class="form-control" name="user_secansw" value="<?php echo $data['user_secansw']; ?>" ></div>
                    </div>
                    <div class="mt-5 text-center">
                        <input type="submit" class="btn btn-primary rounded-pill" name = "update_profil" Value = "Update Profile">
                    </div>
                    <div class="mt-5 text-center <?php echo $pwdclasserrmm . ' ' . $UpdPWDOKClass . ' ' . $cpwdclasserrmm; ?>">
                        <?php echo $cpwdmatchErr; ?>    
                        <?php echo $passmatchErr; ?>
                        <?php echo $UpdPWDOK; ?>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4"><label class="labels">New Password</label><input type="password" class="form-control  <?php echo $pwdclasserrmm; ?>" name="pwd_new" value="" ></div>
                        <div class="col-md-4"><label class="labels">Confirm New Password</label><input type="password" class="form-control <?php echo $pwdclasserrmm; ?>" name="pwd_newconfirm" value="" ></div>
                    </div>
                    <div class="mt-5 text-center">
                            <input type="submit" class="btn btn-primary rounded-pill" name = "update_pwd" Value = "Change Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

