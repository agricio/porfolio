<?php
$name = utf8_encode($_POST['name']);
$email = utf8_encode($_POST['email']);
$type = utf8_encode($_POST['project']);
$message = utf8_encode($_POST['message']);

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

//set e-mail server

$mail->Host = "smtp.gmail.com";
$mail->Port = "587";
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = "true";
$mail->Username = "nerovigiann@gmail.com";
$mail->Password = "suasenha";

//Message Configuration

$mail->setForm($mail->Username, "Seu Nome"); // Remetente
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








