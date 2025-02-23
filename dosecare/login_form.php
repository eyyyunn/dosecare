<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login_form.css">
</head>
<body>
<div class="watch">

<form class="container" action="adddata.php" method="post">
  <div class="inputs">
  <h2>SIGN IN</h2>
    <div class="input-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" >
    </div>

    <div class="input-group">
      <label for="password">Password</label>
      <input type="password" id="last-name" name="password" required  >
    </div>
   


    
    <button type="submit" class="submit-btn" value="submit" name="submit">Log In</button>
    <h2 class="alr-acc">Don't have an account?<a class="login" href="add_form.php"> Sign Up</a></h2>
   </div>
</form>

<div class=" con2"style = " transform:  translateX(-10px)"></div>
    
</body>
</html>