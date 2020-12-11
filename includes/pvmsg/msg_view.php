<?php
//msg_view.php

// pvmsg
// 	 pvmsg_id 
// 	pvmsg_subject
// 	pvmsg_content
// 	pvmsg_from
// 	pvmsg_to 
// 	 pvmsg_read
// 	 pvmsg_disc
//   pvmsg_date

//usrlst_arr

// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
// echo '<pre>' . print_r($_POST, TRUE) . '</pre>';
// echo $actual_link;
// echo $_SERVER['REQUEST_URI'];
// echo '<br>'.$_SERVER['PHP_SELF'];
echo'
<link rel="stylesheet" href="/css/msg.css" type="text/css"/>

';

if(isset($_GET['sendto_id'])) {
$sendto_id = $_GET['sendto_id'];
}else{
    $sendto_id = '0';
}

// echo $sendto_id;
$CURRENT_USERID = $_SESSION['user_id'];
$CURRENT_IMAGE = $_SESSION['user_imgdata'];
$CURRENT_UNAME = $_SESSION['user_name'];

if(isset($_GET['sendto_id'])){
    $UPDATEQuerySQLRead = "UPDATE pvmsg 
    SET pvmsg_read = 1
    WHERE (pvmsg_inbox = $CURRENT_USERID) AND (pvmsg_to = $sendto_id)";
    $Post_UpdateINSERT= $conn->prepare($UPDATEQuerySQLRead);
    $Post_UpdateINSERT->execute();


}

function humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}

// ($rowDMSG['pvmsg_action'] == 'REC') AND

if(isset($_SESSION['MSG_SEND_OK'])){
    echo $_SESSION['MSG_SEND_OK'];
    $_SESSION['MSG_SEND_OK2'] = $_SESSION['MSG_SEND_OK'];
    unset($_SESSION['MSG_SEND_OK']);
    echo'
    <div>
<!-- <img src="/assets/other/message-sent-icon-23.webp" class="rounded mx-auto d-block" alt="Message sent OK"> -->
<p class="text-center bg-success text-light">Message Send Successfully</p>
</div>
<meta http-equiv="refresh" content="2">';
}else{

    if(isset($_SESSION['MSG_SEND_OK2'])){
    //     echo'
    // <div>
    //     <p class="text-center bg-success text-light">Message Send Successfully</p>
    // </div>';
        unset($_SESSION['MSG_SEND_OK2']);
    }

    $req_USR_list = $conn->query("SELECT user_id,user_name FROM users"); 


    if(isset($_POST['SEND_MSG'])){
        //$ADD_pvmsg_subject  = $_POST['pvmsg_sub'];
        $ADD_pvmsg_content  = $_POST['pvmsg_cont'];
        $ADD_pvmsg_from     = $_SESSION['user_id'];
        $ADD_pvmsg_to       = $_POST['sendto_id'];

        if($ADD_pvmsg_from < $ADD_pvmsg_to ){
            $disc_ID = md5($ADD_pvmsg_from).md5($ADD_pvmsg_to);
            $disc_ID = md5($disc_ID);

        }elseif($ADD_pvmsg_from > $ADD_pvmsg_to){
            $disc_ID = md5($ADD_pvmsg_to).md5($ADD_pvmsg_from);
            $disc_ID = md5($disc_ID);
        }
        $pvmsg_action = 'SEND';
        $ADDQueryMSG = $conn->prepare("INSERT INTO pvmsg(pvmsg_content,pvmsg_from,pvmsg_to,pvmsg_disc,pvmsg_action,pvmsg_inbox)
        values( :pvmsg_content, :pvmsg_from, :pvmsg_to, :pvmsg_disc, :pvmsg_action, :pvmsg_inbox)
        ");
        //$ADDQueryMSG->bindParam (':pvmsg_subject',$ADD_pvmsg_subject);
        $ADDQueryMSG->bindParam (':pvmsg_content',$ADD_pvmsg_content);
        $ADDQueryMSG->bindParam (':pvmsg_from',$ADD_pvmsg_from);
        $ADDQueryMSG->bindParam (':pvmsg_to',$ADD_pvmsg_to);
        $ADDQueryMSG->bindParam (':pvmsg_disc',$disc_ID);
        $ADDQueryMSG->bindParam (':pvmsg_action',$pvmsg_action);
        $ADDQueryMSG->bindParam (':pvmsg_inbox',$ADD_pvmsg_from);
            
        $ADDQueryMSG->execute();

        $pvmsg_action = 'REC';
        $ADDQueryMSG = $conn->prepare("INSERT INTO pvmsg(pvmsg_content,pvmsg_from,pvmsg_to,pvmsg_disc,pvmsg_action,pvmsg_inbox)
        values( :pvmsg_content, :pvmsg_from, :pvmsg_to, :pvmsg_disc, :pvmsg_action, :pvmsg_inbox)
        ");
        //$ADDQueryMSG->bindParam (':pvmsg_subject',$ADD_pvmsg_subject);
        $ADDQueryMSG->bindParam (':pvmsg_content',$ADD_pvmsg_content);
        $ADDQueryMSG->bindParam (':pvmsg_from',$ADD_pvmsg_to);
        $ADDQueryMSG->bindParam (':pvmsg_to',$ADD_pvmsg_from);
        $ADDQueryMSG->bindParam (':pvmsg_disc',$disc_ID);
        $ADDQueryMSG->bindParam (':pvmsg_action',$pvmsg_action);
        $ADDQueryMSG->bindParam (':pvmsg_inbox',$ADD_pvmsg_to);
            
        $ADDQueryMSG->execute();

        unset($pvmsg_action);
        $_SESSION['MSG_SEND_OK'] = 'Message Send Successfully';
        echo "<meta http-equiv='refresh' content='0'>";


    }
     //include($_SERVER['DOCUMENT_ROOT'].'/includes/pvmsg/msg_form.php');
}


/////////// inbox
// SELECT  DISTINCT pvmsg_disc FROM pvmsg WHERE pvmsg_from !=4 OR pvmsg_to !=4


$req_users = $conn->query("SELECT user_id, user_name, user_image, user_imgdata FROM users"); 

while($rowusr = $req_users->fetch()) { 
    $users_array[] = $rowusr; 
}





$req_PVMSG = $conn->query("SELECT * FROM pvmsg WHERE pvmsg_inbox=$CURRENT_USERID ORDER BY pvmsg_date DESC"); 

$req_PVMSG2 = $conn->query("SELECT * FROM pvmsg WHERE pvmsg_inbox=$CURRENT_USERID ORDER BY pvmsg_date DESC"); 

//$req_PVMSG_inbox = $conn->query("SELECT * FROM pvmsg WHERE pvmsg_from=$CURRENT_USERID pvmsg_to=$sendto_id ORDER BY pvmsg_date DESC"); 

//$req_PVDISC_ID = $conn->query("SELECT  DISTINCT pvmsg_disc FROM pvmsg WHERE pvmsg_from !=$CURRENT_USERID OR pvmsg_to !=$CURRENT_USERID");  


//$req_DISC_USR = $conn->query("SELECT * FROM `pvmsg` WHERE pvmsg_disc = '82ef0e74f7833bc185880ec7aa7b8476' LIMIT 1"); 


include($_SERVER['DOCUMENT_ROOT'].'/includes/pvmsg/msgread_form.php');
?>