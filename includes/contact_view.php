<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = '';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = False;                                   // Enable SMTP authentication
    $mail->UserName   = '';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPAutoTLS = True;
    //$mail->SMTPSecure = false;
    $mail->AuthType   = 'LOGIN' ;                   // CRAM-MD5, LOGIN, PLAIN, XOAUTH2. 

    //Recipients
    $mail->setFrom('cedric@neant.be', 'BBS-Queen - Cedric AUDRIT');
    $mail->addAddress('cedric@audrit.be', 'Cedric');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject 123';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b><br>phpMailer 123';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients, phpMailer';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}