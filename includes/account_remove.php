<?php


if(isset($_POST['btn_confirm'])){
    if($_POST['typed'] == 'i want to leave' ){
       



$ACT_user_id = $_SESSION['user_id'];
$str = crc32("$ACT_user_id");


$UPD_user_name = 'Del_'.$str;
$UPD_user_fname = 'Del_F'.$str;
$UPD_user_lname = 'Del_L'.$str;
$UPD_user_sign = 'I hope to see you soon back';
$UPD_user_email = 'Del_L'.$str.'@deleted.lan';
$UPD_pwd_new_hast = hash('sha512', $UPD_user_name);
$UPD_user_secquest = 'Your favorite word ?';
$UPD_user_secansw = crc32(rand());
$UPD_DOBy = '1970';
$UPD_DOBm = '01';
$UPD_DOBd = '01';
$UPD_full_DATE = mktime(0, 0, 0, $UPD_DOBm, $UPD_DOBd, $UPD_DOBy);
$UPD_DOB = date('Y-m-d', $UPD_full_DATE);
$imglocalURLwebp = 'https://'. $_SERVER['HTTP_HOST'] .'/assets/avatar/deleted.webp';

$UPDATEQuerySQL1 = "UPDATE `users` 
    SET `user_name` = '$UPD_user_name',
        `user_fname` = '$UPD_user_fname',
        `user_lname` = '$UPD_user_lname',
        `user_sign` = '$UPD_user_sign',
        `user_datebirthday` = '$UPD_DOB',
        `user_secquest` = '$UPD_user_secquest',
        `user_secansw` = '$UPD_user_secansw',
        `user_email` = '$UPD_user_email',
        `user_image` = '$imglocalURLwebp',
        `user_pass` = '$UPD_pwd_new_hast', 
        `user_active` = '0'
        WHERE `users`.`user_id` = $ACT_user_id";
// echo $UPDATEQuerySQL1;
$Prof_UpdateINSERT= $conn->prepare($UPDATEQuerySQL1);
$Prof_UpdateINSERT->execute();

$_SESSION['user_name'] = $UPD_user_name;





$UPDATEQuerySQL3 = "UPDATE `users` 
SET `user_imglocal` = '$imglocalURLwebp',
    `user_image` = '$imglocalURLwebp'
        WHERE `users`.`user_id` = $ACT_user_id";
// echo $UPDATEQuerySQL1;
$Prof_UpdateINSERT= $conn->prepare($UPDATEQuerySQL3);
$Prof_UpdateINSERT->execute();

$blob = file_get_contents($imglocalURLwebp);
        
$sql = "UPDATE users SET user_imgdata = :user_imgdata
                WHERE user_id = $ACT_user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_imgdata', $blob, PDO::PARAM_LOB);

$stmt->execute();

$_SESSION['DELETE_ACC'] = 1;
session_destroy();

header("Location: /");

header("Location: /");
header("Location: logout.php");

}}

?>