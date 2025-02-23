<?php

$conn = new mysqli("localhost", "root", "", "health_tracker");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>