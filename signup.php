<head>
<link rel="stylesheet" href="./css/main.css">
</head>


<?php
include('includes/header.php');

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
		if( strlen($user_pass) <= 5) {
			$passmatchErr = ' is too short need at least 6 character : Error!';
			$pwdclasserr = 'bg-danger text-white';
		} else {
			if($user_pass == $cpassword) {
				// echo 'password match OK';
				$user_pass = hash('sha512', $user_pass);

				$user_date = date('Y-m-d H:i:s');
		
				$insert = $conn->prepare("INSERT INTO users(user_name,user_email,user_pass,user_fname,user_lname,user_date)
						values(:user_name, :user_email, :user_pass, :user_fname, :user_lname, :user_date)
						");
				$insert->bindParam (':user_name',$user_name);
				$insert->bindParam (':user_email',$user_email);
				$insert->bindParam (':user_pass',$user_pass);
				$insert->bindParam (':user_fname',$user_fname);
				$insert->bindParam (':user_lname',$user_lname);
				$insert->bindParam (':user_date',$user_date);
				$insert->execute();
				$creationOKClass = 'bg-success text-white';
				$creationOK = 'Sign Up Successfully <a href="../index.php">Click Here to go Home for login</a>';
				$signupProssComplet = true;
				unset($user_name);
				unset($user_email);
				unset($user_fname);
				unset($user_lname);
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




include('includes/footer.php');
?>