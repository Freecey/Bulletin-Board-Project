<?php

function getTopicId() { 
    require('includes/connect.php');
    $query = $conn->query('SELECT
            topics.topic_id,
            topics.topic_subject,
            posts.post_topic
        FROM
            topics
        LEFT JOIN
            posts
        ON
            topics.topic_id = posts.post_topic
        WHERE
            post_topic='. $_GET['id'] .'
        LIMIT 1'
    );
    return $query;
}

?>