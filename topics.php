<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/function/functions.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php'); 
$GetBoardName = $conn->query("SELECT board_name FROM boards WHERE board_id = '$_GET[id]' LIMIT 1");
$GetBoardName_result=$GetBoardName->fetch();
include($_SERVER['DOCUMENT_ROOT'].'/includes/1head.php'); ?>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    </head>
<?php 




if($_SESSION['NewTopicreopenModal'] = 1){
    echo `<script>
    $(document).ready(function(){
        $("#NewPostModal").modal('show');
    });
    </script>`;
    unset($_SESSION['NewTopicreopenModal'] );
    if($_SESSION['TopicAddComplet'] == true ){
        $UpdateOKClass = 'bg-success text-white';
        $UpdateOK = 'New Topic Create Successfully';
        $formRO = 'readonly';
        unset($_SESSION['BoardUPDATEComplet']);
    }
}

?>
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

                        <section class="mb-3" id="topics">
                            
                            <article class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <h2>Board : <?php
                                            echo $GetBoardName_result['board_name'];
                                            ?>
                                        </h2> 
                                        <?php echo $usernameErr; ?>

                                        <div class="forum__rules row">
                                            <div class="alert alert-danger col-12" role="alert">
                                                <p data-toggle="modal" data-target="#ModalRules"><i class="fab fa-readme"></i> Forum rules </i> </p>
        <!-- Modal Rules Start -->
                                                <div class="d-flex justify-content-start align-self-center">
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
                                                    </div>
                                                </div>
        <!-- Modal Rules END --> 
                                        </div>

                                        <div class="btn-and-search row">
                                            <div class="col-6 col-xl-4 align-self-center">
                                                <div>
                                                <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/modal/newtopic.php'); ?>
                                                </div>
                                                <!-- <a href="newtopic.php?boardID=<?= $_GET['id'];?>"> <div class="p-3 btn btn-primary btn-block rounded-pill"> New Topic <i class="fas fa-pencil-alt"></i> </div></a> -->
                                            </div>
                                            <div class="col-6 col-xl-5 align-self-center"> <?php include('includes/search.php'); ?> </div>
                                        </div>
                                    </div>

                           
