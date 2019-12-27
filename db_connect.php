<?php
$servername = "localhost";
$username = "root";
$password = "redhat";

// Create connection
$conn = new mysqli($servername, $username, $password,"a");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

