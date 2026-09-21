<?php
// db_config.php

// Docker supplies these values through environment variables. The fallbacks
// preserve the original local setup for users running PHP directly.
$servername = getenv('DB_HOST') ?: 'localhost';
$port = (int) (getenv('DB_PORT') ?: 3306);
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD');
$password = $password === false ? '' : $password;
$dbname = getenv('DB_NAME') ?: 'Web_Deface_Attack';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>
