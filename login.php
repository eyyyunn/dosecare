<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-image: url('bg.jpg'); /* Background Image */
      background-size: cover;
      background-position: center;
    }

    .container {
      position: relative;
      width: 100%;
      max-width: 400px;
      padding: 40px;
      border-radius: 15px;
      color: white;
      text-align: center;
      box-shadow: 8px 8px 15px rgba(0, 0, 0, 0.2); /* Shadow only on right & bottom */
    }

    /* This div applies the blur effect with a light blue tint */
    .blur-background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(1, 86, 143, 0.2); /* Light Blue Tint */
      backdrop-filter: blur(10px); /* Blur Effect */
      border-radius: 15px;
      z-index: -1; /* Keeps it behind the form */
    }

    h2 {
      margin-bottom: 20px;
      font-size: 28px;
      font-weight: bold;
    }

    .input-group {
      margin-bottom: 20px;
      text-align: left;
    }

    .input-group label {
      font-size: 14px;
      display: block;
      margin-bottom: 5px;
    }

    .input-group input {
      width: 100%;
      padding: 12px;
      border-radius: 5px;
      border: none;
      font-size: 16px;
      background-color: white; /* Clear white inputs */
      color: #333;
      outline: none;
      transition: all 0.3s ease-in-out;
    }

    /* Input animation on focus */
    .input-group input:focus {
      border: 2px solid #0056b3;
      box-shadow: 0px 0px 8px rgba(0, 86, 179, 0.6);
      transform: scale(1.05);
    }

    .submit-btn {
      width: 100%;
      padding: 12px;
      background-color: black;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
      background-color: #222;
    }

    .alr-acc {
      font-size: 14px;
      margin-top: 15px;
    }

    .login {
      color: white;
      font-weight: bold;
      text-decoration: none;
    }

    .login:hover {
      text-decoration: underline;
    }
  </style>
</head>
<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT id, name, password, role FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["name"];
        $_SESSION["role"] = $user["role"];

        if ($user["role"] == "admin") {
            header("Location: admin_dash.php"); // Redirect admins
        } else {
            header("Location: home.php"); // Redirect normal users
        }
        exit();
    } else {
        echo "Invalid email or password!";
    }
}
?>

<body>
  <div class="container">
    <div class="blur-background"></div> <!-- This is the blur layer -->

    <h2>Login</h2>
    <form action="loginProcess.php" method="post" autocomplete="on">

      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" autocomplete="email" required>
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button type="submit" class="submit-btn" name="submit">Log In</button>

      <p class="alr-acc">Don't have an account? <a class="login" href="signup.html">Sign Up</a></p>
    </form>
  </div>
</body>
</html>