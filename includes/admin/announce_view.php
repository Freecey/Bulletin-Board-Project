<?php 
$req_announces = $conn->query("SELECT * FROM announce WHERE ann_deleted = 0"); 
// while($row = $req_user->fetch()) {
//   echo $row['user_name'];
//  }
//  $req_user->closeCursor();

$req_users = $conn->query("SELECT user_id, user_name FROM users WHERE user_level > 1"); 
$user_with_priv = $req_users->fetch();


while($rowusr = $req_users->fetch()) { 
    $new_array[] = $rowusr; // Inside while loop
}


?>