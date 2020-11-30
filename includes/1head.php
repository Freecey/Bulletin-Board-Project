<?php 
include('includes/connect.php');
include('includes/getdata/sitesettingGLOB.php'); ?>
    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>.::Bulletin Board::.</title>
        <title><?php echo $SITENAME . '   - ' . $PAGENAME; ?></title>
        <?php
        session_start();
        include('includes/connect.php');
            if (true) {
                $req_theme = $conn->prepare('SELECT user_theme FROM users WHERE user_id=?'); //
                $req_theme->execute([$_SESSION['user_id']]);
                $theme = $req_theme->fetch();
                if ($theme['user_theme'] == 0) {
                    echo '<link rel="stylesheet" href="css/main.css" type="text/css"/>';
                } elseif ($theme['user_theme'] == 1) {
                    echo '<link rel="stylesheet" href="css/dark.css" type="text/css"/>';
                } elseif ($theme['user_theme'] == 666) {
                    echo '<link rel="stylesheet" href="css/666.css" type="text/css">';
                }
            } else {
                // echo '<link rel="stylesheet" href="css/main.css" type="text/css"/>';
            }
        ?>
        <script src="https://kit.fontawesome.com/ad9205c9ea.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/12.0.2/markdown-it.min.js" integrity="sha512-7VN0JcGJWL+i8LXzTvbROqUSPzZIu8Fp6GWpkVwtHwrgWwY8CrbZgyHA2YpNhAASQNrYqGYoI2HusCqV+S2xnQ==" crossorigin="anonymous"></script>
    </head>