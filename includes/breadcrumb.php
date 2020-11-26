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

// This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
function breadcrumbs($separator = ' &lsaquo; ', $home = '<i class="fas fa-home"></i> Home') {
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    $key = array_search('comments.php', $path);
    if ($key) {
        $topics = getTopicId();
        while($topic = $topics->fetch()) {
            array_splice($path, $key-1, 0, $topic['topic_subject'].'='. $topic['topic_id']);
        }
    }
    $base = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    $breadcrumbs = Array("<a href=\"$base\">$home</a>");
    $pathkeys = array_keys($path);
    $last = end($pathkeys);

    foreach ($path AS $x => $crumb) {
        $piece = stripos($crumb, '=');
        if($piece !== false) {
            $crumb_array = explode('=', $crumb);
            $crumb = 'topics.php?id='. $crumb_array[1];
            $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb_array[0]));
        } else {
            $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));
        }
    
        if ($x != $last) {
            $breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
        }
        else {
            $breadcrumbs[] = $title;
        }
    }
    return implode($separator, $breadcrumbs);
}

?>

<nav>
    <ol class="breadcrumb bg-white mt-2">
        <li class="breadcrumb-item"><a href="#"><?= breadcrumbs() ?></a></li>
    </ol>
</nav>