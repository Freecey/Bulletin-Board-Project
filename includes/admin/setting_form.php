<?php 
//profileform.php
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
                    <div class="text-center <?php echo $pwdclasserrmm . ' ' . $UpdPWDOKClass . ' ' . $cpwdclasserrmm; ?>">
                        <?php echo $cpwdmatchErr; ?>    
                        <?php echo $passmatchErr; ?>
                        <?php echo $UpdPWDOK; ?>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Site Settings: </h4> 
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md-6"><label class="labels">Site Name TOP BAR:</label><input type="text" class="form-control" name="set_sitename"  value="<?php echo $SETTINGdata['set_sitename']; ?>"></div>
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md-6"><label class="labels">Site Name Page Header:</label><input type="text" class="form-control" name="set_headername"  value="<?php echo $SETTINGdata['set_headername']; ?>"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Email of Site manager:</label><input type="email" class="form-control" name="set_emailmgr" value="<?php echo $SETTINGdata['set_emailmgr'] ?>"></div>
                    </div>

                    <div class="row mt-2">

                        <div class="col-md-12"><label class="labels">Annoucements</label></div>

                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="set_announce_en" value="1" <?php if($SETTINGdata['set_announce_en'] == 1){echo 'checked';} ?>>
                        <label class="form-check-label" for="set_announce_en">
                        Enable
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="set_announce_en" value="0" <?php if($SETTINGdata['set_announce_en'] == 0){echo 'checked';} ?>>
                        <label class="form-check-label" for="set_announce_en">
                        Disable
                        </label>
                        </div>
                    </div>


                    <div class="text-center my-3">
                        <input type="submit" class="btn btn-primary rounded-pill" name = "update_setting" Value = "Save Change">
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <h4 class="text-right">Mail Settings: </h4> 
                    </div>



                    <div class="mt-2" id="mailset">
                        <label class="labels">Email of Site:</label>
                        <div class="form-check ml-4">
                        <input class="form-check-input" type="radio" name="set_emailenable" value="1" checked>
                        <label class="form-check-label" for="set_emailenable">
                            Enable 
                        </label>
                        </div>
                        <div class="form-check ml-4 disabled">
                        <input class="form-check-input" type="radio" name="set_emailenable" value="0" disabled>
                        <label class="form-check-label" for="set_emailenable">
                            Disable (soon)
                        </label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Email of Site (for form send to email)<?php echo $usernameErr; ?></label><input type="text" class="form-control  <?php echo $nameclasserr; ?>" name="set_emailsite" value="<?php echo $SETTINGdata['set_emailsite'] ?>"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">SMTP Server:</label><input type="text" class="form-control" name="set_stmpsrv" value="<?php echo $SETTINGdata['set_stmpsrv'] ?>"></div>
                        <div class="col-md-2"><label class="labels">SMTP Port:</label><input type="text" class="form-control" name="set_stmpport" value="<?php echo $SETTINGdata['set_stmpport'] ?>"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">USERNAME (Email of Site) </label><input type="text" class="form-control" name="set_stmpusr" value="<?php echo $SETTINGdata['set_stmpusr'] ?>"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">PASSWORD (Email of Site) </label><input type="password" class="form-control" name="set_stmppass" value="<?php echo $SETTINGdata['set_stmppass'] ?>"></div>
                    </div>
                    <div class="row mt-2">

                        <div class="col-md-12"><label class="labels">SMTP Auth</label></div>

                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="set_email_SMTPAuth" value="false" <?php if($SETTINGdata['set_email_smtpauth'] == false){echo 'checked';} ?>>
                        <label class="form-check-label" for="set_email_SMTPAuth">
                            Disable
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="set_email_SMTPAuth" value="true" <?php if($SETTINGdata['set_email_smtpauth'] == true){echo 'checked';} ?>>
                        <label class="form-check-label" for="set_email_SMTPAuth">
                            Enable
                        </label>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">AuthType</label></div>

                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="set_email_AuthType" value="LOGIN" <?php if($SETTINGdata['set_email_authtype'] == 'LOGIN'){echo 'checked';} ?>>
                        <label class="form-check-label" for="set_email_AuthType">
                            LOGIN
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="set_email_AuthType" value="PLAIN" <?php if($SETTINGdata['set_email_authtype'] == 'PLAIN'){echo 'checked';} ?>>
                        <label class="form-check-label" for="set_email_AuthType">
                            PLAIN
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="set_email_AuthType" value="CRAM-MD5" <?php if($SETTINGdata['set_email_authtype'] == 'CRAM-MD5'){echo 'checked';} ?>>
                        <label class="form-check-label" for="set_email_AuthType">
                            CRAM-MD5
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="set_email_AuthType" value="XOAUTH2" <?php if($SETTINGdata['set_email_authtype'] == 'XOAUTH2'){echo 'checked';} ?>>
                        <label class="form-check-label" for="set_email_AuthType">
                            XOAUTH2
                        </label>
                        </div>
                    </div>

                    <div class="row mt-2">

                        <div class="col-md-12"><label class="labels">SMTP Auto TLS</label></div>

                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="set_email_SMTPAutoTLS" value="true" <?php if($SETTINGdata['set_email_smtpautotls'] == true){echo 'checked';} ?>>
                        <label class="form-check-label" for="set_email_SMTPAutoTLS">
                        Enable
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="set_email_SMTPAutoTLS" value="false" <?php if($SETTINGdata['set_email_smtpautotls'] == false){echo 'checked';} ?>>
                        <label class="form-check-label" for="set_email_SMTPAutoTLS">
                        Disable
                        </label>
                        </div>
                    </div>


                    <div class="row mt-2">

                        <div class="col-md-12"><label class="labels">SMTP Secure</label></div>

                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="set_email_SMTPSecure" value="tls" <?php if($SETTINGdata['set_email_smtpsecure'] == 'tls'){echo 'checked';} ?>>
                        <label class="form-check-label" for="set_email_SMTPSecure">
                            TLS
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="set_email_SMTPSecure" value="ssl" <?php if($SETTINGdata['set_email_smtpsecure'] == 'ssl'){echo 'checked';} ?>>
                        <label class="form-check-label" for="set_email_SMTPSecure">
                            SSL
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="set_email_SMTPSecure" value="" <?php if($SETTINGdata['set_email_smtpsecure'] == ''){echo 'checked';} ?>>
                        <label class="form-check-label" for="set_email_SMTPSecure">
                            None
                        </label>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <a class="text-white" href="testmail.php">
                        <div class="my-2  btn btn-primary btn-block rounded-pill" >
                            Test Mail Setting (save before)
                        </div></a>
                    </div>


                    <div class="mt-5 text-center">
                        <input type="submit" class="btn btn-primary rounded-pill" name = "update_setting" Value = "Save Change">
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

