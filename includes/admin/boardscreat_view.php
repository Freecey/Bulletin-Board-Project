<?php 
//boardsedit_view.php
include('../includes/admin/session_userlvl.php');

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
$board_img_prepatch = "assets/topics/";


// $select = $conn->prepare("SELECT*FROM boards where board_id='$Edit_ID' LIMIT 1");
// $select->setFetchMode(PDO::FETCH_ASSOC);
// $select->execute();
// $data=$select->fetch();

// $board_image_cur =  str_replace("assets/topics/", "",$data[board_image]);

if($_SESSION[BoardUPDATEComplet] == true ){
    $UpdateOKClass = 'bg-success text-white';
    $UpdateOK = 'Board Create Successfully';
    unset($_SESSION['BoardUPDATEComplet']);
}

$select2 = $conn->prepare("SELECT user_name FROM users where user_id=$_SESSION[user_id] LIMIT 1");
$select2->setFetchMode(PDO::FETCH_ASSOC);
$select2->execute();
$data2=$select2->fetch();

// echo $UPD_PWD_Complet;
// echo "-----";
echo $dbResErr;


// Prepare and make update of board table
try {
	if(isset($_POST['create_board'])){
        $nameclasserr = '';
        $ADD_board_name  = $_POST['board_name'];  
        $ADD_board_image2 = $_POST['board_image']; 
        $ADD_board_description  = $_POST['board_description']; 
        $ADD_board_status = $_POST['board_status'];
        $ADD_Board_creat_date = date('Y-m-d H:i:s');
        
        echo board_status ;
        echo board_creat_by ;

        $ADD_board_image = $board_img_prepatch . $ADD_board_image2;

        // $ADDQuerySQL1 = "UPDATE `boards` SET `board_name` = '$UPD_board_name', `board_image` = '$UPD_board_image', `board_description` = '$UPD_board_description', `board_status` = '$UPD_board_status'  WHERE `boards`.`board_id` = $board_id";
        // echo $ADDQuerySQL1;
        // $Board_AddINSERT= $conn->prepare($ADDQuerySQL1);

        $ADDQuerySQL1 = $conn->prepare("INSERT INTO boards(board_name,board_description,board_image,board_creat_date,board_creat_by,board_status)
        values(:board_name, :board_description, :board_image, :board_creat_date, :board_creat_by, :board_status)
        ");
        $ADDQuerySQL1->bindParam (':board_name',$ADD_board_name);
        $ADDQuerySQL1->bindParam (':board_description',$ADD_board_description);
        $ADDQuerySQL1->bindParam (':board_image',$ADD_board_image);
        $ADDQuerySQL1->bindParam (':board_creat_date',$ADD_Board_creat_date);
        $ADDQuerySQL1->bindParam (':board_creat_by',$_SESSION[user_id]);
        $ADDQuerySQL1->bindParam (':board_status',$ADD_board_status);
        
        
        $ADDQuerySQL1->execute();

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
