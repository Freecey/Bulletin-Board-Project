<?php 
//boardsedit_view.php
include('../includes/admin/session_userlvl.php');
$Edit_ID = $_GET['edit_id'];


// board_id 
// board_name
// board_description
// board_image
// board_creat_date
// board_upd_date
// board_creat_by
// board_status
// board_views

// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
$board_id = $Edit_ID;
$board_img_prepatch = "assets/topics/";


$select = $conn->prepare("SELECT*FROM boards where board_id='$Edit_ID' LIMIT 1");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$data=$select->fetch();

$board_image_cur =  str_replace("assets/topics/", "",$data[board_image]);

if($_SESSION[BoardUPDATEComplet] == true ){
    $UpdateOKClass = 'bg-success text-white';
    $UpdateOK = 'Profile Update Successfully';
    unset($_SESSION['BoardUPDATEComplet']);
}

$select2 = $conn->prepare("SELECT user_name FROM users where user_id=$data[board_creat_by] LIMIT 1");
$select2->setFetchMode(PDO::FETCH_ASSOC);
$select2->execute();
$data2=$select2->fetch();

// echo $UPD_PWD_Complet;
// echo "-----";
echo $dbResErr;


// Prepare and make update of board table
try {
	if(isset($_POST['update_board'])){
        $nameclasserr = '';
        $UPD_board_name  = $_POST['board_name'];  // to ADD QUERY
        $UPD_board_image = $_POST['board_image'];  // to ADD QUERY
        $UPD_board_description  = $_POST['board_description'];  // to ADD QUERY
        $UPD_board_status = $_POST['board_status'];

        $UPD_board_image = $board_img_prepatch . $UPD_board_image;

        $UPDATEQuerySQL1 = "UPDATE `boards` SET `board_name` = '$UPD_board_name', `board_image` = '$UPD_board_image', `board_description` = '$UPD_board_description', `board_status` = '$UPD_board_status'  WHERE `boards`.`board_id` = $board_id";
        // echo $UPDATEQuerySQL1;
        $Board_UpdateINSERT= $conn->prepare($UPDATEQuerySQL1);
        $Board_UpdateINSERT->execute();

        $_SESSION['BoardUPDATEComplet'] = true;
        header("Refresh:0");
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
