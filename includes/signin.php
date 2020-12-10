<?php
//signin.php
session_start();
// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
$url=$_SERVER['HTTP_REFERER'];
try {
	// include('connect.php');
	if(isset($_POST['signin_main'])){
		$user_email = $_POST['user_email'];
        $user_pass = $_POST['user_pass'];
        $user_pass = hash('sha512', $user_pass);
        $Login_date = date('Y-m-d H:i:s');
        // echo $Login_date;

		$SignInSELECT = $conn->prepare("SELECT*FROM users where user_email='$user_email' and user_pass='$user_pass' LIMIT 1");
		$SignInSELECT->setFetchMode(PDO::FETCH_ASSOC);
		$SignInSELECT->execute();
		$SignInDATA=$SignInSELECT->fetch();
		if($SignInDATA['user_email']!=$user_email and $SignInDATA['user_pass']!=$user_pass)
		{
            // $loginOK = false;
            include 'includes/function/loginfail.php';
            echo '<div class="bg-danger text-white text-center"> Invalid username or Password</div>';
		}elseif($SignInDATA['user_active'] == 2)
		{
            // $loginOK = false;
            echo '<div class="bg-danger text-white text-center"> Your Account has BANNED</div>';
		}
		elseif($SignInDATA['user_email']==$user_email and $SignInDATA['user_pass']==$user_pass)
		{

            $loginOK = true;
            $loginOK = true;
			$_SESSION['user_email'] = $user_email;
            $_SESSION['loginOK'] = $loginOK;
            $_SESSION['user_level'] = $SignInDATA['user_level'];
            $_SESSION['user_name'] = $SignInDATA['user_name'];
            $_SESSION['user_id'] = $SignInDATA['user_id'];
            $_SESSION['user_image'] = $SignInDATA['user_image'];
            $_SESSION['user_imgdata'] = $SignInDATA['user_imgdata'];
            $user_ID = $SignInDATA['user_id'];
            
            // Check if user have a gravatar if not set default picture
            $email = $_SESSION['user_email'];
            $size = '';
            include('includes/gravatars.php');
            $user_gravatar = $grav_url;
            
            // Get IP address of client
            include('includes/function/getip.php');
            $userlast_ip = getRealIpAddr();
            include 'includes/function/loginoklog.php';
            // Store IP and update gravatar
            $UPDATEQuerySQL2 = "UPDATE `users` SET `user_datelastlog` = '$Login_date',`user_gravatar` = '$user_gravatar',`user_last_ip` = '$userlast_ip'   WHERE `users`.`user_id` = $user_ID";
            $SignInINSERT= $conn->prepare($UPDATEQuerySQL2);
            $SignInINSERT->execute();
            header("location:$url,");

			// header("location:profile.php");
		}
	}
}
catch (PDOException $Exception) {

    echo "Error: ". $Exception -> getMessage();

}

?>


