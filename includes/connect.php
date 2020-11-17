<?php
//connect.php
$server = 'localhost';
$username   = 'bcbb-site';
$password   = 'BCBB0pwdSITE--';
$database   = 'BCBB';

if(!mysql_connect($server, $username,  $password))
{
    exit('Error: could not establish database connection');
}
if(!mysql_select_db($database))
{
    exit('Error: could not select the database');
}
?>