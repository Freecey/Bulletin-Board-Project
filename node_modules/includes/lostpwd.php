<?php
//profile.php
// include('includes/session.php');
include('includes/connect.php');
// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

$select = $conn->prepare("SELECT*FROM users where user_id='$user_id' LIMIT 1");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$data=$select->fetch();


if($_SESSION[ProfileUPDATEComplet] == true ){
    $UpdateOKClass = 'bg-success text-white';
    $UpdateOK = 'New Password Set Successfully';
    unset($_SESSION['ProfileUPDATEComplet']);
}


// // Popote pour la date et mis a 0 si autre selectionner
// $user_datebirthday = $data['user_datebirthday'];
// // echo $user_datebirthday;
// $dobdate  = strtotime($user_datebirthday);
// $dobday   = date('d',$dobdate);
// $dobmonth = date('m',$dobdate);
// $dobyear  = date('Y',$dobdate);

// $dobday   = (int)$dobday;
// $dobmonth = (int)$dobmonth;
// $dobyear  = (int)$dobyear;


// if($user_datebirthday == ''){
//     $dobday   = '';
//     $dobmonth = '';
//     $dobyear  = '';
// }


// echo $$UPD_PWD_Complet;
// echo "-----";
// echo $dbResErr;


// Prepare and make update of users table
try {
	if(isset($_POST['get_secquest'])){
        $nameclasserr = '';
        $user_email = $_POST['user_email'];
		$user_name = $_POST['user_name'];
        
        $user_secquest = $_POST['user_secquest'];
        $user_secansw = $_POST['user_secansw'];
        // $DOBy = $_POST['doby'];
        // $DOBm = $_POST['dobm'];
        // $DOBd = $_POST['dobd'];
        

        // $UPD_full_DATE = mktime(0, 0, 0, $UPD_DOBm, $UPD_DOBd, $UPD_DOBy);
        // $UPD_DOB = date('Y-m-d', $UPD_full_DATE);
        
		$GetQuestSELECT = $conn->prepare("SELECT user_secquest, user_secansw, user_email, user_name FROM users where user_email='$user_email' and user_name='$user_name' LIMIT 1");
		$GetQuestSELECT->setFetchMode(PDO::FETCH_ASSOC);
		$GetQuestSELECT->execute();
		$GetDATA=$GetQuestSELECT->fetch();
        
        $_SESSION['lp_user_email']= $GetDATA[user_email];
        $_SESSION['lp_user_name']= $GetDATA[user_name];
        
        if($user_email == $GetDATA[user_email] and $user_name == $GetDATA[user_name] ){

        $_SESSION['lp_user_email']= $GetDATA[user_email];
        $_SESSION['lp_user_name']= $GetDATA[user_name];
        $_SESSION['lp_LOCK_1']= 'readonly';
        $_SESSION['lp_user_secquest']= $GetDATA[user_secquest];
        $_SESSION['lp_user_sa12457']= $GetDATA[user_secansw];
        $_SESSION['lp_LOCKClassOK_1']= 'bg-success text-white';
        // echo $GetDATA;
        // echo $_SESSION['user_secansw'];
        // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
        }
    }
    elseif(isset($_POST['check_secans'])){
        $nameclasserr = '';
        $user_email = $_POST['user_email'];
		$user_name = $_POST['user_name'];
        $user_secquest = $_POST['user_secquest'];
        $user_secansw = $_POST['user_secansw'];
        // $DOBy = $_POST['doby'];
        // $DOBm = $_POST['dobm'];
        // $DOBd = $_POST['dobd'];
        

        // $UPD_full_DATE = mktime(0, 0, 0, $UPD_DOBm, $UPD_DOBd, $UPD_DOBy);
        // $UPD_DOB = date('Y-m-d', $UPD_full_DATE);
        
		$CheckAnsSELECT = $conn->prepare("SELECT user_id,user_secquest, user_secansw  FROM users where user_secquest='$user_secquest' and user_secansw='$user_secansw' LIMIT 1");
		$CheckAnsSELECT->setFetchMode(PDO::FETCH_ASSOC);
		$CheckAnsSELECT->execute();
        $GetDATA=$CheckAnsSELECT->fetch();

        if( $user_secquest == $GetDATA[user_secquest] and $user_secansw == $GetDATA[user_secansw] ) {
        // echo '<pre>' . print_r($GetDATA, TRUE) . '</pre>';
        // echo '<pre>' . print_r($GetIDDATA, TRUE) . '</pre>';
        $_SESSION['lp_user_id']= $GetDATA['user_id'];
        $_SESSION['lp_user_secansw']= $GetDATA[user_secansw];
        $_SESSION['lp_LOCK_2']= 'readonly';
        $_SESSION['lp_LOCKClassOK_2']= 'bg-success text-white';
        echo $GetIDDATA;
        // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
        }


        
    }

	elseif(isset($_POST['set_new_pwd'])){
        $nameclasserr = '';
        $user_email = $_POST['user_email'];
		$user_name = $_POST['user_name'];
        
        $user_secquest = $_POST['user_secquest'];
        $user_secansw = $_POST['user_secansw'];
		$UPD_pwd_new = $_POST['pwd_new'];
        $UPD_pwd_newconfirm = $_POST['pwd_newconfirm'];	
        
        $user_id = $_SESSION[lp_user_id];
         	
		if( strlen($UPD_pwd_new) <= 5) {
			$passmatchErr = ' is too short need at least 6 character : Error!';
            $pwdclasserrmm = 'bg-danger text-white';
            // echo  $passmatchErr;
        } else {
			if($UPD_pwd_new == $UPD_pwd_newconfirm) {
                $UPD_pwd_new_hast = hash('sha512', $UPD_pwd_new);

                    $UPDATEQueryPWD = "UPDATE `users` SET `user_pass` = '$UPD_pwd_new_hast'  WHERE `users`.`user_id` = $user_id";
                    // echo $UPDATEQueryPWD;
                    $UpdatePwdINSERT= $conn->prepare($UPDATEQueryPWD);
                    $UpdatePwdINSERT->execute();

                    $UpdPWDOKClass = 'bg-success text-white';
                    $UpdPWDOK = 'Password changed Successfully';
                    $_SESSION['lp_LOCK_3']= 'readonly';
                    $_SESSION['lp_LOCKClassOK_3']= 'bg-success text-white';
                    $UPD_PWD_Complet = true;
                    // echo $UpdPWDOK ;

            } else {
				$passmatchErr = ' match NOK : Error!';
                $pwdclasserrmm = 'bg-danger text-white';
                // echo $passmatchErr;
            }
        }
    }elseif(isset($_POST['pwd_reset_step'])){
        
        session_destroy();
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/lostpwd.php';
        header('Location: ' . $home_url);
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
<?php 
include('includes/lostpwdform.php');


?>