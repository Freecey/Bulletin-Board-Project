<?php 
//announceedit_view.php
include('../includes/admin/session_userlvl.php');
$Edit_ID = $_GET['edit_id'];


// ann_id 
// ann_subject
// ann_content
// ann_type
// ann_date
// ann_date_update
// ann_deleted
// ann_by
// ann_pin

// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
$Ann_id = $Edit_ID;


$select = $conn->prepare("SELECT*FROM announce where ann_id='$Edit_ID' LIMIT 1");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$data=$select->fetch();

if($_SESSION['AnnUPDATEComplet'] == true ){
    $UpdateOKClass = 'bg-success text-white';
    $UpdateOK = 'Announce Update Successfully';
    unset($_SESSION['AnnUPDATEComplet']);
}

$ANN_by = $data['ann_by'];

$select2 = $conn->prepare("SELECT user_name FROM users where user_id=$ANN_by LIMIT 1");
$select2->setFetchMode(PDO::FETCH_ASSOC);
$select2->execute();
$data2=$select2->fetch();

$ANN_UPD_BY = $data['ann_upd_by'];

$select3 = $conn->prepare("SELECT user_name FROM users where user_id=$ANN_UPD_BY LIMIT 1");
$select3->setFetchMode(PDO::FETCH_ASSOC);
$select3->execute();
$data3=$select3->fetch();

// echo $UPD_PWD_Complet;
// echo "-----";
echo $dbResErr;

// echo '<pre>' . print_r($_POST, TRUE) . '</pre>';

// Prepare and make update of ann table
try {
	if(isset($_POST['update_ann'])){
        $nameclasserr = '';
        $ann_id          = $_POST['ann_id']; 
        $UPD_ann_subject = $_POST['ann_subject'];  // to ADD QUERY
        $UPD_ann_content = $_POST['ann_content'];  // to ADD QUERY
        $UPD_ann_status  = $_POST['ann_status'];  // to ADD QUERY
        $UPD_ann_upd_by  = $_SESSION['user_id'];
        $UPD_ann_date_update = date('Y-m-d H:i:s');
        

        $UPDATEQuerySQL1 = "UPDATE `announce` 
            SET `ann_subject` = '$UPD_ann_subject', 
            `ann_content` = '$UPD_ann_content', 
            `ann_status` = '$UPD_ann_status', 
            `ann_date_update` = '$UPD_ann_date_update', 
            `ann_upd_by` = '$UPD_ann_upd_by'  
            WHERE `announce`.`ann_id` = $ann_id";
        
        echo $UPDATEQuerySQL1;
        $Ann_UpdateINSERT= $conn->prepare($UPDATEQuerySQL1);
        $Ann_UpdateINSERT->execute();

        $_SESSION['AnnUPDATEComplet'] = true;
        header("Refresh:0");
    }

}


catch (PDOException $e) {

	$dbResErr = "Error: ". $e -> getMessage();
	if (strpos($dbResErr, 'ann_subject') !== false) {
		$usernameErr = 'Announce subject already used, must be unique';
		$nameclasserr = 'bg-danger text-white';
		// $dbResErr = '';
	}
}



?>
