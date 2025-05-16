<?php
// index.php
include('db_config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to the WebDeface Attack!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        input[type="text"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        h2 {
            margin-bottom: 20px;
        }

        p {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>🔒 Login</h2>

        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" name="login" value="Login">
        </form>

        <?php
        if (isset($_POST['login'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];

            // 🚨 VULNERABLE SQL query (no sanitization!)
            $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                echo "<p> Login successful! Welcome, <strong>$user</strong></p>";
                echo '<p><a href="dashboard.php">Go to Dashboard</a></p>';
            } else {
                echo "<p> Invalid credentials!</p>";
            }
        }
        ?>
    </div>
</body>
</html>
