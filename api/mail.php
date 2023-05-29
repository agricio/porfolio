<?php
$name = ($_POST['name']);
$email = ($_POST['email']);
$type = ($_POST['project']);
$message = ($_POST['message']);

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

//set e-mail server

$mail->Host = "smtp.live.com";
$mail->Port = "465";
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = "true";
$mail->Username = "nerovigiann@gmail.com";
$mail->Password = "Snowbreese00";

//Message Configuration

$mail->setForm($email); // Remetente
$mail->addAddress('nerovigiann@gmail.com'); //Destinatario
$mail->Subject = "Fale Conosco"; // Assunto do e-mail

$conteudo_email = "
    Voce recebeu uma mensagem de $nome ($email):
    <br><br>
    Mensagem:<br>
    $mensagem
";

$mail->IsHTML(true);
$mail->Body = $conteudo_email;

if ($mail->send()) {    
    echo "<script>alert('Thank you for the message. We will contact you shortly.');</script>
    <script type='text/javascript'>window.location.href='https://porfolio-khaki.vercel.app/#home'</script>"; 
} else {
     echo "<script>alert('Sorry! Please try again.');</script>
    <script type='text/javascript'>window.location.href='https://porfolio-khaki.vercel.app/#contact'</script>"; }



//  if($mail_status == true){
//    echo "<script>alert('Thank you for the message. We will contact you shortly.');</script>";
//    header('Location:https://santosgeneralservice.com/index.html');
//}else{
//    echo "<script>alert('Sorry! Please try again.');</script>";
//    header('Location:https://santosgeneralservice.com/pages/request.html');/
//}


?>








