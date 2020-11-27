<?php
//profile.php
include('includes/session.php');
include('includes/connect.php');
// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
// $user_id = $_SESSION[user_id];

$select_usr = $conn->prepare("SELECT*FROM users where user_id=$_SESSION[user_id] LIMIT 1");
$select_usr->setFetchMode(PDO::FETCH_ASSOC);
$select_usr->execute();
$data_Sel_USR=$select_usr->fetch();

// echo '<pre>' . print_r($data_Sel_USR, TRUE) . '</pre>';

$email = $_SESSION[user_email];
$size = '90';
include('includes/gravatars.php');
$user_gravatar = $grav_url;

if($_SESSION[ProfileUPDATEComplet] == true ){
    $UpdateOKClass = 'bg-success text-white';
    $UpdateOK = 'Profile Update Successfully';
    unset($_SESSION['ProfileUPDATEComplet']);
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
} 


// echo $$UPD_PWD_Complet;
// echo "-----";
// echo $dbResErr;


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
        

        $UPD_full_DATE = mktime(0, 0, 0, $UPD_DOBm, $UPD_DOBd, $UPD_DOBy);
        $UPD_DOB = date('Y-m-d', $UPD_full_DATE);
          
        // echo $UPD_DOB;
        // echo "--###############--";
        
         	
        // echo '123---';
        // echo '<pre>' . print_r($_POST, TRUE) . '</pre>';
        // echo "---456";

        $UPDATEQuerySQL1 = "UPDATE `users` SET `user_name` = '$UPD_user_name', `user_fname` = '$UPD_user_fname', `user_lname` = '$UPD_user_lname', `user_sign` = '$UPD_user_sign', `user_datebirthday` = '$UPD_DOB', `user_secquest` = '$UPD_user_secquest', `user_secansw` = '$UPD_user_secansw', `user_gravatar` = '$user_gravatar'  WHERE `users`.`user_id` = $_SESSION[user_id]";
        // echo $UPDATEQuerySQL1;
        $Prof_UpdateINSERT= $conn->prepare($UPDATEQuerySQL1);
        $Prof_UpdateINSERT->execute();

        $_SESSION['user_name'] = $UPD_user_name;
        $_SESSION['ProfileUPDATEComplet'] = true;
        header("Refresh:0");
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





?>
<head>
<link rel="stylesheet" href="./css/main.css">
</head>