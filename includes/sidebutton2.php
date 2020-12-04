<?php
 $uri = $_SERVER['REQUEST_URI'];
  echo        '<div class="justify-content-center col-12  center-block row">';
if ($_SESSION['loginOK']  == true) {
        echo '<div class="m-2">';
        echo 'Welcome ';echo '<b>'.$_SESSION['user_name'].'</b>';
        echo '</div>';


    // Check if user is on / or /index.php for hidden home    
   

        if ( $uri == "/" )
    {
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
    if ( $uri == "/profile.php" )
    {
        // You're on the root route
    } else {
        echo '
        <div class="col col-12">
        <a class="text-white" href="profile.php">
        <div class="my-1 btn btn-info btn-block rounded-pill" >
            Your Profile
        </div></a>
        </div>';
    }


        // echo '<pre>' . print_r($SignInDATA, TRUE) . '</pre>';
        // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
} else {
    include 'includes/signinform.php';
    if ( $uri == "/" )
    {
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
 
         <div class="col col-12">
        <a class="text-white" href="member.php">
        <div class="my-1  btn btn-primary btn-block rounded-pill" >
            Members
        </div></a>
        </div>


                    <div class="col col-12">
        <a class="text-white" href="team.php">
        <div class="my-1 btn btn-primary btn-block rounded-pill" >
            The team
        </div></a>
        </div>

                    <div class="col col-12">
                <a class="text-white" href="contact.php">
                 <div class="my-1  btn btn-primary btn-block rounded-pill" >
                    Contact
                 </div></a>
                 </div>
        

        <?php
        if($_SESSION['user_level'] >= 2 ){
        echo '
        <div class="col col-12 nomargin">
        <a class="text-white" href="./admin/">
        <div class="my-1  btn btn-warning btn-block rounded-pill" >
            Admin
        </div></a>
        </div>';
    }

        if ($_SESSION['loginOK']  == true) {
            echo '
            <div class="col col-12">
        <a class="text-white" href="logout.php">
        <div class="my-1  btn btn-secondary btn-block rounded-pill" >
            Logout
        </div></a>
        </div>';};
        ?>
    </div>



    </aside>