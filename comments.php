<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>.::Bulletin Board::.</title>
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <script src="https://kit.fontawesome.com/ad9205c9ea.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
        <script type="text/javascript" src="js/functions.js"></script>
    </head>
    <body>
        <?php include('includes/connect.php') ?>
        <?php include('includes/header.php'); ?>
        <main class="pr-sm-5 pl-sm-5">
            <div class="container-fluid shadow rounded-lg" id="content">
                <div class="row">
                    <div class="col-12">
                        <?php include('includes/breadcrumb.php'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-10 col-md-9">
                        <section id="comments" class="mb-3 pl-5">
                            <div class="row">
                                <div class="col">
                                    <h2>Topic Read</h2>
                                    <div class="alert alert-danger" role="alert">
                                        Forum rules
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between">
                                <div class="col">
                                    <a id="btnPostReply" class="btn btn-primary btn-rounded">Post a reply</a>
                                    <?php include('includes/new-post.php'); ?>
                                </div>
                                <div class="col">
                                    1 post • Page 1 of 1
                                </div>
                            </div>
                            <div class="row bg-light rounded-lg pb-3">
                                <div class="col">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2 text-center">
                                                <img src="assets/topics/003-dvd.svg" alt="" width="48" height="48">
                                                <p><strong>Username</strong></p>
                                                <p>Posts: <strong>43</strong></p>
                                            </div>
                                            <div class="col-10">
                                                <p class="text-secondary">Sun Oct 09, 2020 6:11pm</p>
                                                <p>This a hot topic that has the read icon. Very cool</p>
                                                <hr>
                                                <p>This is my signature</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-2 col-md-3 d-none d-md-block">
                        <?php include('includes/search.php'); ?>
                        <?php include('includes/signin.php'); ?>
                    </div>
                </div>
            </div>
        </main>
        <?php include('includes/footer.php'); ?>
        <div id="scroll-up-btn" class="d-flex justify-content-center align-items-center" data-toggle="tooltip" data-placement="top" title="Go back to the top">
            <a href="#top"><i class="fas fa-arrow-up scroll-up-btn__icon"></i></a>
        </div>

        <script type="text/javascript" src="scroll-up-btn.js"></script>
    </body>
</html>