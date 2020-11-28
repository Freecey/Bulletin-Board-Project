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
            $_SESSION['user_gravatar'] = $SignInDATA['user_gravatar'];
            $user_ID = $SignInDATA['user_id'];
            
            // Check if user have a gravatar if not set default picture
            $email = $_SESSION['user_email'];
            $size = '';
            include('includes/gravatars.php');
            $user_gravatar = $grav_url;
            
            // Get IP address of client
            include('includes/function/getip.php');
            $userlast_ip = getRealIpAddr();
            
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


if ($_SESSION['loginOK']  == true) {
        echo '<div class="m-2">';
        echo 'Welcome ';echo $_SESSION['user_name'];
        echo '</div>';


    // Check if user is on / or /index.php for hidden home    
    $uri = $_SERVER['REQUEST_URI'];

        if ( $uri == "/" )
    {
        // You're on the root route
    } elseif ( $uri == "/index.php" ) {
        // You're on the root route index.php
    } else {
        echo '
        <a class="text-white" href="/">
        <div class="my-2  btn btn-primary btn-block rounded-pill" >
            Home
        </div></a>';
    }
    if ( $uri == "/profile.php" )
    {
        // You're on the root route
    } else {
        echo '<a class="text-white" href="profile.php">
        <div class="my-2 btn btn-primary btn-block rounded-pill" >
            Your Profil
        </div></a>';
    }
    if($_SESSION[user_level] >= 2 ){
        echo '
        <a class="text-white" href="./admin/">
        <div class="my-2  btn btn-primary btn-block rounded-pill" >
            Admin
        </div></a>';
    }
        echo '
        <a class="text-white" href="logout.php">
        <div class="my-2  btn btn-primary btn-block rounded-pill" >
            Logout
        </div></a>';
        // echo '<pre>' . print_r($SignInDATA, TRUE) . '</pre>';
        // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
} else {
    include 'includes/signinform.php';
}
?>


</aside>