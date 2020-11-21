
<div class="mx-2 mt-2" id="login">Login or</div>
<div class="mx-2 mb-2">
    <a href="includes/signup.php"> click here to Register</a>
</div>

<form class="m-2" method="post">


    <div class="form-group <?php echo $nameclasserr; ?>">
	    <!-- <label for="user_email">email </label> -->
		<input type="email" class="form-control" name = "user_email" placeholder = "email" required> 
	</div>	

    <div class="form-group <?php echo $pwdclasserr; ?>">
        <!-- <label for="user_pass">Password </label>  -->
        <input type="password" class="form-control" name = "user_pass" placeholder = "********" required>
    </div>	
    <div class="col text-center">
        <input type="submit" class="btn btn-primary btn-block rounded-pill" name = "signin" Value = "Login">
    </div>
</form>
<div class="m-2" data-toggle="tooltip" data-placement="top" title="Soon">
    <span>I forgot my password </span>
</div>
