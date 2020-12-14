<?php

$user = getUser($_SESSION['user_id']);
$uri = $_SERVER['REQUEST_URI']; 
if (isset($_SESSION['loginOK'])  == true) {

    if ( $uri != "/profile.php" ) {
        ?>
        <div class="card text-center rounded-lg mb-lg-4 mb-3">
            <div class="card-body">
                <div class="d-flex flex-column flex-lg-row">
                    <div>
                    <?php echo '<img class="avatar-sm rounded-circle" alt="'.$user['user_name'].' Avatar" src="data:image/webp;base64,'.base64_encode($user['user_imgdata']).'" width="48">'; ?>
                    </div>
                    
                    <div class="text-center text-lg-left ml-lg-2">
                        <h5 class="card-title mb-0"><?= $user['user_name']?></h5>
                        <div class="small text-secondary mt-0"><?= $user['user_sign']; ?></div>
                    </div>
                    <?php if($nbmsgpv > 0 ) {
                        echo '<a class="text-dark border-left ml-4 p-3 d-flex" href="/msg.php">
                            <i class="far fa-envelope d-flex p-1"> 
                                <div class="rounded-circle bg-dark d-flex justify-content-center align-items-center" style="width:15px; height:15px; position:relative; bottom:5px; right:5px">
                                    <small class="text-light">'.$nbmsgpv.'</small>
                                </div>
                            </i>
                        </a>';
                    } ?>
                    
                </div>
            </div>
            <div class="card-footer d-flex justify-content-around flex-column flex-lg-row">
                <a class="text-secondary btn btn-outline btn-sm border-primary rounded-pill my-1" href="profile.php">My profile</button>
                <?php
                    if($_SESSION['user_level'] >= 2 ){
                        echo '<a class="text-secondary my-1 btn btn-outline border-warning btn-sm rounded-pill" href="./admin/">Admin</a>';
                    }
                ?>
                <a class="text-secondary my-1 btn btn-outline btn-sm border-secondary rounded-pill" href="logout.php">Logout</a>
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
    }
}
?>