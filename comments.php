<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/function/functions.php'); 
    require_once($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php'); 

    incrementTopicViews();
// postedit.php?postedit_id=34

$GET_ID = $_GET['id'];

    $GetTOPName = $conn->query("SELECT * FROM topics WHERE topic_id = $GET_ID LIMIT 1");
    $GetTOPName_result=$GetTOPName->fetch();
    $TOP_status = $GetTOPName_result['topic_status'];
?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/1head.php'); ?>
    <!-- <head>
        <link rel="stylesheet" href="css/simplemde.min.css">
        <script src="/js/simplemde.min.js"></script>
    </head> -->

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
                    <div class="col-xs-12 col-md-7 col-lg-8 col-xl-9">
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
                                                    <?php echo '<img class="avatar-sm rounded-circle" src="data:image/webp;base64,'.base64_encode($post['user_imgdata']).'" alt="'.htmlspecialchars($post['user_name']).'s Avatar Picture" width="90">'; ?>
                                                    </div>
                                                    <div class="col-8 col-md-9 col-lg-12">
                                                        <p class="mt-3 mb-0"><a href="member.php?view_user_id=<?php echo $post['user_id'] ;?>"><strong><?= htmlspecialchars($post['user_name']) ?></strong></a></p>
                                                        <p>Posts: <strong>
                                                        <?php 
                    $Current_postUSR_ID = $post['user_id'];
                    $sql = "SELECT COUNT(post_by) AS NumberOfPosts FROM posts WHERE post_by= $Current_postUSR_ID";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $nbmposts = $stmt->fetch(PDO::FETCH_ASSOC);
                    $nbmposts = $nbmposts['NumberOfPosts'];
                    echo $nbmposts;                                                        
                                                        ?>
                                                        </strong></p>
                                                        <?php 
                                                            if(isset($_SESSION['TOP_status_UPD'])){
                                                                $ACT_STATUS = $_SESSION['TOP_status_UPD'];
                                                                unset($_SESSION['TOP_status_UPD']);
                                                                // header("Refresh:0; ");
                                                            }else{
                                                                $ACT_STATUS = $TOP_status;
                                                            }

                                                            if(($post['post_by'] == $_SESSION['user_id']) AND ($post['post_deleted'] == 0) AND ($ACT_STATUS == 0) AND ($lastPost['post_id'] == $post['post_id'])){
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
                                                            $newDate = date('D M d, Y H:i:s', strtotime($post_dtupade));
                                                            //$post_dtupade = $post_dtupade->date('D M d, Y H:i:s');
                                                            echo '<small>';
                                                            echo $date->format('D M d, Y H:i:s');
                                                            if(isset($post_dtupade)){
                                                                echo ' - last update ';
                                                                echo $newDate; //->format('D M d, Y H:m:s');
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
                                                                        <button type="button" aria-describedby="tooltip" class="btn btn-outline emojiButton"><i class="far fa-laugh-wink"></i></button>
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
                            <div class="d-flex justify-content-between mt-4 flex-column flex-lg-row">
    <div class="d-flex justify-content-start">
        <div class="mr-3">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
            <?php if( $_SESSION['user_id'] == $LastUSR_post_result['post_by']){}else{ echo '
            <div class="container fixed-bottom mb-4">
                <div class="row justify-content-center">
                    <div class="col-3">
                        <button type="button" id="btn-post-reply" class="btn btn-lg btn-primary btn-rounded centered" data-toggle="modal" data-target="#exampleModal">Post a reply <i class="fas fa-long-arrow-alt-left"></i></button>
                    </div>
                </div>
            </div>
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
                        </section>
                        
                    </div>
                    <div class="col-xs-12 col-md-5 col-lg-4 col-xl-3 d-md-block">
                        <div class="d-none d-md-block">
                            <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/search.php'); ?>
                            <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/signin.php'); ?>
                            <?php include('includes/sidebutton2.php'); ?>
                        </div>
                        <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/last-posts.php'); ?>
                        <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/last-active-user.php'); ?>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="   crossorigin="anonymous"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script type="module" src="https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.js"></script>
        <script type="text/javascript" src="js/emoji-reaction.js"></script>
        <script type="text/javascript" src="./node_modules/marked/marked.min.js"></script>
        <script type="text/javascript" src="./node_modules/dompurify/dist/purify.min.js"></script>
        <script type="text/javascript">
            let posts = document.getElementsByClassName('post-content');
            
            Array.from(posts).forEach(post => {
                const comment = post.innerHTML;
                const cleanComment = DOMPurify.sanitize(comment)
                post.innerHTML = marked(cleanComment);
            });
        </script>
        
        
        <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/4foot.php'); ?>