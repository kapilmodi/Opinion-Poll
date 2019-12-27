<?php
//Enter servername, username, password, databasename
$servername = "localhost";
$username = "username";
$password = "password";
$db="DBName";
$conn = new mysqli($servername, $username, $password,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

