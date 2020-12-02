
  
 
         <div class="col col-10">
        <a class="text-white" href="member.php">
        <div class="my-1  btn btn-primary btn-block rounded-pill" >
            Members
        </div></a>
        </div>


                    <div class="col col-10">
        <a class="text-white" href="team.php">
        <div class="my-1 btn btn-primary btn-block rounded-pill" >
            The team
        </div></a>
        </div>

       
                    <div class="col col-10">
                <a class="text-white" href="contact.php">
                 <div class="my-1  btn btn-primary btn-block rounded-pill" >
                    Contact
                 </div></a>
                 </div>
        

        <?php
        if($_SESSION[user_level] >= 2 ){
        echo '
        <div class="col col-10 nomargin">
        <a class="text-white" href="./admin/">
        <div class="my-1  btn btn-warning btn-block rounded-pill" >
            Admin
        </div></a>
        </div>';
    }

        if ($_SESSION['loginOK']  == true) {
            echo '
            <div class="col col-10">
        <a class="text-white" href="logout.php">
        <div class="my-1  btn btn-secondary btn-block rounded-pill" >
            Logout
        </div></a>
        </div>';};
        ?>
    </div>