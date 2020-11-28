<?php
    include 'connect.php';

    $search_done = false;

    if (isset($_GET['search']) AND !empty($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);
        $response = $conn->query('SELECT * FROM topics WHERE topic_subject LIKE "%'.$search.'%"');
        $response_two = $conn->query('SELECT * FROM posts WHERE post_content LIKE "%'.$search.'%"');
        $search_done = true;
    }
?>
