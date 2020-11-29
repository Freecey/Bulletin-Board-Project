<?php
//contact.php

include 'includes/1head.php';
include 'includes/2body.php';

echo 'Contact';
echo '<br>';
echo 'SOON feature in way';
echo '<br>';
echo 'IN TEST SEND A MAIL TO :'. $_SESSION[user_email];
echo '<br>';

include 'includes/contact_view.php';

include 'includes/3body.php';
include 'includes/4foot.php';

?>