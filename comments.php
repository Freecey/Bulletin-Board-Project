<?php require('includes/connect.php') ?>
<?php

    // Creation de la pagination
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $currentPage = (int) strip_tags($_GET['page']);
    }else{
        $currentPage = 1;
    }


    $query = $conn->prepare('SELECT count(*) AS nb_posts FROM posts');
    $query->execute();
    $result = $query->fetch();
    $nb_posts = (int) $result['nb_posts'];

    $byPage = 20;
    $pages = ceil($nb_posts / $byPage);

    $firstElemByPage = ($currentPage * $byPage) - $byPage;
    $query = $conn->prepare('SELECT * FROM posts ORDER BY post_date DESC LIMIT :firstElementByPage, :byPage');
    $query->bindValue(':firstElementByPage', $firstElemByPage, PDO::PARAM_INT);
    $query->bindValue(':byPage', $byPage, PDO::PARAM_INT);

    $query->execute();
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);


?>

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
                                    <a href="#" class="btn btn-primary btn-rounded">Post a reply</a>
                                    <div class="input-group">
                                        <input type="text" class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">$</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <nav>
                                        <ul class="pagination">
                                            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                                                <a href="./comments.php?id=3&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                                            </li>
                                            <?php for($page = 1; $page <= $pages; $page++): ?>
                                            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                                    <a href="./comments.php?id=3&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                                                </li>
                                            <?php endfor ?>
                                            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                                                <a href="./comments.php?id=3&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="row bg-light rounded-lg pb-3">
                                <div class="col">
                                    <?php
                                        $req_posts = $conn->query('SELECT * FROM posts WHERE post_topic=' . $_GET['id']);
                                            if (!$req_posts) {
                                                echo 'Unable to display the topics' .mysql_error();
                                            } else {
                                                while($post = $req_posts->fetch()) {
                                    ?>
                                    <div class="card border-0 shadow-sm rounded-lg mt-3">
                                        <div class="card-body row">
                                            <div class="col-2 text-center">
                                                <img src="assets/topics/003-dvd.svg" alt="" width="128 " height="128">
                                                <p><strong>Username</strong></p>
                                                <p>Posts: <strong>43</strong></p>
                                            </div>
                                            <div class="col-10">
                                                <p class="text-secondary">
                                                <?php
                                                    $date = new DateTime($post['post_date']);
                                                    echo $date->format('D M d, Y H:m:s');
                                                ?></p>
                                                <p><?= htmlspecialchars($post['post_content']) ?></p>
                                                <hr>
                                                <p>This is my signature</p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                            }
                                        }
                                        $req_posts->closeCursor();
                                    ?>
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