<?php
// Cấu hình kết nối cơ sở dữ liệu
define('DB_SERVER', 'localhost');  // Máy chủ cơ sở dữ liệu
define('DB_USERNAME', 'root');     // Tên người dùng MySQL (mặc định là root)
define('DB_PASSWORD', '');         // Mật khẩu người dùng MySQL (mặc định là trống)
define('DB_DATABASE', 'vulnerable_php_db'); // Tên cơ sở dữ liệu bạn đã tạo

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
