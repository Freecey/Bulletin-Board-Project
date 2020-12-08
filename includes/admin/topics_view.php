<?php 
//topics_views.php

// WHERE topic_board = 


if( isset($_GET['SelectBoard'])) {
    if ( $_GET['SelectBoard'] == 'All'){
        $req_topics = $conn->query("SELECT * FROM topics ");     
    }elseif ( $_GET['SelectBoard'] >= '1'){
        $sel_boa_id = $_GET['SelectBoard'] ;
        $req_topics = $conn->query("SELECT * FROM topics WHERE topic_board = $sel_boa_id");     
    }   

}else{
$req_topics = $conn->query("SELECT * FROM topics "); 
}
// while($row = $req_user->fetch()) {
//   echo $row['user_name'];
//  }
//  $req_user->closeCursor();

$req_users = $conn->query("SELECT user_id, user_name FROM users"); 
$user_with_priv = $req_users->fetch();


while($rowusr = $req_users->fetch()) { 
    $new_array[] = $rowusr; 
}

$req_boards = $conn->query("SELECT board_id,board_name FROM boards"); 


// if(isset($_POST['btn_sw']) )
// {
//     echo '===<br>';
//     echo $_POST['SelectBoard'];
//     echo '<br>===';
// }

?>