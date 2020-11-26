<!-- Remove BR tag when set prez  -->

<div id="signup" class="container col-11 mt-2">
    
	<div class ="container-fluid bg-light rounded-lg p-4">
		<div class="font-italic"> Don't have any account yet? </div>
		<h2>Sign Up Here</h2>
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

			<div class="row border-bottom mb-4">
				<div class="form-group col-6">
					<label for="user_fname">First Name</label>
					<input type="text" class="form-control" name = "user_fname" placeholder = "First Name" required value="<?php echo $user_fname ?>">
				</div>	

				<div class="form-group col-6">
					<label for="user_lname">Last Name</label>
					<input type="text" class="form-control" name = "user_lname" placeholder = "Last Name" required value="<?php echo $user_lname ?>">
				</div>
			</div>
				
			<div class="row border-bottom mt-4">
				<div class="form-group col-6">
					<label for="user_pass">Password <?php echo $passmatchErr;?></label>
					<input type="password" class="form-control <?php echo $pwdclasserr; ?>" name = "user_pass" placeholder = "********" required>
					<small id="" class="form-text text-muted">Must be 8-20 characters long.</small>
				</div>	

				<div class="form-group col-6">
					<label for="cpassword">Confirm Password <?php echo $passmatchErr;?></label>
					<input type="password" class="form-control <?php echo $pwdclasserr; ?>" name = "cpassword" placeholder = "********" required>
					<small id="" class="form-text text-muted">retype the same as before.</small>
				</div>
			</div>
				

			<div class="form-group signup__legal-text">
				<p> * All fields is required. You must be at least 16 years old to register</p>
				<p> By clicking Create my account, you agree to our Terms, and that you have read our Data Use Policy, including our Cookie Use.</p>
			</div>	
			
			<div class="signup__form-btns d-flex justify-content-center">
				<input type="submit" class="btn btn-primary rounded-pill m-2" name = "signup" Value = "Create my account" class="btn btn-primary">
				<a href="../">
					<button class="btn btn-outline-secondary rounded-pill m-2" type="button" >Back</button>
				</a>
			</div>
			

			<div class="form-group <?php echo $creationOKClass; ?>">
				<p><?php echo $creationOK; ?></p>
			</div>
		</form>	

		<div class="m-3"><a href="./terms.html">TERMS OF USE</a>  &bull;  <a href="./policy.html">Read privacy policy</a></div>
	
	</div>
</div>
