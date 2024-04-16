
<?php

session_start(); // Start the session
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$project = $_SESSION['project'];

$emailContent = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h1>Hello: $name;</h1>
    <p>Thank you for purchasing the: $email;!</p>
    <p>The price was: <?php echo $project; ?>.</p>
</body>
</html>
HTML;

?>



