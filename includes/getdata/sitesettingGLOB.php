<?php
$selectSETTING = $conn->prepare("SELECT*FROM sitesetting LIMIT 1");
$selectSETTING->setFetchMode(PDO::FETCH_ASSOC);
$selectSETTING->execute();
$SETTINGdata=$selectSETTING->fetch();

$SITENAME = $SETTINGdata['set_sitename'];

?>