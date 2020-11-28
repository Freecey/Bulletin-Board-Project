<?php 
//announceadd_view.php
include('../includes/admin/session_userlvl.php');

// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
// echo '<pre>' . print_r($_POST, TRUE) . '</pre>';

if($_SESSION[AnnAddComplet] == true ){
    $UpdateOKClass = 'bg-success text-white';
    $UpdateOK = 'Announce Create Successfully';
    unset($_SESSION['AnnAddComplet']);
}

$select2 = $conn->prepare("SELECT user_name FROM users where user_id=$_SESSION[user_id] LIMIT 1");
$select2->setFetchMode(PDO::FETCH_ASSOC);
$select2->execute();
$data2=$select2->fetch();

// echo $UPD_PWD_Complet;
// echo "-----";
echo $dbResErr;


// `ann_subject` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
// `ann_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
// `ann_date` datetime NOT NULL,
// `ann_by` int NOT NULL,
// `ann_status` tinyint(1) NOT NULL DEFAULT '1',
// `ann_upd_by` int NOT NULL;


// Prepare and make update of announce table
try {
	if(isset($_POST['create_ann'])){
        $nameclasserr = '';
        $ADD_ann_subject  = $_POST['ann_subject'];  
        $ADD_ann_content = $_POST['ann_content']; 
        $ADD_ann_status  = $_POST['ann_status']; 
        $ADD_ann_date = date('Y-m-d H:i:s');
        
        if( $ADD_ann_subject == ''){
            $usernameErr = 'Announce Subject Empty';
            $nameclasserr = 'bg-danger text-white';
        }elseif( $ADD_ann_content == '' ){
            $usernameErr = 'Announce Content Empty';
            $contentclasserr = 'bg-danger text-white';
        }else{
            $ADDQuerySQL1 = $conn->prepare("INSERT INTO announce
                    (ann_subject,ann_content,ann_date,ann_by,ann_status,ann_upd_by)
            values(:ann_subject, :ann_content, :ann_date, :ann_by, :ann_status, :ann_upd_by)
            ");
            $ADDQuerySQL1->bindParam (':ann_subject',$ADD_ann_subject);
            $ADDQuerySQL1->bindParam (':ann_content',$ADD_ann_content);
            $ADDQuerySQL1->bindParam (':ann_date',$ADD_ann_date);
            $ADDQuerySQL1->bindParam (':ann_by',$_SESSION[user_id]);
            $ADDQuerySQL1->bindParam (':ann_status',$ADD_ann_status);
            $ADDQuerySQL1->bindParam (':ann_upd_by',$_SESSION[user_id]);
            
            
            $ADDQuerySQL1->execute();

            $_SESSION['AnnAddComplet'] = true;
            header("Refresh:0");
        }
    }

}


catch (PDOException $e) {

	$dbResErr = "Error: ". $e -> getMessage();
	if (strpos($dbResErr, 'ann_subject') !== false) {
		$usernameErr = 'Announce Subject already used, must be unique';
		$nameclasserr = 'bg-danger text-white';
		// $dbResErr = '';
	}
}





?>
