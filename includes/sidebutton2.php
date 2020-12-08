<?php
$user = getUser(isset($_SESSION['user_id']));
$uri = $_SERVER['REQUEST_URI']; 
if (isset($_SESSION['loginOK'])  == true) {

    if ( $uri != "/profile.php" ) {
        ?>
        <div class="card text-center rounded-lg">
            <div class="card-body">
                <img class="avatar-sm rounded-circle" alt="" src="<?= $user['user_gravatar']; ?>">
                <h5 class="card-title"><?= $user['user_name']?></h5>
                <div class="small text-secondary"><?= $user['user_sign']; ?></div>
            </div>
            <div class="card-footer d-flex justify-content-around">
                <a class="btn btn-primary rounded-pill my-1" href="profile.php">My profile</button>
                <?php
                    if($_SESSION['user_level'] >= 2 ){
                        echo '<a class="text-white my-1 btn btn-warning rounded-pill" href="./admin/">Admin</a>';
                    }

                    if ($_SESSION['loginOK']  == true) {
                        echo '<a class="text-white my-1 btn btn-secondary rounded-pill" href="logout.php">Logout</a>';
                    };
                ?>
            </div>
        </div>
    <?php

    }

} else {
    include 'includes/signinform.php';
    if ( $uri == "/" ) {
        // You're on the root route
    } elseif ( $uri == "/index.php" ) {
        // You're on the root route index.php
    } else {
        echo '
        <div class="col col-12">
        <a class="text-white" href="/">
        <div class="my-1  btn btn-primary btn-block rounded-pill" >
            Home
        </div></a>
        </div>';
    }
}
?>