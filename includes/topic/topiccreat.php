<?php 
//topiccreat.php
//mise en page formutaire topic creation

// topics DB table structure
//
// topic_subject	varchar(255)
// topic_image	varchar(255)
// topic_date	datetime
// topic_date_upd	datetime
// topic_board 	int	
// topic_by Index	int

// Boards Table info
//
// board_id
// board_name
// board_desciption
// Board_image

// cactch user info
$user_id = $_SESSION[user_id];
$select_USER = $conn->prepare("SELECT*FROM users where user_id='$user_id' LIMIT 1");
$select_USER->setFetchMode(PDO::FETCH_ASSOC);
$select_USER->execute();
$User_DATA=$select_USER->fetch();

// catch board name
// $select_BOARDS = $conn->prepare("SELECT * FROM boards");
// $select_BOARDS->setFetchMode(PDO::FETCH_ASSOC);
// $select_BOARDS->execute();
// $BOARDS_DATA = Array();
// =$select_BOARDS->fetch();
// $BOARDS_Name = $BOARDS_DATA['board_name'];


$select_BOARDS = mysql_query("SELECT board_id FROM boards");
$BOARDS_DATA = Array();
while ($table_brd = mysql_fetch_array($select_BOARDS, MYSQL_ASSOC)) {
    $BOARDS_DATA[] =  $table_brd['board_id'];  
    $BOARDS_DATA[] =  $table_brd['board_name'];  
    $BOARDS_DATA[] =  $table_brd['board_desciption'];  
    $BOARDS_DATA[] =  $table_brd['Board_image'];  
}


// TEST Catched data
//
echo '<pre>' . print_r($User_DATA, TRUE) . '</pre>';
echo '<pre>' . print_r($BOARDS_DATA, TRUE) . '</pre>';

?>