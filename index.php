<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>.::Bulletin Board::.</title>
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <script src="https://kit.fontawesome.com/ad9205c9ea.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    </head>
    <body>
        <?php include('includes/connect.php') ?>
        <?php include('includes/header.php'); ?>
        <div class="container shadow rounded-lg" id="content">
            <div class="row">
                <div class="col-12">
                    <?php include('includes/breadcrumb.php'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <?php include('includes/boards.php'); ?>
                </div>
                <div class="col-3">
                    <?php include('includes/search.php'); ?>
                    <?php include('includes/signin.php'); ?>
                </div>
            </div>
        </div>
        <?php include('includes/footer.php'); ?>
        <div id="scroll-up-btn" class="d-flex justify-content-center align-items-center" data-toggle="tooltip" data-placement="top" title="Go back to the top">
            <a href="#top"><i class="fas fa-arrow-up scroll-up-btn__icon"></i></a>
        </div>

        <script type="text/javascript" src="scroll-up-btn.js"></script>
    </body>
</html>