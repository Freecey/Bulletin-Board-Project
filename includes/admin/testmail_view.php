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
// echo $_SERVER['HTTP_HOST'];
// echo '<br>';
// echo $_SERVER['DOCUMENT_ROOT'];
// echo $_SERVER[HTTP_HOST];
// echo '<br>';
// $hostname = getenv('HTTP_HOST');
// echo $hostname;
// echo '<br>';
// $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
// echo '<br>';
// echo $root;

include ($_SERVER['DOCUMENT_ROOT'].'/includes/function/randomword.php');

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
$eMailSiteN     = $MailSETTINGdata['set_sitename'];
$eMailServer    = $MailSETTINGdata['set_stmpsrv'];
$eMailPort      = $MailSETTINGdata['set_stmpport'];
$eMailUser      = $MailSETTINGdata['set_stmpusr'];
$eMailPass      = $MailSETTINGdata['set_stmppass'];
$eMailFromEMail = $MailSETTINGdata['set_emailsite'];
$eMailFromName  = $MailSETTINGdata['set_headername'];

$eMail_smtpauth = $MailSETTINGdata['set_email_smtpauth'];
$eMail_authtype = $MailSETTINGdata['set_email_authtype'];
$eMail_smtpsecure = $MailSETTINGdata['set_email_smtpsecure'];
$eMail_smtpautotls = $MailSETTINGdata['set_email_smtpautotls'];



// Load Composer's autoloader
require ($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

//test_mail_subject
//test_mail_to
//test_mail_msg
include ($_SERVER['DOCUMENT_ROOT'].'/includes/admin/testmail_form.php'); 

try {
    if(isset($_POST['testmail'])){
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = $eMailServer;                           // Set the SMTP server to send through
        $mail->SMTPAuth   = $eMail_smtpauth;                                  // Enable SMTP authentication
        $mail->Username   = $eMailUser;                             // SMTP username
        $mail->Password   = $eMailPass;                             // SMTP password
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = $eMailPort;                             // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->SMTPAutoTLS = $eMail_smtpautotls;
        //$mail->SMTPSecure = false;
        $mail->AuthType   = $eMail_authtype ;                               // CRAM-MD5, LOGIN, PLAIN, XOAUTH2. 
        $mail->SMTPSecure = $eMail_smtpsecure;

        //Recipients
        $mail->setFrom($eMailFromEMail, $eMailFromName);
        $mail->addAddress($_POST['test_mail_to'], $_POST['test_mail_to']);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject =  $_POST['test_mail_subject'];
        $mail->Body    =  $_POST['test_mail_msg'];
        $mail->AltBody =  $_POST['test_mail_msg'];

        $mail->send();
        echo 'Message has been sent to '. $_POST['test_mail_to'];
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}