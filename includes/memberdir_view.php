<?php 
//memberdir_view.php
$req_member = $conn->query("SELECT * FROM users WHERE user_active != 0"); 


// PUT in HTML code for table
// while($row = $req_user->fetch()) {
//   echo $row['user_name'];
//  }
//  $req_user->closeCursor();

$user_lvl_text = array(
    "Viewer",
    "User",
    "Moderator",
    "Admin",
    "God",
    666 => "Devil",
);


// PUT in HTML code for table content
// $nb_post = $conn->query("SELECT COUNT(post_id) FROM posts WHERE post_by=1")->fetchColumn(); 
// echo $nb_post;


?>