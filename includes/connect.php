<?php
//connect.php
try
{
    $conn = new PDO('mysql:host=db.bbs-queen.neant.be; port=33060; dbname=BCBB', 'bcbb-site', 'BCBB0pwdSITE--',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
}
catch (Exception $e)
{
    die('Erreur : ' .$e->connect_error);
}
?>