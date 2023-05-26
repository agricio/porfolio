<?php
$name = $_POST['name'];
$email = $_POST['email'];
$type = $_POST['project'];
$message = $_POST['message'];
$recipient = "nerovigiann@hotmail.com";
$subject = "project";
$mailheader = "From: $email \r\n";

mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");

$mail_status = mail($recipient, $subject, $formcontent, $mailheader);

//if($mail_status == true){
//    echo "<script>alert('Thank you for the message. We will contact you shortly.');</script>";
//    header('Location:https://santosgeneralservice.com/index.html');
//}else{
//    echo "<script>alert('Sorry! Please try again.');</script>";
//    header('Location:https://santosgeneralservice.com/pages/request.html');/
//}

if ($mail_status) {    
        echo "<script>alert('Thank you for the message. We will contact you shortly.');</script>
        <script type='text/javascript'>window.location.href='https://porfolio-khaki.vercel.app/#home'</script>"; 
    } else {
         echo "<script>alert('Sorry! Please try again.');</script>
        <script type='text/javascript'>window.location.href='https://porfolio-khaki.vercel.app/#contact'</script>"; }
  ?>
