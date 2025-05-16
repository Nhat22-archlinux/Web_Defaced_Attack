<?php
// upload.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>📁 File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .upload-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        input[type="file"] {
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-back {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="upload-container">
        <h2>📁 Upload a File</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="file" required><br>
            <input type="submit" name="upload" value="Upload">
        </form>

        <?php
        if (isset($_POST['upload'])) {
            $target_dir = "uploads/";
            if (!file_exists($target_dir)) mkdir($target_dir);
            $target_file = $target_dir . basename($_FILES["file"]["name"]);

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "<p>✅ File uploaded successfully!</p>";
                echo "<p>📎 <a href='$target_file' target='_blank'>Open uploaded file</a></p>";
            } else {
                echo "<p>❌ File upload failed!</p>";
            }
        }
        ?>
        <a class="btn-back" href="dashboard.php">← Back to Dashboard</a>
    </div>
</body>
</html>
