<?php

    // Creation de la pagination
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $currentPage = (int) strip_tags($_GET['page']);
    }else{
        $currentPage = 1;
    }


    $query = $conn->prepare('SELECT count(*) AS nb_posts FROM posts WHERE post_topic = :topic_id');
    $query->execute(array('topic_id' => $_GET['id']));
    $result = $query->fetch();
    $nb_posts = (int) $result['nb_posts'];

    $byPage = 20;
    $pages = ceil($nb_posts / $byPage);

    $firstElemByPage = ($currentPage * $byPage) - $byPage;
    $query = $conn->prepare('SELECT * FROM posts ORDER BY post_date DESC LIMIT :firstElementByPage, :byPage');
    $query->bindValue(':firstElementByPage', $firstElemByPage, PDO::PARAM_INT);
    $query->bindValue(':byPage', $byPage, PDO::PARAM_INT);

    $query->execute();
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);
    
    // for lock news post if current user is the last author
    $LastUSR_post = $conn->query("SELECT post_by FROM posts WHERE post_topic = '$GET_ID' AND post_deleted = 0 ORDER BY post_id DESC LIMIT 1");
    $LastUSR_post_result=$LastUSR_post->fetch();
     
?>

<!-- LOCK / UNLOCK START -->
    <div class="d-flex flex-row justify-content-between">
        <div>
            <?php
            $userTop = $conn->query("SELECT topic_by FROM topics WHERE topic_id = '$GET_ID'");
            $userTop_result=$userTop->fetch();
                if( $_SESSION['user_id'] == $userTop_result['topic_by']){
                $TOP_ID = $_GET['id'];
                
                // echo $TOP_status;
                    if( $TOP_status == 0 ){
                    
                    if(isset($_POST['btn_lock'])){
                        $UPD_topic_image  = 'https://'.$_SERVER['SERVER_NAME'].'/assets/topic_status/01-padlock.svg'; 
                        $UPDATEQuerySQL1 = "UPDATE `topics` 
                        SET `topic_status`  = 1, 
                            `topic_image`   = '$UPD_topic_image'
                        WHERE `topics`.`topic_id` = $TOP_ID";
                        $Top_UpdateINSERT= $conn->prepare($UPDATEQuerySQL1);
                        $Top_UpdateINSERT->execute();
                        $_SESSION['MSG_lock_unlock'] = "Topic Locked successfully";
                        $_SESSION['MSG_lock_unlock_tltp'] = 'Click to UNLOCK Topic';
                        $_SESSION['ICON_CLASS'] = 'fas fa-lock';
                        $_SESSION['TOP_status_UPD'] = 1;
                        // header("Refresh:0; ");
                        //header("Refresh:0; url=comments.php?id='.$TOP_ID");
                        // topicStatusLock($TOP_ID);
                    }
                    $MSG_ACTION = isset($_SESSION['MSG_lock_unlock']);
                    unset($_SESSION['MSG_lock_unlock']);
                    if(isset($_SESSION['MSG_lock_unlock_tltp'])){
                        $MSG_tooltip_LC = $_SESSION['MSG_lock_unlock_tltp'];
                        $ICON_CLASS = $_SESSION['ICON_CLASS'];
                        unset($_SESSION['MSG_lock_unlock_tltp']);
                        unset($_SESSION['ICON_CLASS']);
                    }else{
                        $MSG_tooltip_LC = 'Click to LOCK Topic';
                        $ICON_CLASS = 'fas fa-unlock';
                    }
                    echo'<form method="post">
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="'.$MSG_tooltip_LC.'">
                        <button type="submit" class="btn btn-primary btn-rounded mt-1 ml-2" name = "btn_lock" Value = "lock"><i class="'.$ICON_CLASS.'" aria-hidden="true"></i>'.$MSG_ACTION.'</button>
                    </span></form>';
                    }elseif( $TOP_status == 1 ){
                    
                    if(isset($_POST['btn_lock'])){
                        $UPD_topic_image  = 'https://'.$_SERVER['SERVER_NAME'].'/assets/topic_status/00-open-padlock.svg'; 
                        $UPDATEQuerySQL1 = "UPDATE `topics` 
                        SET `topic_status`  = 0, 
                            `topic_image`   = '$UPD_topic_image'
                        WHERE `topics`.`topic_id` = $TOP_ID";
                        $Top_UpdateINSERT= $conn->prepare($UPDATEQuerySQL1);
                        $Top_UpdateINSERT->execute();
                        $_SESSION['MSG_lock_unlock'] = "Topic Unlocked successfully";
                        $_SESSION['MSG_lock_unlock_tltp'] = 'Click to LOCK Topic';
                        $_SESSION['ICON_CLASS'] = 'fas fa-unlock';
                        $_SESSION['TOP_status_UPD'] = 0;
                        // header("Refresh:0; ");
                        // topicStatusUnlock($getid);
                        }
                        $MSG_ACTION = $_SESSION['MSG_lock_unlock'];
                        unset($_SESSION['MSG_lock_unlock']);
                        if(isset($_SESSION['MSG_lock_unlock_tltp'])){
                            $MSG_tooltip_LC = $_SESSION['MSG_lock_unlock_tltp'];
                            $ICON_CLASS = $_SESSION['ICON_CLASS'];
                            unset($_SESSION['MSG_lock_unlock_tltp']);
                            unset($_SESSION['ICON_CLASS']);
                        }else{
                        $MSG_tooltip_LC = 'Click to UNLOCK Topic';
                        $ICON_CLASS = 'fas fa-lock';
                        }
                        echo'<form method="post">
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="'.$MSG_tooltip_LC.'">
                        <button type="submit" class="btn btn-primary btn-rounded mt-1 ml-2" name = "btn_lock" Value = "unlock"><i class="'.$ICON_CLASS.'" aria-hidden="true"></i> '.$MSG_ACTION.'</button>
                        </span></form>';
                    }                    
                }else{}
            

            ?>
        </div>
<!-- LOCK / UNLOCK END -->
    
        <nav>
            <ul class="pagination">
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="./comments.php?id=<?= $_GET['id'] ?>&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                </li>
                <?php for($page = 1; $page <= $pages; $page++): ?>
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="./comments.php?id=<?= $_GET['id'] ?>&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                    <a href="./comments.php?id=<?= $_GET['id'] ?>&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                </li>
            </ul>
        </nav>
    </div>