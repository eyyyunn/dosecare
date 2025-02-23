<?php
	require_once "conn.php";
	$id = $_GET["id"];
	$query = "DELETE FROM logform WHERE id = '$id'";
	if (mysqli_query($conn, $query)) {
		header("location: view_logform.php");
	} else {
		 echo "Something went wrong. Please try again later.";
	}
?>