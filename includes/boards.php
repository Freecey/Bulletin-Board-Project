<?php
$req_boards = $conn->query('SELECT * FROM boards ORDER BY board_id');
if (!$req_boards) {
    echo 'Unable to display the categories' .mysql_error();
} else {
?>

<section class="container mb-3" id="boards">
    
    <article class="container">
        <div class="row">
            <div class="col">
                <h2>Category One</h2>
            </div>
        </div>
        <div class="row bg-light rounded-lg pb-3">
            <?php
            while ($board = $req_boards->fetch())
            {
                <div class="col-lg-6 mt-3">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col-auto">
                                    <img src="<?php echo $board['board_image']; ?>" alt="" width="48" height="48">
                                </div>
                                <div class="col ml-2">
                                    <p class="h6 mb-1"><?php echo $board['board_name']?></p>
                                    <p class="small text-secondary"><?php echo $board['board_description']; ?></p>
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
                                <div class="col-3 pl-0">
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
            }
            $req_boards->closeCursor();
            ?>
        </div>
    </article>
    
</section>
<?php
}
?>
