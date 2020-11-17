<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>.::Bulletin Board::.</title>
        <link rel="stylesheet" href="css/main.css">
        <script src="https://kit.fontawesome.com/ad9205c9ea.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container-fluid">
            <?php include('includes/header.php'); ?>
        </div>
        <div class="container">
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
        <div class="container-fluid">
            <?php include('includes/footer.php'); ?>
        </div>
        

    </body>
</html>