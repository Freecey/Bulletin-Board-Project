<section id="header" class="container-fluid">
    <div class="row justify-content-between">
        <div class="col">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="d-flex flex-grow-1">
                    <div class="w-100 text-right">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </div>
                <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
                    <ul class="navbar-nav ml-auto flex-nowrap">
                        <?php  if($_SESSION['loginOK'] == '1') {
                                echo '
                                 <li class="nav-item">
                                <a href="/profile.php" class="nav-link"><i class="fas fa-user-cog"></i></i></i> Welcome ' . $_SESSION['user_name'] . ' <img class="rounded-circle" src="'.$_SESSION['user_image'].'" width="25"></a>
                                </li>';
                                } else {
                                    echo '  <li class="nav-item">
                                    <a href="signup.php" class="nav-link"><i class="far fa-file-alt"></i> sRegister</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="login.php" class="nav-link"><i class="fas fa-sign-in-alt"></i> Login</a>
                                    </li>';
                                }
                             ?>
                        <li class="nav-item d-md-none">
                            <?php include('search.php'); ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1 class="text-center text-white display-1"><?php echo $HEADERNAME; ?></h1>
        </div>
    </div>
</section>