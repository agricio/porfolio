<?php

use Mailtrap\Config;
use Mailtrap\EmailHeader\CategoryHeader;
use Mailtrap\EmailHeader\CustomVariableHeader;
use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Header\UnstructuredHeader;

require __DIR__ . '/vendor/autoload.php';

// your API token from here https://mailtrap.io/api-tokens
$apiKey = getenv('7db33f994ce7c9116121e8625928ceb6');
$mailtrap = new MailtrapClient(new Config($apiKey));

$name = ($_POST['name']);
$email = ($_POST['email']);
$type = ($_POST['project']);
$message = ($_POST['message']);

$email = (new Email())
    ->from(new Address($email, 'Mailtrap Test'))
    ->to(new Address('nerovigiann@gmail.com', 'Jon'))
    ->subject('Best practices of building HTML emails')
    ->text('Hey! Learn the best practices of building HTML emails and play with ready-to-go templates. Mailtrap’s Guide on How to Build HTML Email is live on our blog')
    ->html(
        '<html>
        <body>
        <p><br>Hey</br>
        Learn the best practices of building HTML emails and play with ready-to-go templates.</p>
        <p><a href="https://mailtrap.io/blog/build-html-email/">Mailtrap’s Guide on How to Build HTML Email</a> is live on our blog</p>
        <img src="cid:logo">
        </body>
    </html>'
    )
    ->embed(fopen('https://mailtrap.io/wp-content/uploads/2021/04/mailtrap-new-logo.svg', 'r'), 'logo', 'image/svg+xml')
    ;
    
    // Headers
    $email->getHeaders()
    ->addTextHeader('X-Message-Source', 'domain.com')
    ->add(new UnstructuredHeader('X-Mailer', 'Mailtrap PHP Client')) // the same as addTextHeader
    ;
    
    // Custom Variables
    $email->getHeaders()
    ->add(new CustomVariableHeader('user_id', '45982'))
    ->add(new CustomVariableHeader('batch_id', 'PSJ-12'))
    ;
    
    // Category (should be only one)
    $email->getHeaders()
    ->add(new CategoryHeader('Integration Test'))
    ;
    
try {
    $response = $mailtrap->sending()->emails()->send($email); // Email sending API (real)
    
    var_dump(ResponseHelper::toArray($response)); // body (array)
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// OR send email to the Mailtrap SANDBOX

try {
    $response = $mailtrap->sandbox()->emails()->send($email, 1000001); // Required second param -> inbox_id

    var_dump(ResponseHelper::toArray($response)); // body (array)
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}