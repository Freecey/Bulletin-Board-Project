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
        <main class="pr-sm-5 pl-sm-5">
            <div class="container-fluid shadow rounded-lg" id="content">
                <div class="row">
                    <div class="col-12">
                        <?php include('includes/breadcrumb.php'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-10 col-md-9">
                    <?php
                        $req_topics = $conn->query('SELECT * FROM topics ORDER BY topic_id');
                        if (!$req_topics) {
                            echo 'Unable to display the topics' .mysql_error();
                        } else {
                        ?>

                        <section class="mb-3" id="topics">
                            
                            <article class="container-fluid">
                              
                                <div class="row">
                                    <div class="col">
                                        <h2>Create New Topic</h2>
                                    </div>
                                </div>

                                <div class="alert alert-danger m-2" role="alert">
                                <h4>Forum rules:</h4>
                                    <ul>
                                        <li>No Spam / Advertising / Self-promote in the forums. ...</li>
                                        <li>Do not post copyright-infringing material. ...</li>
                                        <li>Do not post “offensive” posts, links or images. ...</li>
                                        <li>Do not cross post questions. ...</li>
                                        <li>Do not PM users asking for help. ...</li>
                                        <li>Remain respectful of other members at all times.and for posting add :</li>
                                        <li>Please use SEARCH first!</li>
                                        <li>Be DESCRIPTIVE and Don’t use “stupid” topic names</li>
                                    </ul>
                                </div>


<!-- 
                                <div class="btn-and-search row">
                                    <button class="col-2 btn btn-primary btn-block rounded-pill"> Create New Topic<i class="fas fa-pencil-alt"></i> </button>
                                </div> -->
                                
                                <?php include('./includes/topic/topiccreat.php') ?>
                                <?php include('./includes/topic/topiccreatform.php') ?>



                                <!-- <div class="container-fluid bg-light rounded-lg m-2 pb-3">
                                    <div class="gradient-header row d-flex">
                                        <div class="col-7">
                                            <p class="h6 mb-1">Topics' List</p>
                                        </div>

                                    </div>

                                    <div id="topics-list" class="card-body">
                                        <?php
                                        while ($topic = $req_topics->fetch())
                                        { 
                                        ?>
                                        <div class="card border-0 m-1">
                 
                                        </div>
                                        <?php
                                        }
                                        $req_topics->closeCursor();
                                        ?>
                                    </div>
                                </div> -->
                            </article>
                            
                        </section>
                        <?php
                        }
                        ?>
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