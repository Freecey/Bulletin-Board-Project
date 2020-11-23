<?php 
//profileform.php
//mise en page formutaire
?>
<div class="container rounded bg-white mt-5 mb-5 col-xl-10 col-md-9">
    <div class="row">
        <div class="col-xl-3 col-md-3 border-right">
            <!-- <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="./assets/pwdforgot/funny-it-comics-li-anne-dias-fb.png" width="200x"><span class="font-weight-bold"><?php echo $user_name ?></span><span class="text-black-50"><?php echo $data['user_email'] ?></span><span> </span></div> -->
        </div>
        <div class="col-xl-7 col-md-7 border-right">
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
                        <h4 class="text-right">Password Recovery</h4> 
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control <?php echo $_SESSION['lp_LOCKClassOK_1'];?>" name="user_email" value="<?php echo $_SESSION[lp_user_email]; ?>" required <?php echo $_SESSION['lp_LOCK_1'];?>></div>
                        <div class="col-md-12"><label class="labels">Alias (Display Name) <?php echo $usernameErr; ?></label><input type="text" class="form-control  <?php echo $nameclasserr; ?>  <?php echo $_SESSION['lp_LOCKClassOK_1'];?>" name="user_name" value="<?php echo $_SESSION[lp_user_name]; ?>" required <?php echo $_SESSION['lp_LOCK_1'];?>></div>
                    </div>
                    <!-- <div class="row mt-3">
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
                    </div> -->


                    <div class="mt-5 text-center">
                        <input type="submit" class="btn btn-primary rounded-pill " name = "get_secquest" Value = "1. Get Secret Question">
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Secret Question :</label><input type="text" class="form-control  <?php echo $_SESSION['lp_LOCKClassOK_2'];?>" name="user_secquest" value="<?php echo $_SESSION['lp_user_secquest'];?>" readonly></div>
                        <div class="col-md-12"><label class="labels">Secret Answer</label><input type="text" class="form-control  <?php echo $_SESSION['lp_LOCKClassOK_2'];?>" name="user_secansw" value="<?php echo $_SESSION['lp_user_secansw'] ?>" <?php echo $_SESSION['lp_LOCK_2'];?>></div>
                    </div>
                    <div class="mt-5 text-center">
                        <input type="submit" class="btn btn-primary rounded-pill" name = "check_secans" Value = "2. Valide Secrect Answer">
                    </div>
                    <div class="mt-5 text-center <?php echo $pwdclasserrmm . ' ' . $UpdPWDOKClass . ' ' . $cpwdclasserrmm; ?>">
                        <?php echo $cpwdmatchErr; ?>    
                        <?php echo $passmatchErr; ?>
                        <?php echo $UpdPWDOK; ?>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">New Password</label><input type="password" class="form-control  <?php echo $pwdclasserrmm; ?> <?php echo $_SESSION['lp_LOCKClassOK_3'];?>" name="pwd_new" value=""  <?php echo $_SESSION['lp_LOCK_3'];?>></div>
                        <div class="col-md-6"><label class="labels">Confirm New Password</label><input type="password" class="form-control <?php echo $pwdclasserrmm; ?> <?php echo $_SESSION['lp_LOCKClassOK_3'];?>" name="pwd_newconfirm" value=""  <?php echo $_SESSION['lp_LOCK_3'];?>></div>
                    </div>
                    <div class="mt-5 text-center">
                            <input type="submit" class="btn btn-primary rounded-pill" name = "set_new_pwd" Value = "3. Set New Password">
                    </div>
                    <div class="mt-5 text-center">
                            <a href="../"><button class="btn btn-secondary rounded-pill" type="button" >Back</button></a>
                            
                            <input type="submit" class="btn btn-secondary rounded-pill" name = "pwd_reset_step" Value = "Reset Step">
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>
</div>
