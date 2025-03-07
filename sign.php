<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #c0e0fc, #7b7ee2);
        }
        .inp {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            display: flex;
            width: 750px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid red;
            height: 600px;
        }

        .left, .right {
            width: 50%;
            padding: 30px;
        }

        .left {
            background: white;
        }

        .right {
            background: #3f2b9c;
            color: white;
        }

        h2 {
            margin-bottom: 15px;
        }

        label, input, select {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            font-size: 0.8rem;
        }

        input, select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .checkbox-container input {
            width: auto;
            margin-right: 10px;
        }

        .register-btn {
            width: 100%;
            background: white;
            color: black;
            padding: 10px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <h2 style="color: #2979FF;">General Information</h2>
            <label>Title</label>
            <select></select>
            <label>First Name</label>
            <input type="text">
            <label>Last Name</label>
            <input type="text">
            <label>Position</label>
            <select></select>
            <label>Company</label>
            <input type="text">
            <label>Business Arena</label>
            <input type="text">
            <label>Employees</label>
            <select></select>
        </div>
        <div class="right">
            <h2>Contact Details</h2>
            <label>Street + Nr</label>
            <input type="text">
            <label>Additional Information</label>
            <input type="text">
            <div class="inp">
                <label>Zip Code</label>
                <input type="text">
                <label>Place</label>
                <select></select>
            </div>
            
            <label>Country</label>
            <select></select>
            <div class="inp">
                <label>Code +</label>
                <input type="text">
                <label>Phone Number</label>
                <input type="text">
            </div>
            <label>Your Email</label>
            <input type="email">
            <div class="checkbox-container">
                <input type="checkbox">
                <span>I do accept the <a href="#" style="color: white; text-decoration: underline;">Terms and Conditions</a> of your site.</span>
            </div>
            <button class="register-btn">Register Badge</button>
        </div>
    </div>
</body>
</html>
