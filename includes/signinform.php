
<form method="post">


    <div class="form-group <?php echo $nameclasserr; ?>">
	    <!-- <label for="user_name">Username </label> -->
		<input type="text" class="form-control" name = "user_name" placeholder = "User Name" required> 
	</div>	

    <div class="form-group <?php echo $pwdclasserr; ?>">
        <!-- <label for="user_pass">Password </label>  -->
        <input type="password" class="form-control" name = "user_pass" placeholder = "********" required>
    </div>	
    <div class="col text-center">
        <input type="submit" class="btn btn-primary" name = "signin" Value = "Login">
    </div>
</form>
