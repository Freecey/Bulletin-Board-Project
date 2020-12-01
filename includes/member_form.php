<?php
//member_form.php

?>
<div class="container rounded bg-white mt-5 mb-5 col-xl-10 col-md-9">
    <div class="row">
        <div class="col-xl-3 col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="<?php echo $data_Sel_USR[user_image]; ?>" width="90"><span class="font-weight-bold"><?php echo $data_Sel_USR['user_name'] ?></span><span class="text-black-50"><?php echo $user_lvl_text[$data_Sel_USR['user_level']]; ?></span><span> </span></div>

        </div>
        <div class="col-xl-9 col-md-9 border-right">
            <div class="p-3 py-5">
                <form method="post">
                    <div class="text-center <?php echo $user_id_nok_class; ?>">
                        <?php echo $user_id_nok; ?>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile </h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Alias (Display Name) <?php echo $usernameErr; ?></label><input type="text" class="form-control  <?php echo $nameclasserr; ?>" name="user_name" value="<?php echo $data_Sel_USR['user_name'] ?>" readonly></div>
                    </div>
                    <div class="row mt-3">
                        <label class="col-md-12" for="inlineFormCustomSelectPref">Date of Birthday</label>
                        <select class="custom-select col-md-2 ml-2 form-control" name="dobd" readonly>
                            <?php
for ($i = 1; $i <= 31; $i++) {
    if ($i == $dobday) {
        echo "<option value='$i' selected>" . $i . "</option>";
    }
}
?>
                        </select>
                        <select class="custom-select col-md-2 ml-2 form-control" name="dobm" readonly>
                            <?php
for ($i = 1; $i <= 12; $i++) {
    if ($i == $dobmonth) {
        echo "<option value='$i' selected>" . $i . "</option>";
    }
}
?>
                        </select>
                        <select class="custom-select col-md-2 ml-2 form-control" name="doby" readonly>
                            <?php
$actual_year = date("Y");
for ($i = ($actual_year - 100); $i <= ($actual_year - 15); $i++) {
    if ($i == $dobyear) {
        echo "<option value='$i' selected>" . $i . "</option>";
    }
}
?>
                        </select>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label for="user_sign">Signature</label><textarea class="form-control" id="user_sign" name="user_sign" rows="3" readonly><?php echo $data_Sel_USR['user_sign']; ?></textarea>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md-4"><label class="labels">User ID</label><input type="text" class="form-control" value="<?php echo $data_Sel_USR['user_id']; ?>" readonly></div>
                        <div class="col-md-4">
                            <label class="labels">Registry Date</label>
                            <input type="text" class="form-control" value="<?php echo $data_Sel_USR['user_date'] ?>" readonly>
                        </div>
                        <div class="col-md-4"><label class="labels">Last Login Date</label><input type="text" class="form-control" value="<?php echo $data_Sel_USR['user_datelastlog']; ?>" readonly></div>
                    </div>
                    <div class="row mt-3">


                        <div class="col-md-4"><label class="labels">Active account</label>
                            <select class="custom-select form-control" name="user_active" readonly>
                                                  <?php
for ($i = 0; $i <= 1; $i++) {
    if ($i == $data_Sel_USR['user_active']) {
        echo "<option value='$i' selected>" . $i . "</option>";
    }
}
?>
                            </select>
                        </div>

                        <div class="col-md-4"><label class="labels">User Level</label>
                            <select class="custom-select form-control" name="user_level" readonly>
                                                  <?php
for ($ilvl = 0; $ilvl <= 4; $ilvl++) {
    if ($ilvl == $data_Sel_USR['user_level']) {
        echo "<option value='$user_lvl_text[$ilvl]' selected>" . $user_lvl_text[$ilvl] . "</option>";
    }
}
if (666 == $data_Sel_USR['user_level']) {
    echo "<option value='$user_lvl_text[666]' selected>" . $user_lvl_text[666] . "</option>";
}
?>
                            </select>
                        </div>
                    </div>

                    <div class="mt-5 text-center">

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

