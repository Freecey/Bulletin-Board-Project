<?php 
//topics_views.php
$req_topics = $conn->query("SELECT * FROM topics"); 
// while($row = $req_user->fetch()) {
//   echo $row['user_name'];
//  }
//  $req_user->closeCursor();

$req_users = $conn->query("SELECT user_id, user_name FROM users"); 
$user_with_priv = $req_users->fetch();


while($rowusr = $req_users->fetch()) { 
    $new_array[] = $rowusr; 
}


?>