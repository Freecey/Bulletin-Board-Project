<?php include 'req_search.php';?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/includes/function/functions2.php'); ?>
<?php if ($search_done == true) { ?>

    <?php if ($response_two -> rowCount() > 0) { ?>
    <ul>
    <?php while($datas = $response_two->fetch()) { $NmPostR = 1;?>
        <li class="mb-2"><a href="comments.php?id=<?php echo $datas['post_topic'] .'#'. $datas['post_id'];?>">
            <b>
            <?php
            $topNAME = $conn->query("SELECT topic_subject FROM topics WHERE topic_id = $datas[post_topic] LIMIT 1");
            $topNAME_re=$topNAME->fetch();
            echo $topNAME_re[topic_subject];
            ?>
            
            </b></a></br>
            <?= substr($datas[post_content], 0, 230); ?> ... <br>
            <small><?= $datas['post_date'] .' - by ';
                 
                 $usrNAME = $conn->query("SELECT user_name FROM users WHERE user_id = $datas[post_by] LIMIT 1");
                 $usrNAME_re=$usrNAME->fetch();
                 echo '<b>'. $usrNAME_re[user_name] .'</b>';
                ?></small>
        </li>
    <?php } ?>
    </ul>

    <?php } else { ?>
    <ul>
        <li>No results found ...</li>
    </ul>
    <?php } ?>
<?php } ?>