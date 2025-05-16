<?php
// db_config.php

$servername = "localhost"; // If your database runs locally
$username = "root";         // Default username for local MySQL
$password = "";             // Default password is often empty
$dbname = "Web_Deface_Attack";   // Our database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>
