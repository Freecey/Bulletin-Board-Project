<?php include 'req_search.php';?>

<?php if ($search_done == true) { ?>

    <?php if ($response_two -> rowCount() > 0) { ?>
    <ul>
    <?php while($datas = $response_two->fetch()) { ?>
        <li><a href="comments.php?id=<?php echo $datas['post_id'] .'#'. $datas['post_id'];?>"><?= $datas['post_content'] ?></a> <br>
            <?= $datas['post_date'] ?>
        </li>
    <?php } ?>
    </ul>

    <?php } else { ?>
    <ul>
        <li>Aucun résultat...</li>
    </ul>
    <?php } ?>
<?php } ?>