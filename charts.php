<?php
session_start();
require 'db.php';
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit();
}

// Fetch user roles count
$sql_roles = "SELECT role, COUNT(*) as count FROM users GROUP BY role";
$result_roles = $conn->query($sql_roles);
$roles = [];
$role_counts = [];
while ($row = $result_roles->fetch_assoc()) {
    $roles[] = $row["role"];
    $role_counts[] = $row["count"];
}

// Fetch average heart rate per user
$sql_heart_rate = "SELECT u.name, AVG(h.heart_rate) as avg_heart_rate 
                   FROM health_data h 
                   JOIN users u ON h.user_id = u.id 
                   GROUP BY h.user_id";
$result_heart_rate = $conn->query($sql_heart_rate);
$users = [];
$heart_rates = [];
while ($row = $result_heart_rate->fetch_assoc()) {
    $users[] = $row["name"];
    $heart_rates[] = $row["avg_heart_rate"];
}

// Fetch blood pressure levels
$sql_bp = "SELECT blood_pressure, COUNT(*) as count FROM health_data GROUP BY blood_pressure";
$result_bp = $conn->query($sql_bp);
$bp_levels = [];
$bp_counts = [];
while ($row = $result_bp->fetch_assoc()) {
    $bp_levels[] = $row["blood_pressure"];
    $bp_counts[] = $row["count"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts & Analytics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 400px;
            height: 300px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div style="margin-left:260px; padding:20px;">
        <h2>Charts & Analytics</h2>

        <h3>Users by Role</h3>
        <div class="chart-container">
            <canvas id="roleChart"></canvas>
        </div>

        <h3>Average Heart Rate per User</h3>
        <div class="chart-container">
            <canvas id="heartRateChart"></canvas>
        </div>

        <h3>Blood Pressure Distribution</h3>
        <div class="chart-container">
            <canvas id="bpChart"></canvas>
        </div>
    </div>

    <script>
        // Users by Role Chart (Bar)
        new Chart(document.getElementById("roleChart"), {
            type: "bar",
            data: {
                labels: <?= json_encode($roles) ?>,
                datasets: [{
                    label: "Number of Users",
                    data: <?= json_encode($role_counts) ?>,
                    backgroundColor: ["blue", "green", "red"]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Average Heart Rate Chart (Line)
        new Chart(document.getElementById("heartRateChart"), {
            type: "line",
            data: {
                labels: <?= json_encode($users) ?>,
                datasets: [{
                    label: "Avg Heart Rate (bpm)",
                    data: <?= json_encode($heart_rates) ?>,
                    borderColor: "red",
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Blood Pressure Chart (Pie)
        new Chart(document.getElementById("bpChart"), {
            type: "pie",
            data: {
                labels: <?= json_encode($bp_levels) ?>,
                datasets: [{
                    label: "Blood Pressure Count",
                    data: <?= json_encode($bp_counts) ?>,
                    backgroundColor: ["yellow", "blue", "green", "red"]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</body>
</html>
