<?php
	require_once "conn.php";
	if(isset($_POST['submit'])){
		echo "looo";
		
		
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$age = $_POST['age'];
		$sex = $_POST['sex'];
		$address = $_POST['address'];
		
		
		

		if($first_name != "" && $last_name != ""  && $password != "" && $phone != "" && $email != "" && $age != "" && $sex != "" && $address != ""  ){
			$sql = "INSERT INTO datas (`first_name`,`last_name`,`password`, `phone`, `email`, `age`, `sex`, `address` ) VALUES ('$first_name', '$last_name', '$password',  '$phone', '$email', '$age', '$sex', '$address' )";
			
			if (mysqli_query($conn, $sql)) {
				header("location: view.php");
				echo "loooo";
			} else {
				 echo "Something went wrong. Please try again later.";
			}
		}else{
			echo "Name, Class and Marks cannot be empty!";
		}
	}
?>