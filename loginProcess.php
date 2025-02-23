<?php
session_start();
$conn = new mysqli("localhost", "root", "", "health_tracker");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT id, name, password, role FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["name"];
        $_SESSION["role"] = $user["role"];

        // Redirect based on role
        if ($user["role"] === "admin") {
            header("Location: admin_dash.php");
        } else {
            header("Location: home.php");
        }
        exit();
    } else {
        echo "❌ Invalid email or password!";
    }
    
    $stmt->close();
}
$conn->close();
?>
