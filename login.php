<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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
            background-color: #9dcaff;
        }

        .container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            text-align: center;
            box-shadow: 8px 8px 15px rgba(0, 0, 0, 0.2);
            background: rgb(250, 250, 250);
            border-radius: 10px;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: bold;
            color: #4d8de1;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            font-size: 14px;
            display: block;
            margin-bottom: 5px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper input {
            width: 100%;
            padding: 12px;
            padding-right: 40px;
            border-bottom: 1px solid black;
            border-top: none;
            border-left: none;
            border-right: none;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease-in-out;
        }

        .input-wrapper input:focus {
            border: 2px solid #0056b3;
            box-shadow: 0px 0px 8px rgba(0, 86, 179, 0.6);
            transform: scale(1.05);
        }

        .eye-container {
            position: absolute;
            right: 10px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .eye-container i {
            color: #777;
            font-size: 18px;
            transition: transform 0.3s ease-in-out;
        }

        .input-wrapper input:focus + .eye-container i {
            transform: scale(1.2);
        }

        .eye-container:hover i {
            color: #222;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: rgba(83, 84, 87, 0.98);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background-color: #222;
        }

        .alr-acc {
            font-size: 14px;
            margin-top: 15px;
        }

        .signup {
            color: #4d8de1;
            font-weight: bold;
            text-decoration: none;
        }

        .signup:hover {
            text-decoration: underline;
        }

        /* Error message styling */
        .error-msg {
            color: red;
            font-weight: bold;
            animation: blink 1s infinite alternate;
        }

        @keyframes blink {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>

        <?php if (isset($_GET["error"])): ?>
            <p id="error-msg" class="error-msg"><?php echo htmlspecialchars($_GET["error"]); ?></p>
        <?php endif; ?>

        <form action="loginProcess.php" method="post">
            <div class="input-group">
                <label for="email">Email</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" required>
                </div>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" required>
                    <span class="eye-container" onclick="togglePassword('password', this)">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
            </div>
            
            <button type="submit" class="submit-btn" name="submit">Log In</button>

            <p class="alr-acc">Don't have an account? <a class="signup" href="signup.php">Sign Up</a></p>
        </form>
    </div>

    <script>
        function togglePassword(inputId, eyeContainer) {
            let inputField = document.getElementById(inputId);
            let eyeIcon = eyeContainer.querySelector("i");

            if (inputField.type === "password") {
                inputField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                inputField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }

        // Hide error message after 10 seconds
        window.onload = function () {
            let errorMsg = document.getElementById("error-msg");
            if (errorMsg) {
                setTimeout(function () {
                    errorMsg.style.display = "none";
                }, 5000);
            }
        };
    </script>
</body>
</html>
