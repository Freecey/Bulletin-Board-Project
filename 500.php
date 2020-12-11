<!DOCTYPE html>

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
                    <div class="col pt-4">
                        <section class="jumbotron bg-light" id="jumbo">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h1 class="display-4">Shoot!</h1>
                                <p class="lead">Well, this is unexpected...</p>
                                <hr class="my-4">
                                <p>Error code: 500</p>
                                <p>An error has occured and we're working to fix the problem! We'll be up and running shortly.</p>
                            </div>
                            <div class="col">
                                <img class="img-fluid" src="./assets/500/kitten_busy.jpg" alt="Kitten Busy">
                            </div>
                        </div>
                            
                        </section>

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