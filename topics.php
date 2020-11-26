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
        <?php include('includes/connect.php') ?>
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
                        $req_topics = $conn->query('SELECT * FROM topics ORDER BY topic_id');
                        if (!$req_topics) {
                            echo 'Unable to display the topics' .mysql_error();
                        } else {
                        ?>

                        <section class="mb-3" id="topics">
                            
                            <article class="container-fluid">
                              
                                <div class="row">
                                    <div class="col">
                                        <h2>Topics' List</h2>
                                    </div>
                                </div>

                                <div class="alert alert-danger m-2" role="alert">
                                    Forum rules
                                </div>

                                <div class="btn-and-search row">
                                    <button class="col-2 btn btn-primary btn-block rounded-pill"> New Topic <i class="fas fa-pencil-alt"></i> </button>
                                    <div class="col-2"> <?php include('includes/search.php'); ?> </div>
                                </div>

                                <div class="container-fluid bg-light rounded-lg m-2">
                                    <div class="gradient-header row d-flex align-items-center">
                                        <div class="card-header__element col-7">
                                            <p class="h6 mb-1">Announcements</p>
                                        </div>
                                        <div class="card-header__element col-2"> <i class="fas fa-comments"></i> </div>
                                        <div class="card-header__element col-1"> <i class="far fa-eye"></i> </div>
                                        <div class="card-header__element col-2"> <i class="far fa-clock"></i> </div>
                                    </div>

                                    <div id="announce-list" class="card-body">
                                    <?php
                                        $req_announce = $conn->query('SELECT * FROM announce ORDER BY ann_id');
                                        if (!$req_announce) {
                                            echo 'Unable to display the announces' .mysql_error();
                                        } else {
                                            while ($ann = $req_announce->fetch())
                                            { 
                                            ?>
                                            <div class="card border-0 m-1">
                                                <div class="ann-list-item card-body w-100 d-flex align-items-center">
                                                    <div class="col-7">
                                                        <?php echo '<a href="./announce-content.php?id=' . $ann['ann_id'] . '">' . $ann['ann_subject'] . '</a>'?>
                                                    </div>
                                                    <div class="ann-details col-2">
                                                        <!-- COMMENTS -->
                                                        <?php
                                                            $req_posts = $conn->query("SELECT post_id FROM posts WHERE post_topic =" .  $ann['ann_id']);
                                                            $posts_cnt = $req_posts->rowCount();
                                                            echo $posts_cnt;
                                                            $req_posts->closeCursor();
                                                        ?>
                                                    </div>
                                                    <div class="ann-details col-1">
                                                        <!-- VIEWS -->
                                                        486
                                                    </div>
                                                    <div class="ann-details col-2">
                                                        <!-- DATE -->
                                                        <div class="d-flex">
                                                            <div class="font-weight-light">by</div>
                                                            <strong> 
                                                                <?php 
                                                                    $req_user = $conn->query("SELECT user_name FROM users WHERE user_id =" .  $ann['ann_by']); 
                                                                    while($user = $req_user->fetch()) {
                                                                        echo $user['user_name'];
                                                                    }
                                                                    $req_user->closeCursor();
                                                                ?>
                                                            </strong>
                                                        </div>
                                                        <div class="font-weight-light">
                                                            <?php
                                                                $annDate = new DateTime($ann['ann_date']);
                                                                echo $annDate->format('D M d, H:i');
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                        }
                                        $req_announce->closeCursor();
                                        ?>
                                    </div>
                                </div>

                                <div class="container-fluid bg-light rounded-lg m-2 pb-3">
                                    <div class="gradient-header row d-flex">
                                        <div class="col-7">
                                            <p class="h6 mb-1">Topics' List</p>
                                        </div>
                                        <div class="col-2"> <i class="fas fa-comments"></i> </div>
                                        <div class="col-1"> <i class="far fa-eye"></i> </div>
                                        <div class="col-2"> <i class="far fa-clock"></i> </div>
                                    </div>

                                    <div id="topics-list" class="card-body">
                                        <?php
                                        while ($topic = $req_topics->fetch())
                                        { 
                                        ?>
                                        <div class="card border-0 m-1">
                                            <div class="topic-list-item card-body w-100 d-flex align-items-center">
                                                <div class="col-7">
                                                    <?php echo '<a href="./comments.php?id=' . $topic['topic_id'] . '">' . $topic['topic_subject'] . '</a>'?>
                                                </div>
                                                <div class="topic-details col-2">
                                                    <!-- COMMENTS -->
                                                    <?php
                                                        $req_posts = $conn->query("SELECT post_id FROM posts WHERE post_topic =" .  $topic['topic_id']);
                                                        $posts_cnt = $req_posts->rowCount();
                                                        echo $posts_cnt;
                                                        $req_posts->closeCursor();
                                                    ?>
                                                </div>
                                                <div class="topic-details col-1">
                                                    <!-- VIEWS -->
                                                    410
                                                </div>
                                                <div class="topic-details col-2">
                                                    <!-- DATE -->
                                                    <div class="d-flex">
                                                        <div class="font-weight-light">by</div>
                                                        <strong class="text-danger"> 
                                                            <?php 
                                                                $req_user = $conn->query("SELECT user_name FROM users WHERE user_id =" .  $topic['topic_by']); 
                                                                while($user = $req_user->fetch()) {
                                                                    echo $user['user_name'];
                                                                }
                                                                $req_user->closeCursor();
                                                            ?>
                                                        </strong>
                                                    </div>
                                                    <div class="font-weight-light">
                                                        <?php
                                                            $topicDate = new DateTime($topic['topic_date']);
                                                            echo $topicDate->format('D M d, H:i');
                                                        ?>
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
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-xl-3 col-md-4 d-none d-md-block">
                        <?php include('includes/search.php'); ?>
                        <?php include('includes/signin.php'); ?>
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