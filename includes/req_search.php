<?php
    include 'connect.php';

    $search_done = false;


    if (isset($_GET['search']) AND !empty($_GET['search'])) {
        $words = explode(' ', $_GET['search']);
        $regex = implode('|', $words);
        $search = htmlspecialchars($_GET['search']);
        $response = $conn->query("SELECT * FROM topics WHERE topic_subject REGEXP '{$regex}' AND topics_exclsearch=0 AND topic_status !=2 ");
        $response_two = $conn->query("SELECT * FROM posts WHERE post_content REGEXP '{$regex}'AND post_exclsearch=0 AND post_deleted=0");
        $search_done = true;
    }
?>