<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/function/functions.php'); 
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php'); 

    incrementTopicViews();
// postedit.php?postedit_id=34

    $GetTOPName = $conn->query("SELECT topic_subject FROM topics WHERE topic_id = '$_GET[id]' LIMIT 1");
    $GetTOPName_result=$GetTOPName->fetch();
?>


<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/1head.php'); ?>
    <head>
        <link rel="stylesheet" href="css/simplemde.min.css">
        <script src="https://kit.fontawesome.com/ad9205c9ea.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
        <script src="/js/simplemde.min.js"></script>
    </head>

    <body>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/header.php'); ?>
        <main class="pr-sm-5 pl-sm-5">
            <div class="container-fluid shadow rounded-lg" id="content">
                <div class="row">
                    <div class="col-12">
                        <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/breadcrumb.php'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-9 col-md-8">
                        <section id="comments" class="mb-3 pl-md-5">
                            <div class="row">
                                <div class="col">
                                    <h2>Topic : <?= $GetTOPName_result['topic_subject']; ?></h2>
                                    <div class="alert alert-danger" role="alert">
                                    <p data-toggle="modal" data-target="#ModalRules"><i class="fab fa-readme"></i> Forum rules </i> </p>

                                                <!-- Modal Rules Start -->
                                                <div class="d-flex justify-content-start">
        <div class="mr-3">

            <div class="modal fade" id="ModalRules" tabindex="1" role="dialog" data-backdrop="false" aria-labelledby="ModalRulesLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="z-index: 10">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalRulesLabel">Forum rules </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/rules.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        
        <script type="text/javascript">
            let posts = document.getElementsByClassName('post-content');
            
            Array.from(posts).forEach(post => {
                const comment = post.innerHTML;
                const cleanComment = DOMPurify.sanitize(comment)
                post.innerHTML = marked(cleanComment);
            });
        </script>


        <!-- Modal Rules END -->

                                    </div>
                                </div>
                            </div>

                            <?php require($_SERVER['DOCUMENT_ROOT'].'/includes/posts_pagination_reply.php'); ?>
                            <div class="row bg-light rounded-lg pb-3">
                                <div class="col">
                                    <?php
                                        $req = getBreadcrumbs();
                                        $lastPost = getLastPostId($_GET['id'])->fetch();
                                        while($post = $req->fetch()) {
                                    ?>
                                    <div class="card border-0 shadow-sm rounded-lg mt-3" id="<?php echo $post['post_id']; ?>">
                                        <div class="card-body row">
                                            <div class="col-12 col-sm-5 col-md-3 col-lg-2">
                                                <div class="row mb-2 text-md-center">
                                                    <div class="col-4 col-md-3 col-lg-12">
                                                        <img class="avatar-sm rounded-circle" src="<?= $post['user_image'] ?>" alt="<?= htmlspecialchars($post['user_name']) ?>'s Avatar Picture" width="90">
                                                    </div>
                                                    <div class="col-8 col-md-9 col-lg-12">
                                                        <p class="mt-3 mb-0"><a href="member.php?view_user_id=<?php echo $post['user_id'] ;?>"><strong><?= htmlspecialchars($post['user_name']) ?></strong></a></p>
                                                        <p>Posts: <strong>43</strong></p>
                                                        <?php 

                                                           if(($post['post_by'] == $_SESSION['user_id']) AND ($post['post_deleted'] == 0) AND ($lastPost['post_id'] == $post['post_id'])){
                                                                echo '<a href="postedit.php?postedit_id='. $post['post_id'] .'">
                                                                <button  class="btn btn-secondary btn-rounded" >Edit/Delete</button>
                                                                </a>';
                                                            } 
                                                        ?> 

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-7 col-md-9 col-lg-10">
                                                <div class="d-flex justify-content-between">
                                                    <div class="content message">
                                                        <p class="text-secondary">
                                                        <?php
                                                            $date = new DateTime($post['post_date']);
                                                            $post_dtupade = $post['post_date_update'];
                                                            //$post_dtupade = $post_dtupade->date('D M d, Y H:i:s');
                                                            echo '<small>';
                                                            echo $date->format('D M d, Y H:i:s');
                                                            if(isset($post_dtupade)){
                                                                echo ' - last update ';
                                                                echo $post_dtupade; //->format('D M d, Y H:m:s');
                                                            }
                                                            echo '</small>';
                                                        ?></p>
                                                        <p class="post-content"><?php if( $post['post_deleted'] == 0 ) {?> <?= htmlspecialchars($post['post_content']);} else { echo 'deleted'; }; ?></p>
                                                        
                                                        <div emojiPost_id="<?= $post['post_id']; ?>">
                                                            <?php include './includes/emojiReaction/updateEmojiReaction.php'; ?>
                                                        </div>
                                                        
                                                    </div>
                                                    <?php
                                                        if(!empty($_SESSION['user_id'])) {
                                                            echo '
                                                            <div class="reaction">
                                                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                                    <div class="btn-group" role="group" aria-label="Third group">
                                                                        <button type="button" class="btn btn-outline emojiButton" onclick="toggle()"><i class="far fa-laugh-wink"></i></button>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="emojiTooltip" role="tooltip">
                                                                    <emoji-picker post_id="' . $post['post_id'] . '"></emoji-picker>
                                                                    <div id="arrow" data-popper-arrow></div>
                                                                </div>

                                                            </div> 
                                                            
                                                            ';
                                                        }
                                                    ?>
                                                    
                                                </div>
                                                <hr>
                                                    <p class="small"><?= htmlspecialchars($post['user_sign']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        }
                                        $req->closeCursor();
                                    ?>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <a href="#" onclick="window.history.go(-1); return false;"><i class="fas fa-chevron-left"></i> Return to the topic section</a>
                            </div>
                            <?php require($_SERVER['DOCUMENT_ROOT'].'/includes/posts_pagination_reply.php'); ?>
                        </section>
                        
                    </div>
                    <div class="col-xl-3 col-md-4 d-none d-md-block">
                        <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/search.php'); ?>
                        <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/signin.php'); ?>
                        <?php include('includes/sidebutton2.php'); ?>
                        <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/last-posts.php'); ?>
                        <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/last-active-user.php'); ?>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script type="module" src="https://unpkg.com/emoji-picker-element@1"></script>
        <script type="text/javascript" src="./js/emoji-reaction.js"></script>
        
        <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/4foot.php'); ?>