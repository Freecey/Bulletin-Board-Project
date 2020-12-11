<?php

function getBoards() {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    $query = $conn->prepare('SELECT * FROM boards WHERE board_status != 0 ORDER BY board_id');
    $query->execute();
    return $query;
}

function getBoard($id) {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    $query = $conn->prepare('SELECT * FROM boards WHERE board_id = ?');
    $query->execute([$id]);
    return $query;
}

function getTopics($id) {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    if ($id == 7) {
        $query = $conn->prepare("SELECT * FROM topics WHERE topic_board = ? AND topic_status !=2 ORDER BY topic_date DESC LIMIT 5");
    } else {
        $query = $conn->prepare("SELECT * FROM topics WHERE topic_board = ? AND topic_status !=2");
    }
    $query->execute(array($id));
    return $query;
}

function getTopicsNoPIN($id) {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    if ($id == 7) {
        $query = $conn->prepare("SELECT * FROM topics WHERE topic_board = ? AND topic_status !=2 AND topic_pin = 0 ORDER BY topic_date DESC LIMIT 5");
    } else {
        $query = $conn->prepare("SELECT * FROM topics WHERE topic_board = ? AND topic_status !=2 AND topic_pin = 0");
    }
    $query->execute(array($id));
    return $query;
}

function getTopicsPin($id) {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    if ($id == 7) {
        $query = $conn->prepare("SELECT * FROM topics WHERE topic_board = ? AND topic_status !=2 AND topic_pin = 1 ORDER BY topic_date DESC LIMIT 5");
    } else {
        $query = $conn->prepare("SELECT * FROM topics WHERE topic_board = ? AND topic_status !=2 AND topic_pin = 1");
    }
    $query->execute(array($id));
    return $query;
}

function getAnnounces() {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    $query = $conn->prepare("SELECT * FROM announce WHERE ann_status = 1");
    $query->execute();
    return $query;
}

function getPosts($id) {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    $query = $conn->prepare('SELECT * FROM posts WHERE post_topic = ?');
    $query->execute(array($id));
    return $query;
}

function getGodUsers() {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    $query = $conn->prepare('SELECT * FROM users WHERE user_level = 4');
    $query->execute();
    return $query;
}

function getDevilUsers() {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    $query = $conn->prepare('SELECT * FROM users WHERE user_level = 666');
    $query->execute();
    return $query;
}

function getModUsers() {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    $query = $conn->prepare('SELECT * FROM users WHERE user_level = 2');
    $query->execute();
    return $query;
}

function getUser($id) {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    $query = $conn->prepare('SELECT * FROM users WHERE user_id = ?');
    $query->execute(array($id));
    return $query->fetch(PDO::FETCH_ASSOC);
}

function getReactions($post_id) {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    $query = $conn->prepare('SELECT * FROM postreact WHERE postreact_post = ?');
    $query->execute(array($post_id));
    return $query;
}

function addReaction($postId, $userId, $content) {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    $query = $conn->prepare('INSERT INTO postreact(postreact_post, postreact_user, postreact_content)
                                VALUES (:postId, :userId, :content)');
    $query->execute(['postId'=>$postId, 'userId'=>$userId, 'content'=>$content]);
}

function getReactionsById($react_id) {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    $query = $conn->prepare('SELECT * FROM postreact WHERE postreact_id = ?');
    $query->execute(array($react_id));
    return $query;
}

function removeReaction($reaction_id) {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    $query = $conn->prepare('DELETE FROM postreact WHERE postreact_id= ?');
    $query->execute(array($reaction_id));
    return $query;
}

function getAllPostsFromBoard($board_id) {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    $query = $conn->prepare('SELECT post_id FROM posts WHERE post_topic IN (SELECT topic_id FROM topics WHERE topic_board = :topics)');
    $query->execute(array(':topics' => $board_id));
    return $query;
}

function getLastPost($topicId) {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
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

function getLastPostId($topicId) {
    require('includes/connect.php');
    $query = $conn->prepare('SELECT
            *
        FROM
            posts
        WHERE
            post_topic = ?
        ORDER BY
            post_date DESC
        LIMIT 1
    ');
    $query->execute(array($topicId));
    return $query;
}

function getLastPostsDate($id) {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
    $query = $conn->prepare('SELECT
            topics.topic_id,
            posts.post_date
        FROM
            posts
        LEFT JOIN
            topics
        ON
            posts.post_topic = topics.topic_id
        WHERE
            post_topic
        IN
            (SELECT topic_id FROM topics WHERE topic_board = :topics)
        ORDER BY
            posts.post_date DESC
        LIMIT 1'
    );
    $query->execute(array('topics' => $id));
    return $query;
}

function getLastAnnouce() {
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
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
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
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
    require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
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
            posts.post_deleted,
            posts.post_date,
            posts.post_date_update,
            posts.post_by,
            posts.post_deleted,
            users.user_name,
            users.user_gravatar,
            users.user_image,
            users.user_imgdata,
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
        require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
        $query = $conn->prepare("UPDATE topics SET topic_views = topic_views + 1 WHERE topic_id = :topicId");
        $query->execute(array(
            'topicId' => $_GET['id']
        ));
        return $query;
    }



    function topicLock($id) {
        require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
        $query = $conn->prepare("SELECT topic_by FROM topics WHERE topic_id = ?");
        $query->execute(array($id));
    
    
        return $query;
    }
    
    
    function topicStatusLock($id) {
        require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
        echo $id;
        $query = $conn->prepare("UPDATE topics SET topic_status = 1 WHERE topic_id = ?");
        $query->execute(array('topicunlockid'=>$id));
        echo 'Je suis un sujet... 1111111111';
        
    }
    
    function topicStatusUnlock($id) {
        require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
        echo $id;
        $query = $conn->prepare("UPDATE topics SET topic_status = 0 WHERE topic_id = ?");
        $query->execute(array('topicunlockid'=>$id));
        echo 'Je suis un sujet... 00000000000000';
        
        
    }
    
    function topicStatus($id){
    
        require($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php');
        
        $query =$conn->prepare("SELECT topic_status FROM topics WHERE topic_id = ?");
        $query->execute(array($id));
        return $query;
    }
    

?>