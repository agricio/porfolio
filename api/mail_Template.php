<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h1>Hello, <?= htmlspecialchars($name) ?>!</h1>
    <p>Thank you for purchasing the <?= htmlspecialchars($email) ?>!</p>
    <p>The price was $<?= htmlspecialchars($project) ?>.</p>
</body>
</html>


