<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include ($_SERVER['DOCUMENT_ROOT'].'/includes/connect.php'); 

$MSGSUBJECT = 'BBS-QUEEN: New post on Topics #'.$topic_id;


$MSGCONTENTTXT = 
'Hi,
You receive this email because you registered on BBS-QUEEN.
We would like to inform you that there a new post on a topic you have participated.

_____________________

Go directly to the post: https://bbs-queen.neant.be/comments.php?id='.$topic_id.'



_____________________
BBS-QUEEN Teams
bbs-queen@neant.be
https://bbs-queen.neant.be/';


$MSGCONTENTHTML = 
'Hi,<br>
You receive this email because you registered on BBS-QUEEN.<br>
We would like to inform you that there a new post on a topic you have participated.<br>
<br>
_____________________<br>
<br>

Go directly to the Topic: <a href="https://bbs-queen.neant.be/comments.php?id='.$topic_id.'">Click Here</a><br>
<br>
<br>
<br>
_____________________<br>
BBS-QUEEN Teams<br>
bbs-queen@neant.be<br>
<a href="https://bbs-queen.neant.be/">https://bbs-queen.neant.be/</a>';



$selectSETTING = $conn->prepare("SELECT*FROM sitesetting LIMIT 1");
$selectSETTING->setFetchMode(PDO::FETCH_ASSOC);
$selectSETTING->execute();
$MailSETTINGdata=$selectSETTING->fetch();

// echo $_SERVER['HTTP_HOST'];
// echo '<br>';
// echo $_SERVER['DOCUMENT_ROOT'];
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
$eMailSiteN     = $MailSETTINGdata['set_sitename'];
$eMailServer    = $MailSETTINGdata['set_stmpsrv'];
$eMailPort      = $MailSETTINGdata['set_stmpport'];
$eMailUser      = $MailSETTINGdata['set_stmpusr'];
$eMailPass      = $MailSETTINGdata['set_stmppass'];
$eMailToEMail   = $MailSETTINGdata['set_emailmgr'];
$eMailFromEMail = $MailSETTINGdata['set_emailsite'];
$eMailFromName  = $MailSETTINGdata['set_headername'];

$eMail_smtpauth = $MailSETTINGdata['set_email_smtpauth'];
$eMail_authtype = $MailSETTINGdata['set_email_authtype'];
$eMail_smtpsecure = $MailSETTINGdata['set_email_smtpsecure'];
$eMail_smtpautotls = $MailSETTINGdata['set_email_smtpautotls'];

// echo $eMailServer;

// Load Composer's autoloader
require ($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

// Instantiation and passing `true` enables exceptions

$SelectTOPID = $conn->prepare("SELECT post_by FROM posts WHERE post_topic = $topic_id");
$SelectTOPID->setFetchMode(PDO::FETCH_ASSOC);
$SelectTOPID->execute();

while($row_by = $SelectTOPID->fetch())
{
    $all_user_by[] = $row_by['post_by'];
}

$all_user_by = array_unique($all_user_by);


foreach($all_user_by as $post__by) {
    //echo $post__by;
    $SelectMailUSR = $conn->prepare("SELECT user_email,user_name FROM users WHERE user_id = $post__by");
    $SelectMailUSR->setFetchMode(PDO::FETCH_ASSOC);
    $SelectMailUSR->execute();
    $USER_DT_MAIL=$SelectMailUSR->fetch();
    // echo '<pre>' . print_r($USER_DT_MAIL, TRUE) . '</pre>';
    // echo $USER_DT_MAIL[user_name];
    // echo $USER_DT_MAIL[user_email];


$mail = new PHPMailer(true);

//test_mail_subject
//test_mail_to
//test_mail_msg
$TRY_ONE = 1;

try {
    
    if($TRY_ONE == 1){
    //if(isset($_POST['sendformtomail'])){
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = $eMailServer;                           // Set the SMTP server to send through
        $mail->SMTPAuth   = $eMail_smtpauth;                                  // Enable SMTP authentication
        $mail->Username   = $eMailUser;                             // SMTP username
        $mail->Password   = $eMailPass;                             // SMTP password
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = $eMailPort;                             // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->SMTPAutoTLS = $eMail_smtpautotls;
        $mail->AuthType   = $eMail_authtype ;                               // CRAM-MD5, LOGIN, PLAIN, XOAUTH2. 
        $mail->SMTPSecure = $eMail_smtpsecure;

        //Recipients
        $mail->setFrom($eMailFromEMail, 'BBS-Queen NOREPLY');
        $mail->addAddress($USER_DT_MAIL['user_email'], $USER_DT_MAIL['user_name']);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject =  $MSGSUBJECT;
        $mail->Body    =  $MSGCONTENTHTML;
        $mail->AltBody =  $MSGCONTENTTXT;

        $mail->send();
        // echo 'Message has been sent to BBS-Queen Teams';
        $TRY_ONE = 2;
    }elseif($TRY_ONE == 1){
            //if(isset($_POST['sendformtomail'])){
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
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
        $mail->setFrom($eMailFromEMail, 'BBS-Queen NOREPLY');
        $mail->addAddress($USER_DT_MAIL['user_email'], $USER_DT_MAIL['user_name']);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject =  $MSGSUBJECT;
        $mail->Body    =  $MSGCONTENTHTML;
        $mail->AltBody =  $MSGCONTENTTXT;

        $mail->send();
        // echo 'Message has been sent to BBS-Queen Teams';
        $TRY_ONE == 2;
    }

    //}
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}