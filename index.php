<?php include 'includes/1head.php'; ?>
<?php require_once './includes/function/functions.php'; ?>
    <body>
        <?php include('includes/header.php'); ?>
        <main class="pr-sm-5 pl-sm-5">
            <div class="container-fluid shadow rounded-lg" id="content">
                <div class="row">
                    <div class="col-12">
                        <?php include('includes/breadcrumb.php'); ?>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-xl-9 col-md-8">
 <?php include('includes/announce_toinclude.php'); ?>
                        <section class="my-4" id="boards">
                            
                            <article class="container-fluid">

                               
                                <div class="row">
                                    <div class="col">
                                        <h2>Category One</h2>
                                    </div>
                                </div>
                                <div class="row bg-light rounded-lg pb-3">
                                    <?php
                                    $req_boards = getBoards();
                                    while ($board = $req_boards->fetch())
                                    { 
                                    ?>
                                        <div class="col-lg-6 col-xl-4 mt-3">
                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col-auto">
                                                            <img src="<?php echo $board['board_image']; ?>" alt="" width="48" height="48">
                                                        </div>
                                                        <div class="col ml-2">
                                                            <p class="h6 mb-1"> 
                                                                <?php 
                                                                    if ($board['board_status'] == 1) {
                                                                        echo '<a href="./topics.php?id=' . $board['board_id'] . '">' . $board['board_name'] . '</a>';
                                                                    } 
                                                                    elseif ($board['board_status'] == 2) {
                                                                        echo '<a href="./board_is_secret.php?id=' . $board['board_id'] . '">' . $board['board_name'] . '</a>';
                                                                    }
                                                                ?>
                                                            </p>
                                                            <p class="small text-secondary"> 
                                                                <?php echo $board['board_description']; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row pl-3 text-secondary">
                                                        <div class="col-3 pl-0">
                                                            <p class="small mb-0">
                                                                <strong>
                                                                    <?= getTopics($board['board_id'])->rowCount(); ?>
                                                                </strong>
                                                            </p>
                                                            <p class="small">Topics</p>
                                                        </div>
                                                        <div class="col-3 pl-0">
                                                            <p class="small mb-0">
                                                                <strong>
                                                                <?php 
                                                                    $posts = getAllPostsFromBoard($board['board_id']);
                                                                    echo $posts->rowCount();
                                                                ?>
                                                                </strong>
                                                            </p>
                                                            <p class="small">Posts</p>
                                                        </div>
                                                        <div class="col pl-0">
                                                            <p class="small mb-0">
                                                                <?php
                                                                    $req_posts = getLastPostsDate($board['board_id']);
                                                                    $post = $req_posts->fetch();
                                                                    $date = new DateTime($post['post_date']);
                                                                    echo $date->format('D M d');
                                                                ?>
                                                            </p>
                                                            <p class="small">Last post</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    <?php
                                    }
                                    $req_boards->closeCursor();
                                    ?>
                                </div>
                            </article>
                            
                        </section>

                    </div>
                    <div class="col-xl-3 col-md-4 d-none d-md-block">
                        <?php include('includes/search.php'); ?>
                        <?php include('includes/signin.php'); ?>
                        <?php include('includes/sidebutton2.php'); ?>
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

        <script type="text/javascript" src="scroll-up-btn.js"></script>
        
    </body>
</html>