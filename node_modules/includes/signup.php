<?php


$pwdclasserr = '';
$nameclasserr = '';
$usernameErr = '';
$passmatchErr = '';
$creationOKClass = '';
$creationOK = '';
$signupProssComplet = false;


session_start();
try {
	include('includes/connect.php');
	if(isset($_POST['signup'])){
		$pwdclasserr = '';
		$nameclasserr = '';
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$user_fname = $_POST['user_fname'];		
		$user_lname = $_POST['user_lname'];
		$user_pass = $_POST['user_pass'];
		$cpassword = $_POST['cpassword'];
		$email = $user_email;
		include('includes/gravatars.php');
		$user_gravatar = $grav_url;
		$user_secquest = "Your favorite word ?";
		include('includes/randomword.php');
		$user_secansw = $rand_word_ans;
		if( strlen($user_pass) <= 5) {
			$passmatchErr = ' is too short need at least 6 character : Error!';
			$pwdclasserr = 'bg-danger text-white';
		} else {
			if($user_pass == $cpassword) {
				// echo 'password match OK';
				$user_pass = hash('sha512', $user_pass);

				$user_date = date('Y-m-d H:i:s');
		
				$SignUPinsert = $conn->prepare("INSERT INTO users(user_name,user_email,user_pass,user_fname,user_lname,user_date,user_secquest,user_secansw,user_gravatar)
						values(:user_name, :user_email, :user_pass, :user_fname, :user_lname, :user_date, :user_secquest, :user_secansw, :user_gravatar)
						");
				$SignUPinsert->bindParam (':user_name',$user_name);
				$SignUPinsert->bindParam (':user_email',$user_email);
				$SignUPinsert->bindParam (':user_pass',$user_pass);
				$SignUPinsert->bindParam (':user_fname',$user_fname);
				$SignUPinsert->bindParam (':user_lname',$user_lname);
				$SignUPinsert->bindParam (':user_date',$user_date);
				$SignUPinsert->bindParam (':user_secquest',$user_secquest);
				$SignUPinsert->bindParam (':user_secansw',$user_secansw);
				$SignUPinsert->bindParam (':user_gravatar',$user_gravatar);
				$SignUPinsert->execute();
				$creationOKClass = 'bg-success text-white';
				$creationOK = 'Sign Up Successfully <a href="../index.php">Click Here to go Home for login</a>';
				$signupProssComplet = true;
			} else {
				$passmatchErr = ' match NOK : Error!';
				$pwdclasserr = 'bg-danger text-white';
			}
			}

    }	
    

    

}

catch (PDOException $e) {

	$dbResErr = "Error: ". $e -> getMessage();
	if (strpos($dbResErr, 'users.user_name_unique') !== false) {
		$usernameErr = ' already taken';
		$nameclasserr = 'bg-danger text-white';
		$dbResErr = '';
	} elseif (strpos($dbResErr, 'users.user_email_unique') !== false) {
		$useremailErr = ' This email have already a account <a href=./login.php><div class="my-2 btn btn-primary btn-block rounded-pill" >click Here to Login</div></a>';
		$emailclasserr = 'bg-danger text-white';
		$dbResErr = '';
	} 
}


if ($signupProssComplet == true) {
	echo '
	<div class="form-group '; echo $creationOKClass; echo '">
	<p>'; echo $creationOK ; echo ' </p>

	</div>

<div>you must be at least 16 years old to register</div>
<div><a href="../policy.html">Read privacy policy</a></div>
';
} else {
	include('includes/signupform.php');	
}





?>