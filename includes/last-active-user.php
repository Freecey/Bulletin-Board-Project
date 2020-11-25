<?php
    $req_users = $conn->query('SELECT * FROM users ORDER BY user_datelastlog LIMIT 3');
    if (!$req_users) {
        echo 'Unable to display the last active users' .mysql_error();
    } else {
    ?>

    <section id="last-active-user">
        
        <div class="container-fluid bg-light rounded-lg">
            <div class="gradient-header row">
                Last active users
            </div>

            <div class="row d-flex flex-wrap">
                <?php
                while ($user = $req_users->fetch())
                {
                ?>
                    <div class="user-card card col border-0 m-2">
                        <a href="./member.php?view_user_id=<?php echo $user['user_id'];?>">
                            <div class="user-list__item text-center">
                                <div>
                                    <img class="user-list-item__gravatar col rounded-circle" src="<?php echo $user['user_gravatar']; ?>" alt="">
                                </div>
                                <div class="user-list-item__name font-weight-bold col"> <?php echo $user['user_name']; ?> </div>
                                <div class="user-list-item__sign font-weight-light col"> <?php echo $user['user_sign']; ?> </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                $req_topics->closeCursor();
                ?>
            </div>
        </div>
        
    </section>
    <?php
    }
?>