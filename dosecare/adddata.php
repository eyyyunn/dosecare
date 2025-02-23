<?php
	require_once "conn.php";
	if(isset($_POST['submit'])){
		echo "looo";
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		

		if($email != ""  && $password != ""  ){
			$sql = "INSERT INTO logform (`email`, `password` ) VALUES ('$email',   '$password' )";
			
			if (mysqli_query($conn, $sql)) {
				header("location: view_logform.php");
				echo "loooo";
			} else {
				 echo "Something went wrong. Please try again later.";
			}
		}else{
			echo "Name, Class and Marks cannot be empty!";
		}
	}
?>