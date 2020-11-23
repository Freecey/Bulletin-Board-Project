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

			<div class="form-group  <?php echo $emailclasserr; ?>">
				<label for="user_email">Email address <?php echo $useremailErr;?></label>
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
			<div class="form-group">
				<label for="user_pass">Password <?php echo $passmatchErr;?></label>
				<input type="password" class="form-control <?php echo $pwdclasserr; ?>" name = "user_pass" placeholder = "********" required>
				<small id="" class="form-text text-muted">Must be 8-20 characters long.</small>
			</div>	
			<div class="form-group">
				<label for="cpassword">Confirm Password <?php echo $passmatchErr;?></label>
				<input type="password" class="form-control <?php echo $pwdclasserr; ?>" name = "cpassword" placeholder = "********" required>
				<small id="" class="form-text text-muted">retype the same as before.</small>
			</div>	
			<div class="form-group">
				By clicking Create my account, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.
			</div>	
			<input type="submit" class="btn btn-primary rounded-pill" name = "signup" Value = "Create my account" class="btn btn-primary">
			<a href="../"><button class="btn btn-secondary rounded-pill" type="button" >Back</button></a>
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
		<div>you must be at least 16 years old to register</div>
		<div><a href="./terms.html">TERMS OF USE</a></div>
		<div><a href="./policy.html">Read privacy policy</a></div>
</div>