<?php

function getBoards() {
    require('includes/connect.php');
    $query = $conn->prepare('SELECT * FROM boards ORDER BY board_id');
    $query->execute();
    return $query;
}

function getTopics($id) {
    require('includes/connect.php');
    $query = $conn->prepare("SELECT * FROM topics WHERE topic_board = ?");
    $query->execute(array($id));
    return $query;
}

function getAnnounces() {
    require('includes/connect.php');
    $query = $conn->prepare("SELECT * FROM announce WHERE ann_status = 1");
    $query->execute();
    return $query;
}

function getPosts($id) {
    require('includes/connect.php');
    $query = $conn->prepare('SELECT * FROM posts WHERE post_topic = ?');
    $query->execute(array($id));
    return $query;
}

function getAllPostsFromBoard($board_id) {
    require('includes/connect.php');
    // $topics = getTopics($board_id);
    // $arr = [];
    // while($topic = $topics->fetch()) {
    //     array_push($arr, $topic['topic_id']);
    // }
    
    // $sqlArr = implode(',', $arr);
    // echo $sqlArr;
    $query = $conn->prepare('SELECT post_id FROM posts WHERE post_topic IN (SELECT topic_id FROM topics WHERE topic_board = :topics)');
    $query->execute(array(':topics' => $board_id));
    return $query;
}

function getLastPost($topicId) {
    require('includes/connect.php');
    $query = $conn->prepare('
        SELECT
            users.user_name,
            users.user_id,
            posts.post_date
        FROM
            users
        LEFT JOIN
            posts
        ON
            posts.post_by = users.user_id
        WHERE
            post_topic = ?
        ORDER BY
            post_date DESC
        LIMIT 1
    ');
    $query->execute(array($topicId));
    return $query;
}

function getLastPostsDate($id, $orderBy) {
    require('includes/connect.php');
    $query = $conn->prepare('SELECT * FROM posts WHERE post_topic = ? ORDER BY ? DESC');
    $query = $conn->prepare('SELECT
            topics.topic_id,
            posts.post_date
        FROM
            topics
        LEFT JOIN
            posts
        ON
            topics.topic_id = posts.post_topic
        WHERE
            post_topic= ?
        ORDER BY ? DESC'
    );
    $query->execute(array($id, $orderBy));
    return $query;
}

function getLastAnnouce() {
    require('includes/connect.php');
    $query = $conn->prepare('
        SELECT
            announce.ann_date,
            users.user_name,
            users.user_id
        FROM
            users
        LEFT JOIN
            announce
        ON
            announce.ann_by = users.user_id
        ORDER BY
            ann_date DESC
        LIMIT 1
    ');
    $query->execute();
    return $query;
}

function getTopicId($id) { 
    require('includes/connect.php');
    $query = $conn->prepare('SELECT
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
            post_topic= ?
        LIMIT 1'
    );
    $query->execute(array($id));
    return $query;
}

function getBreadcrumbs() {
    require('includes/connect.php');
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $currentPage = (int) strip_tags($_GET['page']);
    }else{
        $currentPage = 1;
    }

    $byPage = 20;
    $firstElemByPage = ($currentPage * $byPage) - $byPage;

    
    $query = $conn->prepare('SELECT
            posts.post_id,
            posts.post_content,
            posts.post_date,
            posts.post_by,
            posts.post_deleted,
            users.user_name,
            users.user_gravatar,
            users.user_sign,
            users.user_id
        FROM
            posts
        LEFT JOIN
            users
        ON
            posts.post_by = users.user_id
        WHERE
            post_topic= :topic_id
        ORDER BY
            posts.post_date DESC
        LIMIT
            :firstElementByPage, :byPage'
    );

    $query->bindValue(':topic_id', $_GET['id'], PDO::PARAM_INT);
    $query->bindValue(':firstElementByPage', $firstElemByPage, PDO::PARAM_INT);
    $query->bindValue(':byPage', $byPage, PDO::PARAM_INT);
    $query->execute();
    return $query;
}

    function incrementTopicViews() {
        require('includes/connect.php');
        $query = $conn->prepare("UPDATE topics SET topic_views = topic_views + 1 WHERE topic_id = :topicId");
        $query->execute(array(
            'topicId' => $_GET['id']
        ));
        return $query;
    }



?>