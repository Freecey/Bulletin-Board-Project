<?php 
//topicsedit_view.php
include('../includes/admin/session_userlvl.php');
$Edit_ID = $_GET['edit_id'];


// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
$Topic_id = $Edit_ID;


$select = $conn->prepare("SELECT*FROM topics where topic_id='$Edit_ID' LIMIT 1");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$data=$select->fetch();

if($_SESSION[TopicUPDATEComplet] == true ){
    $UpdateOKClass = 'bg-success text-white';
    $UpdateOK = 'Topic Update Successfully';
    unset($_SESSION['TopicUPDATEComplet']);
}

$select2 = $conn->prepare("SELECT user_name FROM users where user_id=$data[topic_by] LIMIT 1");
$select2->setFetchMode(PDO::FETCH_ASSOC);
$select2->execute();
$data2=$select2->fetch();


// Select all board for set in form selection
$req_boards = $conn->query("SELECT * FROM boards"); 
// end of this query in the form


// echo $UPD_PWD_Complet;
// echo "-----";
echo $dbResErr;

// echo '<pre>' . print_r($_POST, TRUE) . '</pre>';


// [topic_id] => 1
// [topic_board] => 1
// [topic_status] => 0
// [topic_subject] => Javascript
// [update_topic] => Update Topic


// Prepare and make update of topic table
try {
	if(isset($_POST['update_topic'])){
        $nameclasserr = '';
        $UPD_topic_id    = $_POST['topic_id']; 
        $UPD_topic_board = $_POST['topic_board'];  // to ADD QUERY
        $UPD_topic_status = $_POST['topic_status'];  // to ADD QUERY
        $UPD_topic_subject  = $_POST['topic_subject'];  // to ADD QUERY
        $UPD_topic_date_upd = date('Y-m-d H:i:s');
        if( $UPD_topic_status   == 1){
            $UPD_topic_image  = 'https://'.$_SERVER['SERVER_NAME'].'/assets/topic_status/01-padlock.svg'; 
        }elseif( $UPD_topic_status   == 0){
            $UPD_topic_image  = 'https://'.$_SERVER['SERVER_NAME'].'/assets/topic_status/00-open-padlock.svg'; 
        }elseif( $UPD_topic_status   == 2){
            $UPD_topic_image  = 'https://'.$_SERVER['SERVER_NAME'].'/assets/topic_status/02_cross.svg'; 
        }


        

        if( $UPD_topic_subject == ''){
            $usernameErr = 'Topic subject Can not be empty';
            $nameclasserr = 'bg-danger text-white';
        }else{
                $UPDATEQuerySQL1 = "UPDATE `topics` 
                SET `topic_board` = '$UPD_topic_board', 
                `topic_status` = '$UPD_topic_status', 
                `topic_subject` = '$UPD_topic_subject', 
                `topic_image` = '$UPD_topic_image', 
                `topic_date_upd` = '$UPD_topic_date_upd'  
                WHERE `topics`.`topic_id` = $UPD_topic_id";
            
            echo $UPDATEQuerySQL1;
            $Top_UpdateINSERT= $conn->prepare($UPDATEQuerySQL1);
            $Top_UpdateINSERT->execute();

            $_SESSION['TopicUPDATEComplet'] = true;
            header("Refresh:0");
        }
    }

}


catch (PDOException $e) {

	$dbResErr = "Error: ". $e -> getMessage();
	if (strpos($dbResErr, 'topic_subject') !== false) {
		$usernameErr = 'Topic subject already used, must be unique';
		$nameclasserr = 'bg-danger text-white';
		// $dbResErr = '';
	}
}



?>
