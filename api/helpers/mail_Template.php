
<?php

$emailContent = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h1>Hello: $t_name ;</h1>
    <p>Thank you for purchasing the: $t_email;!</p>
    <p>The price was: <?php echo $t_project; ?>.</p>
</body>
</html>
HTML;

?>



