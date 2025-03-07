<?php
session_start();
require 'db.php';
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit();
}

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
    <title>Health Data</title>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div style="margin-left:260px; padding:20px;">
        <h2>Health Data Table</h2>
        <table border="1">
            <tr><th>User ID</th><th>Name</th><th>Age</th><th>Heart Rate</th><th>Blood Pressure</th><th>Glucose Level</th></tr>
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
    </div>
</body>
</html>
