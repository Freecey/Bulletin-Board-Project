<?php 
//postedit.php

//TEST post 38 - user 4
$url=$_SERVER['HTTP_REFERER'];

$PostEdit_ID = $_GET['postedit_id'];

$select = $conn->prepare("SELECT*FROM posts where post_id=$PostEdit_ID AND post_by=$_SESSION[user_id] LIMIT 1");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$PostDATA=$select->fetch();
$topic_id=$PostDATA['post_topic'];

$select2 = $conn->prepare("SELECT*FROM topics where topic_id=$PostDATA[post_topic] LIMIT 1");
$select2->setFetchMode(PDO::FETCH_ASSOC);
$select2->execute();
$Topic_info=$select2->fetch();


if($_SESSION['PostUPDATEComplet'] == true ){
    $UpdateOKClass = 'bg-success text-white';
    $UpdateOK = 'Board Update Successfully';
    unset($_SESSION['BoardUPDATEComplet']);
}


// Prepare and make update of board table
try {
	if(isset($_POST['post_edit'])){
        $nameclasserr = '';
        $UPD_post_content  = $_POST['post_content'];  // to ADD QUERY
        $UPD_post_date_update = date('Y-m-d H:i:s'); 	 // to ADD QUERY
        $UPD_post_id = $PostEdit_ID;    // DON'T NOT UPDATE 
        // $UPD_post_by = $_SESSION[user_id]; // DON'T NOT UPDATE 

        $UPDATEQuerySQL1 = "UPDATE `posts` SET `post_content` = '$UPD_post_content', `post_date_update` = '$UPD_post_date_update' WHERE `posts`.`post_id` = $UPD_post_id";
        $Post_UpdateINSERT= $conn->prepare($UPDATEQuerySQL1);
        $Post_UpdateINSERT->execute();


        $update=$conn->prepare("UPDATE topics SET topic_date_upd= '$UPD_post_date_update' WHERE topic_id = $topic_id");
        $update->execute();

        $_SESSION['BoardUPDATEComplet'] = true;
        header("location:comments.php?id=".$topic_id."#".$UPD_post_id);   
        //header("Refresh:");
    }elseif(isset($_POST['delete_post'])){
        
        $nameclasserr = '';
        $UPD_post_date_update = date('Y-m-d H:i:s'); 	 // to ADD QUERY
        $UPD_post_id = $PostEdit_ID;    // DON'T NOT UPDATE 
        $UPD_post_by = $_SESSION['user_id']; // DON'T NOT UPDATE 
        $SetDELQuerySQL = "UPDATE `posts` SET `post_deleted` = '1' WHERE `posts`.`post_id` = $UPD_post_id";
        $Post_SetDelINSERT= $conn->prepare($SetDELQuerySQL);
        
        $Post_SetDelINSERT->execute();
        $_SESSION['SetDELComplet'] = true;
        header("location:comments.php?id=".$topic_id."#".$UPD_post_id);  
        // header("Refresh:0");
    }

}


catch (PDOException $e) {

	$dbResErr = "Error: ". $e -> getMessage();
	if (strpos($dbResErr, 'board_name') !== false) {
		$usernameErr = 'Board Name already used, must be unique';
		$nameclasserr = 'bg-danger text-white';
		// $dbResErr = '';
	}
}


?>
