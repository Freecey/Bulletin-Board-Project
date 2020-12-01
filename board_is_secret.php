<?php include 'includes/1head.php'; ?>
<?php require_once './includes/function/functions.php'; ?>
    <body>
        <?php 
            include('includes/header.php'); 
            $board = getBoard($_GET['id'])->fetch();//prend l'id de mon url, et chope le board en question
        ?>
        <main class="pr-sm-5 pl-sm-5">
            <div class="container-fluid shadow rounded-lg" id="content">
                <div class="row">
                    <div class="col-12">
                        <?php include('includes/breadcrumb.php'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-9 col-md-8">
                        <?php 
                            if ($_SERVER['REQUEST_URI'] == "/Bulletin-Board-Project/board_is_secret.php?id=" . $board['board_id'] . "ilovepizzawithananas") {
                                header("Location: topics.php?id=". $board['board_id']);
                            } else {
                            ?>
                            <div class="row">
                                <div class="col">
                                    <img src="https://i.pinimg.com/originals/57/ca/61/57ca6168f9eaaf6ce368dd79e99c709d.png" alt="" width="500">
                                </div>
                                <div class="col d-flex flex-column justify-content-center">
                                    <h2 class="font-weight-bold">Ooooooooh crap!</h2>
                                    <h4>This board is secret!!</h4>
                                    <h4>If only you knew the password...</h4>
                                </div>
                            </div>
                            <?php 
                            } 
                        ?>   
                    </div>
                    <div class="col-xl-3 col-md-4 d-none d-md-block">
                        <?php include('includes/search.php'); ?>
                        <?php include('includes/signin.php'); ?>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include('includes/footer.php'); 
        ?>
        <div id="scroll-up-btn" class="d-flex justify-content-center align-items-center" data-toggle="tooltip" data-placement="top" title="Go back to the top">
            <a href="#top"><i class="fas fa-arrow-up scroll-up-btn__icon"></i></a>
        </div>

        <script type="text/javascript" src="scroll-up-btn.js"></script>
        
    </body>
</html>