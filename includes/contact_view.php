<?php
//contact_view.php

//include 'includes/getdata/sitesettingMail.php';
// use $SETTINGdata[]

//Load PHPMailer
// include 'includes/PHPMailer/Exception.php';
// include 'includes/PHPMailer/PHPMailer.php';
// include 'includes/PHPMailer/SMTP.php';
// include  'includes/PHPMailer/OAuth.php';

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

echo '123';

// noreply BBS
// noreply_bbs-queen@neant.be
// wKeUr4bXj6
// PORT 25  587 465

$mail = new PHPMailer;
//$mail = new PHPMailer();
echo '555555555';
try {
    //Server settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
echo '4444444444';
$mail->Host       = "send.one.com"; // SMTP server example
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
$mail->Username   = "bbs-queen@iweep.be"; // SMTP account username example
$mail->Password   = "123456Az.";        // SMTP account password example
$mail->SMTPSecure = 'tls';   

//Recipients
$mail->setFrom('bbs-queen@iweep.be', 'BBS-QUEEN - Cedric');
$mail->addAddress('cedric@audrit.be', 'Cedric AUDRIT');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//// Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name


// Content
$mail->isHTML(true);                                // Set email format to HTML
$mail->Subject = 'this is a test';
$mail->Body    = 'test mail form phpmail<b>in bold!</b>';
$mail->AltBody = 'test mail form phpmail';
echo '4444444444';  
echo '123123';
$mail->send();
echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



?>