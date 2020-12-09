<section id="header" class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php if(isset($_SESSION['user_level'])){ 
                    $act_usr_ID = $_SESSION['user_id'];
                    $sql = "SELECT COUNT(pvmsg_read) AS NumberOfUnread FROM pvmsg WHERE (pvmsg_inbox= '$act_usr_ID') AND (pvmsg_read= '0')";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $nbmsgpv = $stmt->fetch(PDO::FETCH_ASSOC);
                    $nbmsgpv = $nbmsgpv['NumberOfUnread'];
                    echo '
                <li class="nav-item"> 
                    <a class="nav-link" href="msg.php">Messages'; if($nbmsgpv > 0 ) {echo ' <i class="fas fa-envelope text-success">'.$nbmsgpv.'</i>'; } echo  '</a>
                </li> ';} ?>
                <li class="nav-item">
                    <a class="nav-link" href="member.php">Members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="team.php">The Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item d-lg-none my-2">
                    <?php include('search.php'); ?>
                </li>

            </ul>
        </div>
        <div class="nav-item dropdown d-lg-none">
            <?php  if(isset($_SESSION['loginOK']) == '1') {
                ?>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle" src="<?= $_SESSION['user_image'] ?>" width="25">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/profile.php">My profile</a>
                    <?php if($_SESSION['user_level'] >= 2) {
                        echo '<a class="dropdown-item" href="./admin/">Admin</a>';
                    }
                    ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            <?php
                } else {
                ?>
                    <div class="nav-item dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle text-secondary"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="signup.php">Register</a>
                            <a class="dropdown-item" href="login.php">Login</a>
                        </div>
                    </div>
                <?php
                }
                ?>
        </div>
    </nav>
    <div id="header" class="jumbotron jumbotron-fluid pt-6">
        <div class="container mt-5">
            <h1 class="text-center text-white display-2"><?php echo $HEADERNAME; ?></h1>
        </div>
    </div>
</section>
<script>
    $(window).scroll(function(){        
        var scroll = $(window).scrollTop();
        console.log(scroll)
        if(scroll <= 100){
            $('.fixed-top').css('background', `rgba(255, 255, 255, 0.${Math.floor(scroll/10)})`);
            $('.nav').addClass('text-white');
        } else{
            $('.fixed-top').css('background', 'white');
            $('.nav').addClass('text-secondary');
        }
    });
</script>