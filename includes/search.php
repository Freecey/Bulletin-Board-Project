
<?php
    include 'connect.php';

    $response = $conn->query('SELECT *  FROM topics, users, boards, posts');

    if (isset($_GET['search']) AND !empty($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);
        $response = $conn->query('SELECT * FROM topics, users, boards, posts WHERE topic_subject LIKE "%'.$search.'%"');
    }
?>


<form action="" methode="GET" >
    <input type="text" name="search" placeholder="Search...">
    <button type="submit" name="submit"><i class="fas fa-search"></i></button>
</form>


<ul>
    <?php while ($datas = $response->fetch()){ ?>
        <li><?= $datas['topic_id'] ?></li>
        <li><?= $datas['topic_subject'] ?></li>
        <li><?= $datas['topic_image'] ?></li>
        <li><?= $datas['topic_date'] ?></li>
        <li><?= $datas['topic_date_upd'] ?></li>
        <li><?= $datas['topic_board'] ?></li>
        <li><?= $datas['topic_by'] ?></li>
    <?php } ?>
</ul>
