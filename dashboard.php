<?php
// dashboard.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Web_Deface_Attack</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dashboard-container {
            background: #fff;
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            text-align: center;
            width: 400px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 25px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        p {
            font-size: 16px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>📊 Dashboard</h2>
        <p>Welcome to the WebDeface Attack dashboard</p>
        <p>This area can be expanded for testing file upload, XSS, IDOR, etc.</p>
        <a href="index.php" class="btn">🔓 Logout</a>
    </div>
</body>
</html>
