<?php
session_start();
include "db.php"; // Ensure you have a file to establish DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare and execute query to get user data
    $sql = "SELECT id, name, password, role FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];
            $_SESSION["user_role"] = $user["role"];

            // Redirect based on role
            if ($user["role"] === "admin") {
                header("Location: admin_dash.php");
            } else {
                header("Location: home.php");
            }
            exit();
        } else {
            echo "❌ Invalid password!";
        }
    } else {
        echo "❌ Invalid email!";
    }
    
    $stmt->close();
    $conn->close();
}
?>
