<?php include 'req_search.php';?>

<?php if ($search_done == true) { ?>

    <?php if ($response -> rowCount() > 0) { ?>
    <ul>
    <?php while($results_topics = $response->fetch()) { ?>
        <li><a href="comments.php?id=<?php echo $results_topics['topic_id'];?>"><?= $results_topics['topic_subject'] ?></a> <br>
            <?= $results_topics['topic_date'] ?>
        </li>
    <?php } ?>
    </ul>

    <?php } else { ?>
    <ul>
        <li>Aucun résultat...</li>
    </ul>
    <?php } ?>
<?php } ?>