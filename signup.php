<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

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

        .input-wrapper .eye-container {
            position: absolute;
            right: 10px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .input-wrapper .eye-container i {
            color: #777;
            font-size: 18px;
        }

        .input-wrapper .eye-container:hover i {
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
            margin-top: 10px;
        }

        .submit-btn:hover {
            background-color: #222;
        }

        .submit-btn:disabled {
            background-color: gray;
            cursor: not-allowed;
        }

        .alr-acc {
            font-size: 14px;
            margin-top: 15px;
        }

        .login {
            color: #4d8de1;
            font-weight: bold;
            text-decoration: none;
        }

        .login:hover {
            text-decoration: underline;
        }

        /* Error Message */
        .error-msg {
            color: red;
            font-size: 14px;
            font-weight: bold;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Signup</h2>
        <form action="signupProcess.php" method="post" onsubmit="return validateForm()">
            <div class="input-group">
                <label for="name">Full Name</label>
                <div class="input-wrapper">
                    <input type="text" id="name" name="name" required>
                </div>
            </div>
            
            <div class="input-group">
                <label for="email">Email</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" required>
                </div>
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" required onkeyup="checkPasswordMatch()">
                    <span class="eye-container" onclick="togglePassword('password', this)">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
            </div>

            <div class="input-group">
                <label for="confirm_password">Confirm Password</label>
                <div class="input-wrapper">
                    <input type="password" id="confirm_password" name="confirm_password" required onkeyup="checkPasswordMatch()">
                    <span class="eye-container" onclick="togglePassword('confirm_password', this)">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
                <p id="error-msg" class="error-msg">Passwords do not match!</p>
            </div>
            
            <button type="submit" class="submit-btn" id="submit-btn" disabled>Sign Up</button>

            <p class="alr-acc">Already have an account? <a class="login" href="login.php">Login</a></p>
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

        function checkPasswordMatch() {
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("confirm_password").value;
            let errorMsg = document.getElementById("error-msg");
            let submitBtn = document.getElementById("submit-btn");

            if (password === confirmPassword && password !== "") {
                errorMsg.style.display = "none";
                submitBtn.disabled = false;
            } else {
                errorMsg.style.display = "block";
                submitBtn.disabled = true;
            }
        }

        function validateForm() {
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("confirm_password").value;

            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
