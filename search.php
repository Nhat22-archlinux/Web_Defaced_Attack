<?php
// search.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🔎 Search - XSS Demo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fce4ec;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .search-container {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        input[type="text"] {
            width: 300px;
            padding: 10px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 8px 20px;
            background-color: #e91e63;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .result {
            margin-top: 20px;
            background: #fce4ec;
            padding: 10px;
            border-left: 4px solid #e91e63;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <h2>🔍 Search something!</h2>
        <form method="GET">
            <input type="text" name="q" placeholder="Enter something..."><br>
            <input type="submit" value="Search">
        </form>

        <?php
        if (isset($_GET['q'])) {
            $q = $_GET['q']; // Không sử dụng htmlspecialchars() để không mã hóa đầu vào
            echo "<div class='result'>You searched for: <strong>$q</strong></div>";
        }
        ?>
        <br><a href="dashboard.php">← Back to Dashboard</a>
    </div>
</body>
</html>
