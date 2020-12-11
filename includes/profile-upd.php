<?php
//profile.php
if($_SESSION['DELETE_ACC'] == 1){
    echo $_SESSION['MSG_SEND_OK'];
    $_SESSION['DELETE_ACC2'] = $_SESSION['DELETE_ACC'];
    unset($_SESSION['DELETE_ACC']);
    echo'
    <div>
    <!-- <img src="/assets/other/message-sent-icon-23.webp" class="rounded mx-auto d-block" alt="Message sent OK"> -->
    <p class="text-center bg-success text-light">Account Close Successfully Log out NOW ..</p>
    </div>
    <meta http-equiv="refresh" content="1">';
    exit();
    unset($_SESSION['MSG_SEND_OK2']);
    unset($_SESSION);

    session_destroy();
    include($_SERVER['DOCUMENT_ROOT'].'/logout.php');
}

include($_SERVER['DOCUMENT_ROOT'].'/includes/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
$ACT_user_id = $_SESSION['user_id'];

$select_usr = $conn->prepare("SELECT*FROM users where user_id=$ACT_user_id LIMIT 1");
$select_usr->setFetchMode(PDO::FETCH_ASSOC);
$select_usr->execute();
$data_Sel_USR=$select_usr->fetch();

// echo '<pre>' . print_r($data_Sel_USR, TRUE) . '</pre>';

$email = $_SESSION['user_email'];
$size = '90';
include('includes/gravatars.php');
$user_gravatar = $grav_url;

$user_imgDATA_C = $data_Sel_USR['user_imgdata'];
$user_image_C = $data_Sel_USR['user_image'];

if($_SESSION['ProfileUPDATEComplet'] == true ){
    $UpdateOKClass = 'bg-success text-white';
    $UpdateOK = 'Profile Update Successfully';
    unset($_SESSION['ProfileUPDATEComplet']);
}

if($_SESSION['uploadProfOK'] == 'ULPictOK'){
    $UpdateOKClass = 'bg-success text-white';
    // $UpdateOK = 'image Upload Successfully';
    unset($_SESSION['uploadProfOK']);
}

// Popote pour la date et mis a 0 si autre selectionner
$user_datebirthday = $data_Sel_USR['user_datebirthday'];
// echo $user_datebirthday;
$dobdate  = strtotime($user_datebirthday);
$dobday   = date('d',$dobdate);
$dobmonth = date('m',$dobdate);
$dobyear  = date('Y',$dobdate);

$dobday   = (int)$dobday;
$dobmonth = (int)$dobmonth;
$dobyear  = (int)$dobyear;


if($user_datebirthday == ''){
    $dobday   = '';
    $dobmonth = '';
    $dobyear  = '';
}


// Set Text to User LVL
if( $data_Sel_USR['user_level'] == 1 ) {
    $user_lvl_text = "User";
} elseif ( $data_Sel_USR['user_level'] == 2 ) {
    $user_lvl_text = "Moderator";
} elseif ( $data_Sel_USR['user_level'] == 3 ) {
    $user_lvl_text = "Admin";
} elseif ( $data_Sel_USR['user_level'] == 4 ) {
    $user_lvl_text = "God";
} elseif ( $data_Sel_USR['user_level'] == 666 ) {
    $user_lvl_text = "Devil";
} 


// echo $$UPD_PWD_Complet;
// echo "-----";
// echo $dbResErr;

// if (count($_FILES) > 0) {
//     if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
//         $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
//         $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
        


//         $UploadIMGQ = "INSERT INTO output_images(user_imgtype ,user_image)
//         VALUES('{$imageProperties['mime']}', '{$imgData}') WHERE `users`.`user_id` = $user_id";
//         // echo $UPDATEQueryPWD;
//         $UpdateImgINSERT= $conn->prepare($UploadIMGQ);
//         $UpdateImgINSERT->execute();


//     //     $conn = "INSERT INTO output_images(user_imgtype ,user_image)
// 	// VALUES('{$imageProperties['mime']}', '{$imgData}') WHERE `users`.`user_id` = $user_id";
//     //     $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
//     //     if (isset($current_id)) {
//     //         //header("Refresh:0");
//     //         echo "HOLALA 13212345 .............";
//     //     }
//     }
// }



// Prepare and make update of users table
try {
	if(isset($_POST['update_profil'])){
		$nameclasserr = '';
		$UPD_user_name = $_POST['user_name'];
		$UPD_user_fname = $_POST['user_fname'];
		$UPD_user_lname = $_POST['user_lname'];		
        $UPD_user_sign = $_POST['user_sign'];
        $UPD_user_secquest = $_POST['user_secquest'];
        $UPD_user_secansw = $_POST['user_secansw'];
        $UPD_DOBy = $_POST['doby'];
        $UPD_DOBm = $_POST['dobm'];
        $UPD_DOBd = $_POST['dobd'];
        $UPD_user_theme= $_POST['user_theme'];

        if($_POST['user_imagefrom'] == 2 ){
            $user_image = $data_Sel_USR['user_imglocal'];
        }else{
            $user_image = $user_gravatar;
        }
        

        $UPD_full_DATE = mktime(0, 0, 0, $UPD_DOBm, $UPD_DOBd, $UPD_DOBy);
        $UPD_DOB = date('Y-m-d', $UPD_full_DATE);
          
        // echo $UPD_DOB;
        // echo "--###############--";
        
         	
        // echo '123---';
        // echo '<pre>' . print_r($_POST, TRUE) . '</pre>';
        // echo "---456";

        $UPDATEQuerySQL1 = "UPDATE `users` 
            SET `user_name` = '$UPD_user_name',
             `user_fname` = '$UPD_user_fname',
              `user_lname` = '$UPD_user_lname',
               `user_sign` = '$UPD_user_sign',
                `user_datebirthday` = '$UPD_DOB',
                 `user_secquest` = '$UPD_user_secquest',
                  `user_secansw` = '$UPD_user_secansw',
                   `user_image` = '$user_image',
                   `user_gravatar` = '$user_gravatar',
                    `user_theme` = '$UPD_user_theme'
                     WHERE `users`.`user_id` = $ACT_user_id";
        // echo $UPDATEQuerySQL1;
        $Prof_UpdateINSERT= $conn->prepare($UPDATEQuerySQL1);
        $Prof_UpdateINSERT->execute();


        $blob = file_get_contents($user_image);
        
        $sql = "UPDATE users SET user_imgdata = :user_imgdata
                        WHERE user_id = $ACT_user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_imgdata', $blob, PDO::PARAM_LOB);
        
        $stmt->execute();

        $_SESSION['user_name'] = $UPD_user_name;
        $_SESSION['user_image'] = $user_image;
        $_SESSION['ProfileUPDATEComplet'] = true;
        echo "<meta http-equiv='refresh' content='0'>";
        header("Location: profile.php");
    }

	elseif(isset($_POST['update_pwd'])){
		$nameclasserr = '';
		$UPD_pwd_current = $_POST['pwd_current'];
		$UPD_pwd_new = $_POST['pwd_new'];
		$UPD_pwd_newconfirm = $_POST['pwd_newconfirm'];	
         	
		if( strlen($UPD_pwd_new) <= 5) {
			$passmatchErr = ' is too short need at least 6 character : Error!';
            $pwdclasserrmm = 'bg-danger text-white';
        } else {
			if($UPD_pwd_new == $UPD_pwd_newconfirm) {
                $UPD_pwd_new_hast = hash('sha512', $UPD_pwd_new);
                $UPD_pwd_current_hast = hash('sha512', $UPD_pwd_current);
                $current_user_pass_DB = $data_Sel_USR['user_pass'];
                if($UPD_pwd_current_hast == $current_user_pass_DB) {

                    $UPDATEQueryPWD = "UPDATE `users` SET `user_pass` = '$UPD_pwd_new_hast'  WHERE `users`.`user_id` = $user_id";
                    // echo $UPDATEQueryPWD;
                    $UpdatePwdINSERT= $conn->prepare($UPDATEQueryPWD);
                    $UpdatePwdINSERT->execute();

                    $UpdPWDOKClass = 'bg-success text-white';
                    $UpdPWDOK = 'Password changed Successfully';
                    $UPD_PWD_Complet = true;
                } else {
                    $cpwdmatchErr = ' Current password : Error!';
                    $cpwdclasserrmm = 'bg-danger text-white';                    
                }

            } else {
				$passmatchErr = ' match NOK : Error!';
				$pwdclasserrmm = 'bg-danger text-white';
            }
        }
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

include($_SERVER['DOCUMENT_ROOT'].'/includes/account_remove.php');
// elseif(isset($_POST['uploadpic'])){
    //     echo '<img src="'. $_FILES .'" alt="" />';
    //     echo '<pre>' . print_r($_FILES, TRUE) . '</pre>';
    //     echo '<pre>' . print_r($_POST, TRUE) . '</pre>';
    //     }


?>