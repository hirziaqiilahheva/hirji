<?php
session_start();
if ($_SESSION['orang'] != 'admin2') {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h6 {
            margin-top: 0;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            display: block;
            font-size: 16px;
        }
        input[type="number"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #b02a37;
        }
        .result {
            margin-top: 20px;
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="nilai">Cek Nilai</label>
            <input type="number" id="nilai" name="nilai" placeholder="Masukkan nilai" required>
            <input type="submit" name="ok" value="ok">
        </form>
        <a href="keluar.php">Keluar</a>
        
        <?php
        if (isset($_POST['ok'])) {
            $nilai = $_POST['nilai'];
            echo '<div class="result">';
            if ($nilai >= 90) {
                echo "<h6>Nilaimu A</h6>";
            } elseif ($nilai >= 80) {
                echo "<h6>Nilaimu B</h6>";
            } elseif ($nilai >= 70) {
                echo "<h6>Nilaimu C</h6>";
            } elseif ($nilai >= 60) {
                echo "<h6>Nilaimu D</h6>";
            } else {
                echo "<h6>Nilaimu E</h6>";
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
