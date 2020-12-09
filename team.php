<?php 
    include 'includes/1head.php';
    include 'includes/2body.php';
?>

    <div id="team">
        <h2 class="text-center m-2">The Team</h2>

        
        <h5 class="team-title border-bottom border-primary m-3 p-3">"Gods"</h5>
        <?php $req_godUsers = getGodUsers();
            while($god = $req_godUsers->fetch()) {  ?>

            <div class="row bg-light m-3 p-3 d-flex align-items-center">
                <div class="col-2"> <img class="rounded-circle" src="<?= $god['user_image'] ?>" alt="" width="80" height="80"> </div>
                <div class="col-7 font-weight-bold"> <?= $god['user_name'] ?> </div>
                <div class="col-3">
                    <a href="?view_user_id=<?php echo $god['user_id']; ?>" class="btn btn-primary">View</a>
                    <a href="msg.php?sendto_id=<?php echo $god['user_id']; ?>"  class="btn btn-primary">Send MSG</a>
                </div>
            </div>

        <?php } ?>
        

        <h5 class="team-title border-bottom border-primary m-3 p-3">"Devils"</h5>
        <?php $req_devilUsers = getDevilUsers();
            while($devil = $req_devilUsers->fetch()) {  ?>

            <div class="row bg-light m-3 p-3 d-flex align-items-center">
                <div class="col-2"> <img class="rounded-circle" src=" <?= $devil['user_image'] ?> " alt="" width="80" height="80"></div>
                <div class="col-7 font-weight-bold"> <?= $devil['user_name'] ?> </div>
                <div class="col-3">
                    <a href="?view_user_id=<?php echo $devil['user_id']; ?>" class="btn btn-primary">View</a>
                    <a href="msg.php?sendto_id=<?php echo $devil['user_id']; ?>"  class="btn btn-primary">Send MSG</a>
                </div>
            </div>

        <?php } ?>


        <h5 class="team-title border-bottom border-primary m-3 p-3">Moderators</h5>
        <?php $req_modUsers = getModUsers();
            while($mod = $req_modUsers->fetch()) {  ?>

            <div class="row bg-light m-3 p-3 d-flex align-items-center">
                <div class="col-2"> <img class="rounded-circle" src=" <?= $mod['user_image'] ?> " alt="" width="80" height="80"></div>
                <div class="col-7 font-weight-bold align-middle"> <?= $mod['user_name'] ?> </div>
                <div class="col-3 align-middle">
                    <a href="?view_user_id=<?php echo $mod['user_id']; ?>" class="btn btn-primary">View</a>
                    <a href="msg.php?sendto_id=<?php echo $mod['user_id']; ?>"  class="btn btn-primary">Send MSG</a>
                </div>
            </div>

        <?php } ?>

    
    </div>


<?php 
    include 'includes/3body.php';
    include 'includes/4foot.php';
?>