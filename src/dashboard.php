<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Ride Sharing</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_firstname']); ?>!</h1>
    <p>You have successfully logged in to Rwanda Ride Sharing system.</p>
    <a href="logout.php">Logout</a>
</body>
</html>