<?php
	require_once "conn.php";
	$id = $_GET["id"];
	$query = "DELETE FROM datas WHERE id = '$id'";
	if (mysqli_query($conn, $query)) {
		header("location: view.php");
	} else {
		 echo "Something went wrong. Please try again later.";
	}
?>