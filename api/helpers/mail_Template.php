
<?php

session_start(); // Start the session
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$project = $_SESSION['project'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h1>Hello, <?php echo $name; ?></h1>
    <p>Thank you for purchasing the <?php echo $email; ?>!</p>
    <p>The price was <?php echo $project; ?>.</p>
</body>
</html>



