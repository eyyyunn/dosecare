<?php
session_start();
require 'db.php';
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div style="margin-left:260px; padding:20px;">
        <h2>Welcome to the Admin Dashboard</h2>
        <p>Use the sidebar to navigate.</p>
    </div>
</body>
</html>
