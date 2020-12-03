<?php 

// SELECT * FROM `users` 
// WHERE user_date > (NOW() - INTERVAL 7 DAY);

// SELECT COUNT(*) 
// FROM users
// WHERE user_date > (NOW() - INTERVAL 7 DAY)


// $dtoday = date("Y-m-d H:m:s");     
// echo '------------'.$dtoday.'---';

// $today->modify('+1 day');
// $dlastw = date('Y-m-d', strtotime('-7 days', strtotime($dtoday))); 
// echo '---'.$dlastw.'<br>';


// echo date('M d, Y', $date);
// $date = date("+7 day", $date);
// echo date('M d, Y', $date);

$starttime = microtime(true);

//Do your query and stuff here



$dtoday = date("Y-m-d");   
$dtoday_1 = date('Y-m-d', strtotime('-'.$i.' days', strtotime($dtoday))); 






?>