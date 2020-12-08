<?php
// ban_view.php
// use $_POST[BAN_User_ID]; for select user
// use $_POST[act_to_user] (set value BAN or UNBAN) for select user
// Set user_active = 2 (for ban)

$On_User_ID = $_POST['BAN_User_ID'];
$Act_to_Do = $_POST['act_to_user'];


if($_SESSION['BanUPDATEComplet'] == true ){
    $UpdateOKClass = 'bg-success text-white';
    $UpdateOK = $_SESSION['ban_unban_act'].' on user ID '. $_SESSION['ban_unban_on_id'] .' : Update Successfully';
    unset($_SESSION['BanUPDATEComplet']);
    unset($_SESSION['ban_unban_on_id']);
}


try {
	if(isset($_POST['act_to_user'])){
        $nameclasserr = '';
        $UPD_user_id = $On_User_ID; 
        $UPD_user_ban_by = $_SESSION['user_id'];
        // echo '<pre>' . print_r($_POST, TRUE) . '</pre>';

        if( $Act_to_Do == 'BAN'){
            $UPD_user_active = 2; 

        }elseif( $Act_to_Do == 'UNBAN'){
                $UPD_user_active = 1; 
        }

        $UPDATEQuerySQL1 = "UPDATE `users` SET 
        `user_active` = '$UPD_user_active',
        `user_ban_by` = '$UPD_user_ban_by' 
        WHERE `users`.`user_id` = $UPD_user_id";
        // echo $UPDATEQuerySQL1;
        $Prof_UpdateINSERT= $conn->prepare($UPDATEQuerySQL1);
        $Prof_UpdateINSERT->execute();

        $_SESSION['BanUPDATEComplet'] = true;
        $_SESSION['ban_unban_act'] = $Act_to_Do;
        $_SESSION['ban_unban_on_id'] = $UPD_user_id;
        header("Refresh:0");
    }

}


catch (PDOException $e) {

	$dbResErr = "Error: ". $e -> getMessage();
    echo $dbResErr;
}


?>