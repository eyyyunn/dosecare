<?php
session_start();
$conn = new mysqli("localhost", "root", "", "health_tracker");

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: login.php?error=Invalid email format");
        exit();
    }

    // Prepare SQL statement
    $sql = "SELECT id, name, password, role FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        // Verify password
        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];
            $_SESSION["role"] = $user["role"];

            // mo redirect base sa role 
            if ($user["role"] === "admin") {
                header("Location: dashboard.php");
            } else {
                header("Location: home.php");
            }
            exit();
        } else {
            header("Location: login.php?error=Invalid email or password");
            exit();
        }
    } else {
        header("Location: login.php?error=Database error");
        exit();
    }
}
$conn->close();
?>
