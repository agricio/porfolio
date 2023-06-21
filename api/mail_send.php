<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//ambient variables
$parsed = parse_ini_file('../../keys.ini', true);

$_ENV[ENVIRONMENT] = $parsed['ENVIRONMENT'];

foreach ($parsed[$parsed['ENVIRONMENT']] as $key => $value) {
    $_ENV[$key] = $value;
}

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                           //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $_ENV['EMAIL'];                     //SMTP username
    $mail->Password   = $_ENV['PASSWORD'];                              //SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->client_email = $_ENV['EMAIL'];
    $mail->setFrom($_ENV['EMAIL'], ($_POST['name']));
    $mail->addAddress($_ENV['EMAIL'], 'Agricio');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo($_ENV['EMAIL'], 'Information');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = ($_POST['project']);
    $mail->Body    = ($_POST['message']);
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //"<script>alert('Thank you for the message. We will contact you shortly.');</script>
     echo 
        "<script type='text/javascript'>window.location.href='https://porfolio-khaki.vercel.app/#home'</script>";
    } catch (Exception $e) {
        echo "<script>alert('Sorry! Please try again.');</script>
        <script type='text/javascript'>window.location.href='https://porfolio-khaki.vercel.app/#contact'</script>"; 
    }

