<?php
    $req_posts = $conn->query('SELECT * FROM posts WHERE post_exclsearch = 0 ORDER BY post_date DESC LIMIT 4');
    if (!$req_posts) {
        echo 'Unable to display the last posts' .mysql_error();
    } else {
    ?>

    <section id="last-posts">
        
        <div class="container-fluid bg-light rounded-lg">
            <div class="gradient-header row">
                Last posts
            </div>

            <div class="row d-flex flex-column">
                <?php
                while ($post = $req_posts->fetch())
                {
                ?>
                    <a class="last-posts__link" href="./comments.php?id=<?= $post['post_topic'] ?>"> 
                        <div class="last-posts-list card row border-0 m-2 p-4">
                            <div class="row d-flex justify-content-between p-1">
                                <div class="last-posts-list__title">
                                    <?php 
                                        $req_topics = $conn->query("SELECT topic_subject FROM topics WHERE topic_id =" .  $post['post_topic']); 
                                        while($topic = $req_topics->fetch()) {
                                            echo $topic['topic_subject'];
                                        }
                                        $req_topics->closeCursor();
                                    ?>
                                </div>
                                <div class="last-posts-list__time font-italic"> 
                                    <?php 
                                        $currentDate = strtotime(date("Y-m-d H:i:s"));
                                        $postDate = strtotime(date($post['post_date'])); //declare my dates variable
                                        $seconds_ago = ($currentDate - $postDate); //date diffence
                                        //conditions to display the right unit
                                        if ($seconds_ago >= 31536000) {
                                            echo "Posted " . intval($seconds_ago / 31536000) . " year(s) ago";
                                        } else if ($seconds_ago >= 2419200) {
                                            echo "Posted " . intval($seconds_ago / 2419200) . " month(s) ago";
                                        } else if ($seconds_ago >= 86400) {
                                            echo "Posted " . intval($seconds_ago / 86400) . " day(s) ago";
                                        } else if ($seconds_ago >= 3600) {
                                            echo "Posted " . intval($seconds_ago / 3600) . " hour(s) ago";
                                        } else if ($seconds_ago >= 60) {
                                            echo "Posted " . intval($seconds_ago / 60) . " minute(s) ago";
                                        } else {
                                            echo "Less than a minute ago";
                                        }
                                    ?>   
                                </div>
                            </div>
                            <div class="last-posts-list__content row p-1"> 
                                <?php echo mb_strimwidth($post['post_content'], 0, 85, "...");?>
                            </div>
                        </div>
                    </a>
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