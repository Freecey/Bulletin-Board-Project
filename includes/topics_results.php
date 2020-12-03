<?php include 'req_search.php';?>

<?php if ($search_done == true) { ?>

    <?php if ($response -> rowCount() > 0) { ?>
    <ul>
    <?php while($results_topics = $response->fetch()) { ?>
        <li><b><a href="comments.php?id=<?php echo $results_topics['topic_id'];?>"><?= $results_topics['topic_subject'] ?></a></b>
        <?php $select2 = $conn->prepare("SELECT COUNT(*) 
                                                        FROM posts
                                                        WHERE post_topic = $results_topics[topic_id] AND post_deleted=0 AND post_exclsearch=0");
                                    //$select2->setFetchMode(PDO::FETCH_ASSOC);
                                    // echo $select2;
                                    $select2->execute();
                                    $data2=$select2->fetchColumn();
                                    echo ' ( ' . $data2 . ' posts)';
        ?>
        <br>
            <small><?= $results_topics['topic_date'] ?></small>
        </li>
    <?php } ?> 
    </ul>

    <?php } else { ?>
    <ul>
        <li>No results found ...</li>
    </ul>
    <?php } ?>
<?php } ?>