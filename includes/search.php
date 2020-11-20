
<?php
    include 'connect.php';

    $response = $conn->query('SELECT topic_subject  FROM topics, users, boards, posts');

    if (isset($_GET['search']) AND !empty($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);
        $response = $conn->query('SELECT topic_subject FROM topics, users, boards, posts WHERE topic_subject LIKE "%'.$search.'%"');
    }
?>


<form atcion="" methode="GET "class="form-group">	
    <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">	
        <div class="input-group">	
            <input type="search" name="search" placeholder="Search..." aria-describedby="button-addon1" class="form-control border-0 bg-light">	
            <div class="input-group-append">	
            <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>	
            </div>	
        </div>	
    </div>	
</form>

<ul>
    <?php while ($datas = $response->fetch()){ ?>
        <li><?= $datas['topic_subject'] ?></li>

    <?php } ?>
</ul>
