<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>.::Bulletin Board::.</title>
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <script src="https://kit.fontawesome.com/ad9205c9ea.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    </head>
    <body>
        <?php session_start(); ?>
        <?php include('includes/connect.php'); ?>
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
                    <?php
                        $req_boards = $conn->query('SELECT * FROM boards ORDER BY board_id');
                        if (!$req_boards) {
                            echo 'Unable to display the categories' .mysql_error();
                        } else {
                        ?>

                        <section class="mb-3" id="boards">
                            
                            <article class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <h2>Category One</h2>
                                    </div>
                                </div>
                                <div class="row bg-light rounded-lg pb-3">
                                    <?php
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
                                                            <?php echo '<a href="./topics.php?id=' . $board['board_id'] . '">' . $board['board_name'] . '</a>'?>
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
                                                                <?php
                                                                    $req_topics = $conn->query("SELECT topic_id FROM topics WHERE topic_board =" .  $board['board_id']);
                                                                    $topics_cnt = $req_topics->rowCount();
                                                                    echo $topics_cnt;
                                                                    $req_topics->closeCursor();
                                                                ?>
                                                            </strong>
                                                        </p>
                                                        <p class="small">Topics</p>
                                                    </div>
                                                    <div class="col-3 pl-0">
                                                        <p class="small mb-0">
                                                            <strong>
                                                            <?php
                                                                $req_posts = $conn->query("SELECT post_id FROM posts WHERE post_topic =" .  $board['board_id']);
                                                                $posts_cnt = $req_posts->rowCount();
                                                                echo $posts_cnt;
                                                                $req_posts->closeCursor();
                                                            ?>
                                                            </strong>
                                                        </p>
                                                        <p class="small">Posts</p>
                                                    </div>
                                                    <div class="col pl-0">
                                                        <p class="small mb-0">
                                                            <?php
                                                                $req_posts = $conn->query("SELECT post_date FROM posts WHERE post_topic =" .  $board['board_id'] . " ORDER BY post_date DESC");
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
                        <?php
                        }
                        ?>

                    </div>
                    <div class="col-xl-3 col-md-4 d-none d-md-block">
                        <?php include('includes/search.php'); ?>
                        <?php include('includes/signin.php'); ?>
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