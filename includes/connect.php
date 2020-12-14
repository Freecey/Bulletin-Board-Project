<?php
//connect.php
try
{
    $conn = new PDO('mysql:host=HOSTNAME; port=XXXX; dbname=DATABASE', 'USERNAME', 'PASSWORD',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
}
catch (Exception $e)
{
    die('Erreur : ' .$e->connect_error);
}
?>
