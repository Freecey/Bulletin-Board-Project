<?php include 'includes/1head.php'; ?>
    <head>
        <script src="https://kit.fontawesome.com/ad9205c9ea.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    </head>
    <body>
        <?php session_start(); ?>
        <?php include('includes/connect.php'); ?>
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

                        <section class="jumbotron bg-light" id="jumbo">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h1 class="display-4">Mhmmm</h1>
                                <p class="lead">It looks like you are as lost as this kitten.</p>
                                <hr class="my-4">
                                <p>But don't be afraid little baby, we have a button just below to help you find your way.</p>
                                <p class="lead">
                                    <a class="btn btn-primary btn-lg" href="./index.php" role="button">Learn more</a>
                                </p>
                            </div>
                            <div class="col">
                                <img class="img-fluid" src="./assets/404/lost_kitten.jpg" alt="">
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