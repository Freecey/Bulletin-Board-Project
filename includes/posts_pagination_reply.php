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
<div class="d-flex justify-content-between mt-4">
    <div class="d-flex justify-content-start">
        <div class="mr-3">
            <!-- <a href="#" class="btn btn-primary btn-rounded">Post a reply <i class="fas fa-long-arrow-alt-left"></i></a> -->
        </div>
        <div>
            <?php include('includes/search.php') ?>
        </div>
    </div>
    <div>
        <nav>
            <ul class="pagination">
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="./comments.php?id=<?= $_GET['id'] ?>&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                </li>
                <?php for($page = 1; $page <= $pages; $page++): ?>
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="./comments.php?id=<?= $_GET['id'] ?>&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                    <a href="./comments.php?id=<?= $_GET['id'] ?>&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                </li>
            </ul>
        </nav>
    </div>
</div>