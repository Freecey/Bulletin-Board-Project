<?php require('../includes/admin/session_userlvl_modo.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php $PAGE_TITLE; ?></title>
        <link rel="stylesheet" href="../css/main.css" type="text/css">
        <?php if($_SESSION[user_level]==666) {echo '<link rel="stylesheet" href="/css/666.css" type="text/css">';} ?>
        <script src="https://kit.fontawesome.com/ad9205c9ea.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    </head>
    <body>
        <?php session_start(); ?>
        <?php include('../includes/header.php'); ?>
        <main class="pr-sm-5 pl-sm-5">
            <div class="container-fluid shadow rounded-lg" id="content">
                <div class="row">
                    <div class="col-12">
                        <?php // include('../includes/admin/breadcrumb.php'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-10 col-md-9">
                        <?php include('../includes/admin/admin_view.php'); ?>
                        <?php include('../includes/admin/admin_content.php'); ?>


                    </div>
                    <div class="col-xl-2 col-md-3 d-none d-md-block">
                        <?php include('../includes/search.php'); ?>
                        <?php include('../includes/admin/sidemenu.php'); ?>
                    </div>
                </div>
            </div>
        </main>
        <?php include('../includes/footer.php'); ?>
        <div id="scroll-up-btn" class="d-flex justify-content-center align-items-center" data-toggle="tooltip" data-placement="top" title="Go back to the top">
            <a href="#top"><i class="fas fa-arrow-up scroll-up-btn__icon"></i></a>
        </div>

        <script type="text/javascript" src="/js/scroll-up-btn.js"></script>
    </body>
</html>