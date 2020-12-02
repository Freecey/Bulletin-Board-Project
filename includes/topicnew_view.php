<?php
//topicnew_view.php

$url=$_SERVER['HTTP_REFERER'];
// echo $url;

// Check if form error for reselect the precedent board selection or page from
if($_POST[board_id] != ''){
    $FromBoard_ID = $_POST[board_id];
}else{
$FromBoard_ID = $_GET[boardID];
}


if($_SESSION[TopicAddComplet] == true ){
    $UpdateOKClass = 'bg-success text-white';
    $UpdateOK = 'New Topic Create Successfully';
    $formRO = 'readonly';
    unset($_SESSION['BoardUPDATEComplet']);
}

if( $_GET[boardID] == 6 ) {
// Select all board for set in form selection
$req_boards = $conn->query("SELECT * FROM boards"); 
// end of this query in the form
}else{ 
    $req_boards = $conn->query("SELECT * FROM boards WHERE board_status=1"); 
}



$SelectNewTopicID = $conn->prepare("SELECT * FROM `topics` WHERE `topic_subject` = '$ADD_topic_subject'");
$SelectNewTopicID->setFetchMode(PDO::FETCH_ASSOC);
$SelectNewTopicID->execute();
$NewTopicID=$SelectNewTopicID->fetch();


try {
	if(isset($_POST['topic_new'])){
        $nameclasserr       = '';
        $ADD_post_content   = $_POST['post_content'];  
        $ADD_post_date      =  date('Y-m-d H:i:s'); 
        $ADD_post_by        = $_SESSION['user_id']; 
        $ADD_topic_subject  = $_POST['topic_subject'];
        $ADD_topic_date     = $ADD_post_date;
        $ADD_topic_board    = $_POST['board_id'];

        if(ADD_topic_board == 6){
            $ADD_topics_exclsearch	= 1;
            $ADD_post_exclsearch = 1;
        }else{
            $ADD_topics_exclsearch	= 0;
            $ADD_post_exclsearch = 1;
        }

        if($ADD_topic_subject == ''){
            $usernameErr = ' : Topic Name EMPTY';
            $nameclasserr = 'bg-danger text-white';
        }elseif($ADD_post_content == ''){
            $MsgErr = ' : EMPTY';
            $Msgclasserr = 'bg-danger text-white';
        }else{

            $SelectNewTopicID = $conn->prepare("SELECT * FROM `topics` WHERE `topic_subject` = '$ADD_topic_subject' LIMIT 1");
            $SelectNewTopicID->setFetchMode(PDO::FETCH_ASSOC);
            $SelectNewTopicID->execute();
            $NewTopicID=$SelectNewTopicID->fetch();

                    $ADDQueryTOPIC = $conn->prepare("INSERT INTO topics(topic_subject,topic_date,topic_board,topic_by,topics_exclsearch)
            values(:topic_subject, :topic_date, :topic_board, :topic_by, :topics_exclsearch)
            ");
            $ADDQueryTOPIC->bindParam (':topic_subject',$ADD_topic_subject);
            $ADDQueryTOPIC->bindParam (':topic_date',$ADD_topic_date);
            $ADDQueryTOPIC->bindParam (':topic_board',$ADD_topic_board);
            $ADDQueryTOPIC->bindParam (':topic_by',$ADD_post_by);
            $ADDQueryTOPIC->bindParam (':topics_exclsearch',$ADD_topics_exclsearch);
            
            $ADDQueryTOPIC->execute();

            // Search New Topic ID
            $SelectNewTopicID = $conn->prepare("SELECT * FROM `topics` WHERE `topic_subject` = '$ADD_topic_subject' LIMIT 1");
            $SelectNewTopicID->setFetchMode(PDO::FETCH_ASSOC);
            $SelectNewTopicID->execute();
            $NewTopicID=$SelectNewTopicID->fetch();

            
            $ADD_post_topic = $NewTopicID['topic_id'] ;
            

            $insert = $conn -> prepare('INSERT INTO posts(post_topic, post_content, post_by, post_exclsearch,  post_date)VALUES( ?, ?, ?, ?, NOW())');
            $insert ->execute(array($ADD_post_topic, $ADD_post_content, $_SESSION['user_id'],$ADD_post_exclsearch,));       

            $_SESSION['BoardUPDATEComplet'] = true;
            header("Location: ./comments.php?id=$ADD_post_topic");
        }
    }
}
catch (PDOException $e) {

	$dbResErr = "Error: ". $e -> getMessage();
	if (strpos($dbResErr, 'topic_subject') !== false) {
		$usernameErr = ' : Topic Name already used, must be unique';
        $nameclasserr = 'bg-danger text-white';
        // echo '<pre>' . print_r($dbResErr, TRUE) . '</pre>';
		// $dbResErr = '';
	}
}


?>