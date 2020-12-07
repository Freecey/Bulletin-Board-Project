<?php
//setting_view.php
include('../includes/admin/session_userlvl.php');

$selectSETTING = $conn->prepare("SELECT*FROM sitesetting LIMIT 1");
$selectSETTING->setFetchMode(PDO::FETCH_ASSOC);
$selectSETTING->execute();
$SETTINGdata=$selectSETTING->fetch();


if($_SESSION[SettingUPDATEComplet] == true ){
    $UpdateOKClass = 'bg-success text-white';
    $UpdateOK = 'Setting Update Successfully';
    unset($_SESSION['SettingUPDATEComplet']);
}

////// TABLE sitesetting
// set_id
// set_sitename     VARCHAR(128) NOT NULL,
// set_emailenable  BOOLEAN NOT NULL DEFAULT 1,
// set_emailmgr     VARCHAR(128) NOT NULL,

// set_announce_en  (0 disable 1 enable)

// set_emailsite    VARCHAR(128) NOT NULL,
// set_stmpsrv      VARCHAR(128) NOT NULL,
// set_stmpport     INT(8) NOT NULL,
// set_stmpusr      VARCHAR(64) NOT NULL,
// set_stmppass     VARCHAR(255) NOT NULL,

// set_email_smtpauth varchar(255) NOT NULL;
// set_email_authtype varchar(255) NOT NULL;
// set_email_smtpsecure varchar(255) NOT NULL;
// set_email_smtpautotls varchar(255) NOT NULL;

try {
	if(isset($_POST['update_setting'])){
        $set_id = $SETTINGdata[set_id];
        $UPD_set_sitename = $_POST['set_sitename'];
        $UPD_set_headername = $_POST['set_headername'];
        $UPD_set_announce_en = $_POST['set_announce_en'];

        
		$UPD_set_emailenable = $_POST['set_emailenable'];
		$UPD_set_emailmgr = $_POST['set_emailmgr'];		
        $UPD_set_emailsite = $_POST['set_emailsite'];
        $UPD_set_stmpsrv = $_POST['set_stmpsrv'];
        $UPD_set_stmpport = $_POST['set_stmpport'];
        $UPD_set_stmpusr = $_POST['set_stmpusr'];
        $UPD_set_stmppass = $_POST['set_stmppass'];

        $UPD_set_email_smtpauth = $_POST['set_email_SMTPAuth'];
        $UPD_set_email_authtype = $_POST['set_email_AuthType'];
        $UPD_set_email_smtpautotls = $_POST['set_email_SMTPAutoTLS'];
        $UPD_set_email_smtpsecure = $_POST['set_email_SMTPSecure'];

        $UPDATEQuerySQL1 = "UPDATE `sitesetting` SET 
         `set_sitename` = '$UPD_set_sitename', 
         `set_headername` = '$UPD_set_headername', 
         `set_announce_en` = '$UPD_set_announce_en', 
         `set_emailenable` = '$UPD_set_emailenable',
         `set_emailmgr` = '$UPD_set_emailmgr', 
         `set_emailsite` = '$UPD_set_emailsite', 
         `set_stmpsrv` = '$UPD_set_stmpsrv', 
         `set_stmpport` = '$UPD_set_stmpport', 
         `set_stmpusr` = '$UPD_set_stmpusr', 
         `set_stmppass` = '$UPD_set_stmppass', 
         `set_email_smtpauth` = '$UPD_set_email_smtpauth',
         `set_email_authtype` = '$UPD_set_email_authtype',
         `set_email_smtpautotls` = '$UPD_set_email_smtpautotls',
         `set_email_smtpsecure` = '$UPD_set_email_smtpsecure'
         WHERE `sitesetting`.`set_id` = $set_id";

        // echo $UPDATEQuerySQL1;
        $SET_UpdateINSERT= $conn->prepare($UPDATEQuerySQL1);
        $SET_UpdateINSERT->execute();

        $_SESSION['SettingUPDATEComplet'] = true;
        header("Refresh:0");
    }
}
catch (PDOException $e) {

    $dbResErr = "Error: ". $e -> getMessage();
    if (strpos($dbResErr, 'users.user_name_unique') !== false) {
        $usernameErr = 'Error : Alias already taken';
        $nameclasserr = 'bg-danger text-white';
        // $dbResErr = '';
    }
}

?>