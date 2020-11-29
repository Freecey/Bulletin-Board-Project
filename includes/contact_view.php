<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$selectSETTING = $conn->prepare("SELECT*FROM sitesetting LIMIT 1");
$selectSETTING->setFetchMode(PDO::FETCH_ASSOC);
$selectSETTING->execute();
$MailSETTINGdata=$selectSETTING->fetch();


// echo '<pre>' . print_r($MailSETTINGdata, TRUE) . '</pre>';

//set_sitename
//set_headername	
//set_emailenable
//set_emailsite
//set_stmpsrv
//set_stmpport
//set_stmpusr
//set_stmppass

//set_SMTPAuth
//set_SMTPAuthType
$eMailSiteN     = $MailSETTINGdata[set_sitename];
$eMailServer    = $MailSETTINGdata[set_stmpsrv];
$eMailPort      = $MailSETTINGdata[set_stmpport];
$eMailUser      = $MailSETTINGdata[set_stmpusr];
$eMailPass      = $MailSETTINGdata[set_stmppass];
$eMailFromEMail = $MailSETTINGdata[set_emailsite];
$eMailFromName  = $MailSETTINGdata[set_headername];
 echo $eMailServer;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = $eMailServer;                           // Set the SMTP server to send through
    $mail->SMTPAuth   = False;                                  // Enable SMTP authentication
    $mail->UserName   = $eMailUser;                             // SMTP username
    $mail->Password   = $eMailPass;                             // SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = $eMailPort;                             // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPAutoTLS = True;
    //$mail->SMTPSecure = false;
    $mail->AuthType   = 'LOGIN' ;                               // CRAM-MD5, LOGIN, PLAIN, XOAUTH2. 

    //Recipients
    $mail->setFrom($eMailFromEMail, $eMailFromName);
    $mail->addAddress($_SESSION[user_email], $_SESSION[user_name]);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject =  $MailSETTINGdata[set_sitename].' : Test Mail';
    $mail->Body    = 'PHPMAIL <br> This is the HTML message body <b>in bold!</b>.';
    $mail->AltBody = 'PHPMAIL, This is the body in plain text for non-HTML mail clients.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}