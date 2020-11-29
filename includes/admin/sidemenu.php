



    <div class="form-group <?php echo $pwdclasserr; ?>">
        <!-- <label for="user_pass">Password </label>  -->
        <a class="text-white" href="./">
        <div class="my-2  btn btn-primary btn-block rounded-pill" >Admin Home</div></a>
        <a class="text-white" href="announce.php">
        <div class="my-2  btn btn-primary btn-block rounded-pill" >Announcements</div></a>
        <a class="text-white" href="topics.php">
        <div class="my-2  btn btn-primary btn-block rounded-pill" >Topics</div></a>
        <a class="text-white" href="boards.php">
        <div class="my-2  btn btn-primary btn-block rounded-pill" >Boards</div></a>
        <a class="text-white" href="users.php">
        <div class="my-2  btn btn-primary btn-block rounded-pill" >Edit Users</div></a>
<?php if($_SESSION['user_level'] >= 3) { 

// For ADMIN ONLY
echo '

        <a class="text-white" href="setting.php">
        <div class="my-2  btn btn-primary btn-block rounded-pill" >Site Setting</div></a>
        <a class="text-white" href="log.php">
        <div class="my-2  btn btn-primary btn-block rounded-pill" >Log</div></a>
    ';} ?>
        <a class="text-white" href="../">
        <div class="my-2  btn btn-secondary btn-block rounded-pill" >Site Home</div></a>
        <a class="text-white" href="javascript:history.go(-1)">
        <div class="my-2  btn btn-secondary btn-block rounded-pill" >Back</div></a>
        <a class="text-white" href="../logout.php">
        <div class="my-2  btn btn-secondary btn-block rounded-pill" >Logout</div></a>
    </div>	
