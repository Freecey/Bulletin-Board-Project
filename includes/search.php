
<?php
    include 'connect.php';

    $response = $conn->query('SELECT *  FROM topics, users, boards, posts');

    if (isset($_GET['search']) AND !empty($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);
        $response = $conn->query('SELECT * FROM topics, users, boards, posts WHERE * LIKE "%'.$search.'%"');

    }
?>


<form action="" methode="GET" >
    <input type="text" name="search" placeholder="Search...">
    <button type="submit" name="submit"><i class="fas fa-search"></i></button>
</form>

<?php
    while ($datas = $response->fetch())
    {
        echo $datas['topic_id'];
        echo $datas['topic_subject'];
        echo $datas['topic_date'];
        echo $datas['topic_board'];
        echo $datas['post_id'];
        echo $datas['post_content'];
        echo $datas['post_date'];
    }

    $response->closeCursor();
?>