<?php 
$req_user = $conn->query("SELECT * FROM users WHERE user_active !=0"); 
// while($row = $req_user->fetch()) {
//   echo $row['user_name'];
//  }
//  $req_user->closeCursor();

// echo '<pre>' . print_r($_POST, TRUE) . '</pre>';

?>