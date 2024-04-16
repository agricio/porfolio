
<?php

$emailContent = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h1>Hello: {{name}}</h1>
    <p>Thank you for purchasing the: {{email}};!</p>
    <p>The price was: <?php echo {{project}} ?>.</p>
</body>
</html>
HTML;

?>



