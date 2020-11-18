<?php
include('header.php');

session_start();
try {
	include('connect.php');
	if(isset($_POST['signup'])){
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$user_fname = $_POST['user_fname'];		
		$user_lname = $_POST['user_lname'];
		$user_pass = $_POST['user_pass'];
		$cpassword = $_POST['cpassword'];
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
			$dbResErr = "Sign Up Successfully";
			unset($user_name);
			unset($user_email);
			unset($user_fname);
			unset($user_lname);
		} else {
			$passmatchErr = 'Error ! : password match NOK';
		}

    }	
    

    

}

catch (PDOException $e) {

	$dbResErr = "Error: ". $e -> getMessage();
}
?>


<!-- Remove BR tag when set prez  -->
<div class ="box">
	Don't have any account yet?
	<h1>Sign Up Here</h1>
	<div><?php echo $dbResErr ?></div>
	
		<form method="post">
			<input type="text" name = "user_name" placeholder = "User Name" required value="<?php echo $user_name ?>"> * </br> </br>
			<input type="email" name = "user_email" placeholder = "name@domain.com" required value="<?php echo $user_email ?>"> * </br> </br>
			<input type="password" name = "user_pass" placeholder = "********" required> * <?php echo $passmatchErr;?> </br> </br>
			<input type="password" name = "cpassword" placeholder = "********" required> * </br> </br>
			<input type="text" name = "user_fname" placeholder = "First Name" required value="<?php echo $user_fname ?>"> * </br> </br>
			<input type="text" name = "user_lname" placeholder = "Last Name" required value="<?php echo $user_lname ?>"> * </br> </br>
		<input type="submit" name = "signup" Value = "Register" class="btn">
		</form>
		<div>* All fields is required</div> 
		<div><a href="../policy.html">privacy policy</a></div>
</div>


<?php
include('footer.php');
?>