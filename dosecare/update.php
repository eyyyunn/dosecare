<!DOCTYPE html>
<html lang="en">
<?php
	require_once "conn.php";
	if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email"]) && isset($_POST["password]"])){
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$sql = "UPDATE datas SET `first_name`= '$first_name', `last_name`= '$last_name', `email`= '$email', `password`= '$password'  WHERE id= ".$_GET["id"];
		if (mysqli_query($conn, $sql)) {
			header("location: view.php");
		} else {
			echo "Something went wrong. Please try again later.";
		}
	}
?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP - MYSQL - CRUD</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
		crossorigin="anonymous"></script>
		<style>
			.row {
				display: flex;
				flex-direction: column;
				justify-self: center;
				border: 1px solid red;
				
			}
			form {
				border: 1px solid green;
			}
			.form-control {
				width: 300px;
				margin-bottom: 30px;
			}
		</style>
		
</head>

<body>
	<section>
		<h1 style="text-align: center;margin: 50px 0;">Update Info</h1>
		<div class="container">
			<?php 
				require_once "conn.php";
				$sql_query = "SELECT * FROM datas WHERE id = ".$_GET["id"];
				if ($result = $conn ->query($sql_query)) {
					while ($row = $result -> fetch_assoc()) { 
						$id = $row['id'];
						$first_name = $row['first_name'];
						$last_name = $row['last_name'];
						
						$password = $row['password'];
						
			?>
							<form action="update.php?id=<?php echo $id; ?>" method="post">
								<div class="row">
										<div class="form-group col-lg-4">
											<label for="">first_name</label>
											<input type="text" name="first_name" id="name" class="form-control" value="<?php echo $first_name ?>" required>
										</div>

										<div class="form-group col-lg-4">
											<label for="">last_name</label>
											<input type="text" name="last_name" id="name" class="form-control" value="<?php echo $last_name ?>" required>
										</div>
									   
										
 
										<div class="form-group col-lg-3">
											<label for="">password</label>
											<input type="password" name="password" id="marks" class="form-control" value="<?php echo $password ?>" required>
										</div>

										
										<div class="form-group col-lg-2" style="display: grid;align-items:  flex-end; ">
											<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
										</div>
								</div>
							</form>
			<?php 
					}
				}
			?>
		</div>
	</section>
</body>

</html>