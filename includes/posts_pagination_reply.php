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
    $LastUSR_post = $conn->query("SELECT post_by FROM posts WHERE post_topic = '$_GET[id]' AND post_deleted = 0 ORDER BY post_id DESC LIMIT 1");
    $LastUSR_post_result=$LastUSR_post->fetch();
     
?>
<div class="d-flex justify-content-between mt-4 flex-column flex-lg-row">
    <div class="d-flex justify-content-start">
        <div class="mr-3">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
            <?php if( $_SESSION['user_id'] == $LastUSR_post_result['post_by']){}else{ echo '
            <button type="button" id="btn-post-reply" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#exampleModal">Post a reply <i class="fas fa-long-arrow-alt-left"></i></button>
            ';} ?>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="1" role="dialog" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="z-index: 10">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Post a reply</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php if( $TOP_status == 0 ){
                             require('includes/new-post.php'); 
                        }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<!-- LOCK / UNLOCK START -->
    <div>
                <?php
                $userTop = $conn->query("SELECT topic_by FROM topics WHERE topic_id = '$_GET[id]'");
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
                            header("Refresh:0; url=comments.php?id='.$TOP_ID");
                            // topicStatusLock($TOP_ID);
                        }
                        $MSG_ACTION = $_SESSION['MSG_lock_unlock'];
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
                        <button type="submit" class="btn-danger btn-rounded mt-1 ml-2" name = "btn_lock" Value = "lock"><i class="'.$ICON_CLASS.'" aria-hidden="true"></i>'.$MSG_ACTION.'</button>
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
                            header("comments.php?id='.$TOP_ID.':0");
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
                            <button type="submit" class="btn-danger btn-rounded mt-1 ml-2" name = "btn_lock" Value = "unlock"><i class="'.$ICON_CLASS.'" aria-hidden="true"></i> '.$MSG_ACTION.'</button>
                            </span></form>';
                     }                    
                 }else{}
                

                ?>
    </div>
<!-- LOCK / UNLOCK END -->
    <div>
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
</div>