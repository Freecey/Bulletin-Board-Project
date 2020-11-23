<?php 
//profileform.php
//mise en page formutaire
?>
<div class="container rounded bg-white mt-5 mb-5 col-xl-10 col-md-9">
    <div class="row">
        <div class="col-xl-3 col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="<?php echo $user_gravatar; ?>" width="90"><span class="font-weight-bold"><?php echo $user_name ?></span><span class="text-black-50"><?php echo $data['user_email'] ?></span><span> </span></div>
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
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" name="user_email" value="<?php echo $data['user_email'] ?>" readonly></div>
                        <div class="col-md-12"><label class="labels">Alias (Display Name) <?php echo $usernameErr; ?></label><input type="text" class="form-control  <?php echo $nameclasserr; ?>" name="user_name" value="<?php echo $data['user_name'] ?>" required></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" name="user_fname" value="<?php echo $data['user_fname'] ?>" required></div>
                        <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" name="user_lname" value="<?php echo $data['user_lname'] ?>" required></div>
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
                        <div class="col-md-12"><label for="user_sign">Signature</label><textarea class="form-control" id="user_sign" name="user_sign" rows="3"><?php echo $data['user_sign']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4"><label class="labels">User ID</label><input type="text" class="form-control" value="<?php echo $data['user_id']; ?>" readonly></div>
                        <div class="col-md-4"><label class="labels">Active account</label><input type="text" class="form-control" value="<?php echo $data['user_active']; ?>" readonly></div>
                        <div class="col-md-4"><label class="labels">User Level</label><input type="text" class="form-control" value="<?php echo $user_lvl_text; ?>" readonly></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="labels">Registry Date</label>
                            <input type="text" class="form-control" value="<?php echo $data['user_date'] ?>" readonly>
                        </div>
                        <div class="col-md-4"><label class="labels">Last Login Date</label><input type="text" class="form-control" value="<?php echo $data['user_datelastlog']; ?>" readonly></div>
                        <div class="col-md-4"><label class="labels">Last IP connexion</label><input type="text" class="form-control" value="<?php echo $data['user_last_ip']; ?>" readonly></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Secret Question (for password recovery)</label><input type="text" class="form-control" name="user_secquest" value="<?php echo $data['user_secquest']; ?>" ></div>
                        <div class="col-md-12"><label class="labels">Secret Answer</label><input type="text" class="form-control" name="user_secansw" value="<?php echo $data['user_secansw']; ?>" ></div>
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
            </div>
        </div>
    </div>
</div>

