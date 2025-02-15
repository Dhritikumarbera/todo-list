<?php
$servername = "localhost"; // Your MySQL server (usually localhost)
$username = "root"; // Your database username (default is often root)
$password = ""; // Your database password (empty by default on local servers)
$dbname = "techfest"; // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
