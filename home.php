<?php
session_start();
require 'db.php'; // Make sure the DB connection is included

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Prepare and execute the query
$sql = "SELECT name, age, heart_rate, blood_pressure, glucose FROM health_data WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user_data = $result->fetch_assoc();

// Check if data exists
if ($user_data) {
    $name = $user_data['name'];
    $age = $user_data['age'];
    $heart_rate = $user_data['heart_rate'];
    $blood_pressure = $user_data['blood_pressure'];
    $glucose = $user_data['glucose'];
} else {
    // Default values if no health data is found
    $name = "User";
    $age = "N/A";
    $heart_rate = "N/A";
    $blood_pressure = "N/A";
    $glucose = "N/A";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($name); ?>!</h2>
    
    <p><strong>Age:</strong> <?php echo htmlspecialchars($age); ?></p>
    <p><strong>Heart Rate:</strong> <?php echo htmlspecialchars($heart_rate); ?> bpm</p>
    <p><strong>Blood Pressure:</strong> <?php echo htmlspecialchars($blood_pressure); ?></p>
    <p><strong>Glucose Level:</strong> <?php echo htmlspecialchars($glucose); ?> mg/dL</p>

    <a href="logout.php">Logout</a>
</body>
</html>
