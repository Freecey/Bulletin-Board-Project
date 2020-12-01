<?php


function SetDeleted($PostDel_ID) {
        $nameclasserr = '';
        $UPD_post_date_update = date('Y-m-d H:i:s'); 	 // to ADD QUERY
        $UPD_post_id = $PostDel_ID;    // DON'T NOT UPDATE 
        // $UPD_post_by = $_SESSION[user_id]; // DON'T NOT UPDATE 
        $SetDELQuerySQL = "UPDATE `posts` SET `post_deleted` = '1' WHERE `posts`.`post_id` = $UPD_post_id";
        echo '<br><hr>TEST DEL 11 OK';
        $Post_SetDelINSERT= $conn->prepare($SetDELQuerySQL);
        echo '<br><hr>TEST DEL 22 OK';
        // $Post_SetDelINSERT->execute();
        echo '<br><hr>TEST DEL 33 OK';
        $_SESSION['SetDELComplet'] = true;
        // header("location:$url");   
        // header("Refresh:0");
}
?>