<?php
    $req_users = $conn->prepare('SELECT user_image, user_name, user_sign, user_imgdata, user_id FROM users ORDER BY user_datelastlog DESC LIMIT 3');
    $req_users->execute();
    if (!$req_users) {
        echo 'Unable to display the last active users' .mysql_error();
    } else {
    ?>

    <section id="last-active-user">
        
        <div class="container-fluid bg-light rounded-lg mb-lg-4 mb-3 pb-2">
            <div class="gradient-header row mb-lg-2 mb-1">
                Last active users
            </div>
            <?php
                while ($user = $req_users->fetch())
                {
            ?>
            <a class="user-card card border-0 text-center mb-lg-2 mb-1" href="/member.php?view_user_id=<?= $user['user_id'];?>">
                <div class="card-body">
                    <div class="user-list-item d-flex flex-column flex-lg-row">
                        
                        <div>
                            <img class="user-list-item__gravatar avatar-sm rounded-circle" alt="" src="data:image/webp;base64,<?php echo base64_encode($user['user_imgdata']); ?>" width="48" alt="User's avatar"> 
                        </div>
                        
                        <div class="text-center text-lg-left ml-lg-2">
                            <h5 class="user-list-item__name card-title mb-0"><?= $user['user_name']; ?></h5>
                            <div class="user-list-item__sign small text-secondary mt-0"><?= $user['user_sign']; ?></div>
                        </div>
                        
                    </div>
                </div>
            </a>
            <?php
                }
                $req_users->closeCursor();
            ?>
        </div>

        
        
    </section>
    <?php
    }
?>