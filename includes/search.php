
<?php
    include 'connect.php';

    $response = $conn->query('SELECT topic_subject  FROM topics, users, boards, posts');

    if (isset($_GET['search']) AND !empty($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);
        $response = $conn->query('SELECT topic_subject FROM topics, users, boards, posts WHERE topic_subject LIKE "%'.$search.'%"');
    }
?>


<form action="" methode="GET" >
    <input type="text" name="search" placeholder="Search..."  class="form-control form-rounded">
</form>


<ul>
    <?php while ($datas = $response->fetch()){ ?>
        <li><?= $datas['topic_subject'] ?></li>

    <?php } ?>
</ul>
