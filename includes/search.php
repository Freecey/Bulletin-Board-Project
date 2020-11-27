
<?php
    include 'connect.php';

    $search_done = false;

    if (isset($_GET['search']) AND !empty($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);
        $response = $conn->query('SELECT * FROM topics WHERE topic_subject LIKE "%'.$search.'%"');
        $response_two = $conn->query('SELECT * FROM posts WHERE post_content LIKE "%'.$search.'%"');
        $search_done = true;

    }
?>



<form atcion="" methode="GET "class="form-group">	
    <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">	
        <div class="input-group">	
            <input type="search" name="search" placeholder="Search..." aria-describedby="button-addon1" class="form-control border-0 bg-light">	
            <div class="input-group-append">	
            <button type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>	
            </div>	
        </div>	
    </div>	
</form>

<?php if ($search_done == true) { ?>

    <?php if ($response -> rowCount() > 0) { ?>
        <h5>Topics</h5>
        <ul>
            <?php while($datas = $response->fetch()) { ?>
                <li><a href="comments.php?id=<?php echo $datas['topic_id'];?>"><?= $datas['topic_subject'] ?></a> <br>
                    <?= $datas['topic_date'] ?>
                </li>
            <?php } ?>
        </ul>
    
    <?php } else { ?>
        <h5>Topics</h5>
        <ul>
            <li>Aucun résultat...</li>
        </ul>
    <?php } ?>

    <?php if ($response_two -> rowCount() > 0) { ?>
        <h5>Posts</h5>
        <ul>
            <?php while($datas = $response_two->fetch()) { ?>
                <li><a href="comments.php?id=<?php echo $datas['post_id'] .'#'. $datas['post_id'];?>"><?= $datas['post_content'] ?></a> <br>
                    <?= $datas['post_date'] ?>
                </li>
            <?php } ?>
        </ul>

    <?php } else { ?>
        <h5>Posts</h5>
        <ul>
            <li>Aucun résultat...</li>
        </ul>
    <?php } ?>

<?php } ?>