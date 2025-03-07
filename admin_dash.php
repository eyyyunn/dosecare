<?php
session_start();
require 'db.php';

// Ensure only admin users can access the dashboard
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit();
}

// Fetch user data
$sql_users = "SELECT id, name, email, role FROM users";
$result_users = $conn->query($sql_users);

$roles_count = ["admin" => 0, "user" => 0];
$users_data = [];
while ($row = $result_users->fetch_assoc()) {
    $users_data[] = $row;
    if (isset($roles_count[$row["role"]])) {
        $roles_count[$row["role"]]++;
    }
}

// Fetch health data
$sql_health = "SELECT h.user_id, u.name, h.age, h.heart_rate, h.blood_pressure, h.glucose 
               FROM health_data h
               JOIN users u ON h.user_id = u.id";
$result_health = $conn->query($sql_health);

$health_data = [];
while ($row = $result_health->fetch_assoc()) {
    $health_data[] = $row;
}

// Encode data for JavaScript
$roles_json = json_encode(array_values($roles_count));
$health_json = json_encode($health_data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #333;
            color: white;
            position: fixed;
            padding-top: 20px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px;
            text-align: center;
            cursor: pointer;
            border-bottom: 1px solid #444;
            transition: 0.3s;
        }
        .sidebar ul li:hover {
            background: #555;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
        section {
            padding: 20px;
            margin-bottom: 40px;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #333;
            color: white;
        }
        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="#dashboard">Dashboard</a></li>
            <li><a href="#users">Users Table</a></li>
            <li><a href="#health">Health Data</a></li>
            <li><a href="#charts">Charts & Analytics</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">

        <section id="dashboard">
            <h2>Admin Dashboard Overview</h2>
            <p>Welcome to the Admin Dashboard! Use the sidebar to navigate between sections.</p>
        </section>

        <section id="users">
            <h2>Users Table</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
                <?php foreach ($users_data as $row): ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["name"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["role"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>

        <section id="health">
            <h2>Health Data Table</h2>
            <table>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Heart Rate</th>
                    <th>Blood Pressure</th>
                    <th>Glucose Level</th>
                </tr>
                <?php foreach ($health_data as $row): ?>
                    <tr>
                        <td><?= $row["user_id"] ?></td>
                        <td><?= $row["name"] ?></td>
                        <td><?= $row["age"] ?></td>
                        <td><?= $row["heart_rate"] ?> bpm</td>
                        <td><?= $row["blood_pressure"] ?></td>
                        <td><?= $row["glucose"] ?> mg/dL</td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>

        <section id="charts">
            <h2>Charts & Analytics</h2>
            <div class="chart-container">
                <canvas id="userRoleChart"></canvas>
            </div>
            <br>
            <div class="chart-container">
                <canvas id="healthDataChart"></canvas>
            </div>
        </section>

    </div>

    <script>
        // Smooth Scroll
        document.querySelectorAll('.sidebar a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                target.scrollIntoView({ behavior: 'smooth' });
            });
        });

        // Parse PHP JSON data
        const rolesData = <?= $roles_json ?>;
        const healthData = <?= $health_json ?>;

        // User Role Chart
        new Chart(document.getElementById('userRoleChart'), {
            type: 'pie',
            data: {
                labels: ['Admins', 'Users'],
                datasets: [{
                    label: 'User Roles',
                    data: rolesData,
                    backgroundColor: ['#ff6384', '#36a2eb'],
                    hoverOffset: 4
                }]
            }
        });

        // Health Data Line Chart
        new Chart(document.getElementById('healthDataChart'), {
            type: 'line',
            data: {
                labels: healthData.map(h => h.name),
                datasets: [
                    { label: 'Heart Rate (bpm)', data: healthData.map(h => h.heart_rate), borderColor: 'red', borderWidth: 2, fill: false },
                    { label: 'Blood Pressure (Systolic)', data: healthData.map(h => parseInt(h.blood_pressure.split('/')[0])), borderColor: 'blue', borderWidth: 2, fill: false },
                    { label: 'Glucose Level (mg/dL)', data: healthData.map(h => h.glucose), borderColor: 'green', borderWidth: 2, fill: false }
                ]
            }
        });
    </script>

</body>
</html>
