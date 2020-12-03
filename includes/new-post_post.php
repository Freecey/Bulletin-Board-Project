<?php require 'connect.php'; 
    session_start();
    $topic_id = $_SESSION['topic_id'];

    $new_post_msg = $conn -> prepare('SELECT * FROM posts WHERE post_topic = ?');
    $new_post_msg -> execute(array($topic_id));


    $select_boardid = $conn->prepare("SELECT topic_board FROM topics WHERE topic_id = $topic_id LIMIT 1");
    $select_boardid->setFetchMode(PDO::FETCH_ASSOC);
    $select_boardid->execute();
    $OnBoard_ID=$select_boardid->fetch();
    $OnBoard_ID =  $OnBoard_ID[topic_board];
    $select_boardstatus = $conn->prepare("SELECT board_status FROM boards WHERE boards.board_id = $OnBoard_ID LIMIT 1");
    $select_boardstatus->setFetchMode(PDO::FETCH_ASSOC);
    $select_boardstatus->execute();
    $Board_Status1=$select_boardstatus->fetch();
        
    if($Board_Status1[board_status] == 2){
        $ADD_post_exclsearch = 1;
    }else{
        $ADD_post_exclsearch = 0;
    }

    if (isset($_POST['new_post_submit'], $_POST['new_post'])) {
        $new_post_msg = htmlspecialchars($_POST['new_post']);
        if (isset($_SESSION['user_id'])) {
            if (!empty($new_post_msg)) {
                $insert = $conn -> prepare('INSERT INTO posts(post_topic, post_content, post_by, post_exclsearch,  post_date)VALUES( ?, ?, ?, ?, NOW())');
                $insert ->execute(array($topic_id, $new_post_msg, $_SESSION['user_id'], $ADD_post_exclsearch,));
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