<?php
session_start();
require 'db.php'; // Ensure this file connects to your database

// Ensure only admin users can access the dashboard
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit();
}

// Fetch data from first table (Users)
$sql_users = "SELECT id, name, email, role FROM users";
$result_users = $conn->query($sql_users);

// Fetch data from second table (Health Data) with User Name using JOIN
$sql_health = "SELECT h.user_id, u.name, h.age, h.heart_rate, h.blood_pressure, h.glucose 
               FROM health_data h
               JOIN users u ON h.user_id = u.id";
$result_health = $conn->query($sql_health);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background: #333;
            color: white;
        }
    </style>
</head>
<body>

    <h2>Admin Dashboard</h2>

    <h3>Users Table</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        <?php while ($row = $result_users->fetch_assoc()): ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["role"] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h3>Health Data Table</h3>
    <table>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Heart Rate</th>
            <th>Blood Pressure</th>
            <th>Glucose Level</th>
        </tr>
        <?php while ($row = $result_health->fetch_assoc()): ?>
            <tr>
                <td><?= $row["user_id"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["age"] ?></td>
                <td><?= $row["heart_rate"] ?> bpm</td>
                <td><?= $row["blood_pressure"] ?></td>
                <td><?= $row["glucose"] ?> mg/dL</td>
            </tr>
        <?php endwhile; ?>
    </table>

    <br>
    <a href="logout.php">Logout</a>

</body>
</html>