<!-- pinned Topic List -->


                            <div class="container-fluid bg-light rounded-lg m-2 pb-3">
                                    <div class="gradient-header row d-flex">
                                        <div class="col-xs-12 col-sm-5">
                                            <p class="h6 mb-1"><i class="fas fa-map-pin"><b class="ml-2"></i> Pin Topics' List</b></p>
                                        </div>
                                        <div class="col-2"> <i class="fas fa-comments"></i> </div>
                                        <div class="col-2"> <i class="far fa-eye"></i> </div>
                                        <div class="col-3 d-none d-sm-block"> <i class="far fa-clock"></i> </div>
                                    </div>

                                    <div id="topics-list" class="card-body">
                                        <?php
                                        $req_topics = getTopicsPin($_GET['id']);
                                        while ($topic = $req_topics->fetch())
                                        { 
                                        ?>
                                        <div class="card border-0 m-1">
                                            <div class="topic-list-item row no-gutters d-flex">
                                                <div class="col-xs-12 col-sm-5 d-flex">
                                                    <img class="rounded-circle pr-1" src="<?php echo $topic['topic_image']; ?>" width="40" alt="Topic Logo">
                                                    <div>
                                                        <?php echo '<a href="./comments.php?id=' . $topic['topic_id'] . '">' . $topic['topic_subject'] . '</a>'?>
                                                        <br/>
                                                        <small class="d-none d-lg-block" style= "color:rgb(106, 107, 110)"> Created: 
                                                            <?php
                                                                $topicCreationDate = new DateTime($topic['topic_date']);
                                                                echo $topicCreationDate->format('D M d');
                                                            ?> 
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="topic-details col-2">
                                                    <!-- COMMENTS -->
                                                    <?php
                                                        $req_posts = getPosts($topic['topic_id']);
                                                        $posts_cnt = $req_posts->rowCount();
                                                        echo $posts_cnt;
                                                        $req_posts->closeCursor();
                                                    ?>
                                                </div>
                                                <div class="topic-details col-2">
                                                    <!-- VIEWS -->
                                                    <?= $topic['topic_views']; ?>
                                                </div>
                                                <div class="topic-details col-xs-12 col-sm-3">
                                                    <!-- DATE -->
                                                    <div class="d-flex">
                                                        <div class="font-weight-light pr-1"><small>by</small></div>
                                                        <?php
                                                            $req_lastPosts = getLastPost($topic['topic_id']);
                                                            while($lastPost = $req_lastPosts->fetch()) {
                                                        ?>
                                                        <a href="member.php?view_user_id=<?= $lastPost['user_id']; ?>" >
                                                        <strong class="text-danger"> <small>
                                                            <?= ucwords($lastPost['user_name']); ?>
                                                            </small></strong></a>
                                                    </div>
                                                    <div class="font-weight-light"><small>
                                                        <?php
                                                            $postDate = new DateTime($lastPost['post_date']);
                                                            echo $postDate->format('D M d, H:i');
                                                        }
                                                        $req_lastPosts->closeCursor();
                                                        ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        $req_topics->closeCursor();
                                        ?>
                                    </div>
                                </div>



<!-- Topic list-->



                                <div class="container-fluid bg-light rounded-lg m-2 pb-3">
                                    <div class="gradient-header row d-flex">
                                        <div class="col-xs-12 col-sm-5">
                                            <p class="h6 mb-1">Topics' List</p>
                                        </div>
                                        <div class="col-2"> <i class="fas fa-comments"></i> </div>
                                        <div class="col-2"> <i class="far fa-eye"></i> </div>
                                        <div class="col-3 d-none d-sm-block"> <i class="far fa-clock"></i> </div>
                                    </div>

                                    <div id="topics-list" class="card-body">
                                        <?php
                                        $req_topics = getTopicsNoPIN($_GET['id']);
                                        while ($topic = $req_topics->fetch())
                                        { 
                                        ?>
                                        <div class="card border-0 m-1">
                                            <div class="topic-list-item row no-gutters w-100 d-flex align-items-center">
                                                <div class="col-xs-12 col-sm-5 d-flex">
                                                    <img class="rounded-circle pr-1" src="<?php echo $topic['topic_image']; ?>" width="40" alt="Topic Logo">
                                                    <div>
                                                        <?php echo '<a href="./comments.php?id=' . $topic['topic_id'] . '">' . $topic['topic_subject'] . '</a>'?>
                                                        <br/>
                                                        <small class="d-none d-lg-block" style= "color:rgb(106, 107, 110)"> Created: 
                                                            <?php
                                                                $topicCreationDate = new DateTime($topic['topic_date']);
                                                                echo $topicCreationDate->format('D M d');
                                                            ?> 
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="topic-details col-2">
                                                    <!-- COMMENTS -->
                                                    <?php
                                                        $req_posts = getPosts($topic['topic_id']);
                                                        $posts_cnt = $req_posts->rowCount();
                                                        echo $posts_cnt;
                                                        $req_posts->closeCursor();
                                                    ?>
                                                </div>
                                                <div class="topic-details col-2">
                                                    <!-- VIEWS -->
                                                    <?= $topic['topic_views']; ?>
                                                </div>
                                                <div class="topic-details col-xs-12 col-sm-3">
                                                    <!-- DATE -->
                                                    <div class="d-flex">
                                                        <div class="font-weight-light pr-1"><small>by</small></div>
                                                        <?php
                                                            $req_lastPosts = getLastPost($topic['topic_id']);
                                                            while($lastPost = $req_lastPosts->fetch()) {
                                                        ?>
                                                        <a href="member.php?view_user_id=<?= $lastPost['user_id']; ?>" >
                                                        <strong class="text-danger"> <small>
                                                            <?= ucwords($lastPost['user_name']); ?>
                                                            </small></strong></a>
                                                    </div>
                                                    <div class="font-weight-light"><small>
                                                        <?php
                                                            $postDate = new DateTime($lastPost['post_date']);
                                                            echo $postDate->format('D M d, H:i');
                                                        }
                                                        $req_lastPosts->closeCursor();
                                                        ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        $req_topics->closeCursor();
                                        ?>
                                    </div>
                                </div>
                            </article>
                            
                        </section>
                    </div>
                    <div class="col-xs-12 col-md-5 col-lg-4 col-xl-3 d-md-block">
                        <div class="d-none d-md-block">
                            <?php include('includes/search.php'); ?>
                            <?php include('includes/signin.php'); ?>
                            <?php include('includes/sidebutton2.php'); ?>
                        </div>
                        <?php include('includes/last-posts.php'); ?>
                        <?php include('includes/last-active-user.php'); ?>
                    </div>
                </div>
            </div>
        </main>
        <?php include('includes/footer.php'); ?>
        <div id="scroll-up-btn" class="d-flex justify-content-center align-items-center" data-toggle="tooltip" data-placement="top" title="Go back to the top">
            <a href="#top"><i class="fas fa-arrow-up scroll-up-btn__icon"></i></a>
        </div>

        <script type="text/javascript" src="js/scroll-up-btn.js"></script>
    </body>
</html>
