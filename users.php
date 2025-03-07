<?php
session_start();
require 'db.php';
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit();
}

$sql_users = "SELECT id, name, email, role FROM users";
$result_users = $conn->query($sql_users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div style="margin-left:260px; padding:20px;">
        <h2>Users Table</h2>
        <table border="1">
            <tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th></tr>
            <?php while ($row = $result_users->fetch_assoc()): ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["role"] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
