<?php
session_start();
try {
	include('connect.php');
	if(isset($_POST['signup'])){
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$user_pass = $_POST['user_pass'];
		$user_fname = $_POST['user_fname'];
		$user_lname = $_POST['user_lname'];
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
    }	
    

    

}

catch (PDOException $e) {

	echo "Error: ". $e -> getMessage();
}
?>




</style>
<div class ="box">
Don't have any account yet?
<h1>Sign Up Here</h1>
<form method="post">
<input type="text" name = "user_name" placeholder = "User Name"> </br> </br>
<input type="text" name = "user_email" placeholder = "name@domain.com"> </br> </br>
<input type="password" name = "user_pass" placeholder = "********"> </br> </br>
<input type="password" name = "cpassword" placeholder = "********"> </br> </br>
<input type="text" name = "user_fname" placeholder = "First Name"> </br> </br>
<input type="text" name = "user_lname" placeholder = "Last Name"> </br> </br>

<input type="submit" name = "signup" Value = "Register">

</form>
</div>
</div>
</div>


