<head>
<link rel="stylesheet" href="../css/main.css">
</head>


<?php
include('header.php');

$pwdclasserr = '';
$nameclasserr = '';
$usernameErr = '';
$passmatchErr = '';
$creationOKClass = '';
$creationOK = '';



session_start();
try {
	include('connect.php');
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
?>


<!-- Remove BR tag when set prez  -->
<div class ="box">
	Don't have any account yet?
	<h1>Sign Up Here</h1>
	<div><?php echo $dbResErr ?></div>
	
		<form method="post">


			<div class="form-group <?php echo $nameclasserr; ?>">
				<label for="user_name">Username <?php echo $usernameErr;?></label>
				<input type="text" class="form-control" name = "user_name" placeholder = "User Name" required value="<?php echo $user_name ?>"> 
			</div>	

			<div class="form-group">
				<label for="user_email">Email address</label>
				<input type="email"  class="form-control" name = "user_email" placeholder = "name@domain.com" required value="<?php echo $user_email ?>"  id="exampleInputEmail1" aria-describedby="emailHelp" > 
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>	

			<div class="form-group">
				<label for="user_fname">First Name</label>
				<input type="text" class="form-control" name = "user_fname" placeholder = "First Name" required value="<?php echo $user_fname ?>">
			</div>	
			<div class="form-group">
				<label for="user_lname">Last Name</label>
				<input type="text" class="form-control" name = "user_lname" placeholder = "Last Name" required value="<?php echo $user_lname ?>">
			</div>	
			<div class="form-group <?php echo $pwdclasserr; ?>">
				<label for="user_pass">Password <?php echo $passmatchErr;?></label>
				<input type="password" class="form-control" name = "user_pass" placeholder = "********" required>
				<small id="" class="form-text text-muted">Must be 8-20 characters long.</small>
			</div>	
			<div class="form-group  <?php echo $pwdclasserr; ?>">
				<label for="cpassword">Confirm Password <?php echo $passmatchErr;?></label>
				<input type="password" class="form-control" name = "cpassword" placeholder = "********" required>
				<small id="" class="form-text text-muted">retype the same as before.</small>
			</div>	
			<input type="submit" class="btn btn-primary" name = "signup" Value = "Register" class="btn btn-primary">
			<!-- OLD VERSION
			<div class="form-group">
				<input type="text" class="form-control" name = "user_name" placeholder = "User Name" required value="<?php echo $user_name ?>"> * </br> 
				<input type="email"  class="form-control" name = "user_email" placeholder = "name@domain.com" required value="<?php echo $user_email ?>"> * </br> </br>
				<label for="inputPassword6">Password</label>
				<input type="password" class="form-control" name = "user_pass" placeholder = "********" required> * <?php echo $passmatchErr;?> </br> </br>
				<small id="passwordHelpInline" class="text-muted">
					Must be 8-20 characters long.
				</small>
				<input type="password" class="form-control" name = "cpassword" placeholder = "********" required> * </br> </br>
				<input type="text" class="form-control" name = "user_fname" placeholder = "First Name" required value="<?php echo $user_fname ?>"> * </br> </br>
				<input type="text" class="form-control" name = "user_lname" placeholder = "Last Name" required value="<?php echo $user_lname ?>"> * </br> </br>
				<input type="submit" class="btn btn-primary" name = "signup" Value = "Register" class="btn btn-primary">
			</div> -->
		</form>
			<div class="form-group <?php echo $creationOKClass; ?>">
				<p><?php echo $creationOK; ?></p>
			</div>	


		<div>* All fields is required</div> 
		<div><a href="../policy.html">Read privacy policy</a></div>
</div>


<?php
include('footer.php');
?>