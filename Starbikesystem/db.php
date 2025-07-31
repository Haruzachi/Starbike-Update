<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "starbike_db";

$conn = new mysqli($host, $user, $pass, $db);

// If connection fails, show error
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>