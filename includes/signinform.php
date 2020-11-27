<div id="signin" class="container-fluid">

    <div class="gradient-line"></div>

    <div class="signin__login-register border-bottom p-2" id="login">
        Login or
        <a href="signup.php"> Register here </a>
    </div>

    <form class="signin__form" method="post">
        <div class="form-group <?php echo $nameclasserr; ?>">
            <input type="email" class="form-control" name = "user_email" placeholder = "email" required> 
        </div>	

        <div class="form-group <?php echo $pwdclasserr; ?>">
            <input type="password" class="form-control" name = "user_pass" placeholder = "********" required>
        </div>	

        <div class="text-center">
            <input type="submit" class="btn btn-primary btn-block rounded-pill" name = "signin_main" Value = "Login">
        </div>
    </form>

    <div class="signin__forgot-pwd m-2" data-toggle="tooltip" data-placement="top" title="Password Recovery">
        <span><a class="signin__forgot-pwd" href="./lostpwd.php"> I forgot my password </a></span>
    </div>
</div>