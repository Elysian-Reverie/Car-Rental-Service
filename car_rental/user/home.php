<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Home</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
    <p>This is your dashboard.</p>
    <a href="../logout.php">Logout</a>
</body>
</html>
