<?php
//signin.php
session_start();
// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
try {
	include('connect.php');
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
            echo "Invalid username or Password";
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
            $_SESSION['user_gravatar'] = $SignInDATA['user_gravatar'];
            $user_ID = $SignInDATA['user_id'];
            
            $email = $_SESSION['user_email'];
            $size = '';
            include('includes/gravatars.php');
            $user_gravatar = $grav_url;

            $UPDATEQuerySQL2 = "UPDATE `users` SET `user_datelastlog` = '$Login_date',`user_gravatar` = '$user_gravatar'  WHERE `users`.`user_id` = $user_ID";
            $SignInINSERT= $conn->prepare($UPDATEQuerySQL2);
            $SignInINSERT->execute();

			// header("location:profile.php");
		}
	}
}
catch (PDOException $Exception) {

    echo "Error: ". $Exception -> getMessage();

}


if ($_SESSION['loginOK']  == true) {
    echo '<div class="m-2">';
    echo 'Welcome ';echo $_SESSION['user_name'];
    echo '</div>';
    echo '<a class="text-white" href="profile.php">
    <div class="my-2 btn btn-primary btn-block rounded-pill" >
        Your Profil
    </div></a>';



    echo '
    <a class="text-white" href="logout.php">
    <div class="my-2 btn btn-primary btn-block rounded-pill" >
        Logout
    </div></a>';
    // echo '<pre>' . print_r($SignInDATA, TRUE) . '</pre>';
    // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
} else {
    include('includes/signinform.php');
}
?>


</aside>