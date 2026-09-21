<?php
// Alternate database configuration retained for compatibility with the
// original project. Docker values come from the environment; local defaults
// remain equivalent to the previous setup.
define('DB_SERVER', getenv('DB_HOST') ?: 'localhost');
define('DB_PORT', (int) (getenv('DB_PORT') ?: 3306));
define('DB_USERNAME', getenv('DB_USER') ?: 'root');
$databasePassword = getenv('DB_PASSWORD');
define('DB_PASSWORD', $databasePassword === false ? '' : $databasePassword);
define('DB_DATABASE', getenv('DB_NAME') ?: 'Web_Deface_Attack');

$conn = new mysqli(
    DB_SERVER,
    DB_USERNAME,
    DB_PASSWORD,
    DB_DATABASE,
    DB_PORT
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
