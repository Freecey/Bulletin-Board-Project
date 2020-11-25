<?php

// This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
function breadcrumbs($separator = ' &lsaquo; ', $home = '<i class="fas fa-home"></i> Home') {
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    $key = array_search('comments.php', $path);
    if ($key) {
        echo $key;
        echo 'comments trouvé';
        array_splice($path, $key-1, 0, 'topics.php');
    }
    echo
    $base = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    $breadcrumbs = Array("<a href=\"$base\">$home</a>");
    $pathkeys = array_keys($path);
    $last = end($pathkeys);

    foreach ($path AS $x => $crumb) {
        $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));

        if ($x != $last)
            $breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
        else
            $breadcrumbs[] = $title;
    }
    return implode($separator, $breadcrumbs);
}

?>

<nav>
    <ol class="breadcrumb bg-white mt-2">
        <li class="breadcrumb-item"><a href="#"><?= breadcrumbs() ?></a></li>
    </ol>
</nav>