<?php require 'connect.php'; 
    session_start();
    $topic_id = $_SESSION['topic_id'];

    $new_post_msg = $conn -> prepare('SELECT * FROM posts WHERE post_topic = ?');
    $new_post_msg -> execute(array($topic_id));

    if (isset($_POST['new_post_submit'], $_POST['new_post'])) {
        $new_post_msg = htmlspecialchars($_POST['new_post']);
        if (isset($_SESSION['user_id'])) {
            if (!empty($new_post_msg)) {
                $insert = $conn -> prepare('INSERT INTO posts(post_topic, post_content, post_by,  post_date)VALUES( ?, ?, ?, NOW())');
                $insert ->execute(array($topic_id, $new_post_msg, $_SESSION['user_id'],));
                include "topics_mail.php";
                $post_alert = "Your message has been posted.";
                header('Location: ../comments.php?id='. $_SESSION['topic_id']);
            }else{ 
            $post_alert = "Your message cannot be empty.";
            }      
        }else{ 
            $post_alert = "Please login or register.";
        }
    }
?>