<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <title>Responsive Form Page</title>
    <link rel="stylesheet" href="add_form.css">
</head>
<body >
    <div class="wrapper">
        <!-- Sidebar -->
        

        <!-- Main Content -->
        
        <!--<header>
			<nav>
				
                <h2 class="logo"><img src="1.png" class="log-img" alt="" srcset="">DOSECARE</h2>
			<label for="sidebar-toggle">
				<span class="menu_icon">
					<svg viewBox="0 0 18 15" width="18px" height="15px">
						<path d="M18,1.484c0,0.82-0.665,1.484-1.484,1.484H1.484C0.665,2.969,0,2.304,0,1.484l0,0C0,0.665,0.665,0,1.484,0 h15.032C17.335,0,18,0.665,18,1.484L18,1.484z M18,7.516C18,8.335,17.335,9,16.516,9H1.484C0.665,9,0,8.335,0,7.516l0,0 c0-0.82,0.665-1.484,1.484-1.484h15.032C17.335,6.031,18,6.696,18,7.516L18,7.516z M18,13.516C18,14.335,17.335,15,16.516,15H1.484 C0.665,15,0,14.335,0,13.516l0,0c0-0.82,0.665-1.483,1.484-1.483h15.032C17.335,12.031,18,12.695,18,13.516L18,13.516z">
						</path>
					</svg>
			 </span>
		 
			<input type="checkbox" id="sidebar-toggle" class="sidebar-toggle"/>
			
			<div class="overlay"></div>
	
			<div class="sidebar">
				
				 <label class="close-btn" for="sidebar-toggle">&times;</label>
				 	<div class="study1">
							<a class="nav sidetexts" href="#" >#</a>
							<hr>

							<a class="nav sidetexts" href="login.php"  id="sidetexts3">Login</a>
					 </div>
				
			</div>
		</label>
	</nav>
		</header>-->
            <section class="form-section">
                <h2 class="dot">Register</h2>
                <hr>
                    <div class="form_cont">
                        <form class="flex" id="userForm" action="adddata_form.php" method="post">
                        <div class="flex_form">
                            <div class="form-group">
                                <label for="age">First name</label>
                                <input type="text" id="first_name" name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label for="age">Last name</label>
                                <input type="text" id="last_name" name="last_name" required>
                            </div>
                            <div class="form-group">
                                <label for="age">Password</label>
                                <input type="password" id="password" name="password" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" id="phone" name="phone" required>
                            </div>
                            
                        </div>
                        
                        
                        <div class="flex_form" id="userForm" >
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" id="age" name="age" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" required>
                            </div>
                            <div class="form-group" style="display: flex ; justify-content: center; align-items:center; ">
                                <label for="sex">Sex</label>
                                <select id="sex" name="sex" required>
                                    
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    
                                </select>
                            </div>
                          
                        </div>
                        <div class="center">
                           <button type="submit" class="submit-btn"  name="submit">Submit</button>
                            <div class="acc">
                                <p>Already have an account?<a href="login_form.php" class="lg">Log-in</a></p>
                                
                            </div>
                        </div>
                        </form>
                         
                    </div>
                       
                    
            </section>
        
    </div>
    

    
</body>
</html>
