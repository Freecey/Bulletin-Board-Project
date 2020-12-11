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
            <?php echo   '<div class="col-2"> <img class="rounded-circle" src="data:image/webp;base64,'.base64_encode($god['user_imgdata']).'" alt="'.$god['user_name'].'s Avatar" width="80" height="80"></div>'; ?>
                <div class="col-7 font-weight-bold"> <?= $god['user_name'] ?> </div>
                <div class="col-3">
                    <a href="member.php?view_user_id=<?php echo $god['user_id']; ?>" class="btn btn-primary">View</a>
                    <?php if(isset($_SESSION['user_level'])) { echo  '<a href="msg.php?sendto_id='.$god['user_id'].'"  class="btn btn-primary">Send MSG</a>';} ?>
                </div>
            </div>

        <?php } ?>
        

        <h5 class="team-title border-bottom border-primary m-3 p-3">"Devils"</h5>
        <?php $req_devilUsers = getDevilUsers();
            while($devil = $req_devilUsers->fetch()) {  ?>

            <div class="row bg-light m-3 p-3 d-flex align-items-center">
            <?php echo   '<div class="col-2"> <img class="rounded-circle" src="data:image/webp;base64,'.base64_encode($devil['user_imgdata']).'" alt="'.$devil['user_name'].'s Avatar" width="80" height="80"></div>'; ?>
                <div class="col-7 font-weight-bold"> <?= $devil['user_name'] ?> </div>
                <div class="col-3">
                    <a href="member.php?view_user_id=<?php echo $devil['user_id']; ?>" class="btn btn-primary">View</a>
                    <?php if(isset($_SESSION['user_level'])) { echo  '<a href="msg.php?sendto_id='.$devil['user_id'].'"  class="btn btn-primary">Send MSG</a>';} ?>
                </div>
            </div>

        <?php } ?>


        <h5 class="team-title border-bottom border-primary m-3 p-3">Moderators</h5>
        <?php $req_modUsers = getModUsers();
            while($mod = $req_modUsers->fetch()) {  ?>

            <div class="row bg-light m-3 p-3 d-flex align-items-center">
     <?php 
     echo   '<div class="col-2"> <img class="rounded-circle" src="data:image/webp;base64,'.base64_encode($mod['user_imgdata']).'" alt="'.$mod['user_name'].'s Avatar" width="80" height="80"></div>'; ?>
                <div class="col-7 font-weight-bold align-middle"> <?= $mod['user_name'] ?> </div>
                <div class="col-3 align-middle">
                    <a href="member.php?view_user_id=<?php echo $mod['user_id']; ?>" class="btn btn-primary">View</a>
                    <?php if(isset($_SESSION['user_level'])) { echo  '<a href="msg.php?sendto_id='.$mod['user_id'].'"  class="btn btn-primary">Send MSG</a>';} ?>
                </div>
            </div>

        <?php } ?>

    
    </div>


<?php 
    include 'includes/3body.php';
    include 'includes/4foot.php';
?>