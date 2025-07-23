<?php
session_start();
if ($_SESSION['orang'] != 'admin1') {
    header('location: login.php');
}

if (!isset($_POST['tampil']) && !isset($_POST['tampilData'])) {
    echo '<div class="container">Terjadi kesalahan.</div>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
            max-width: 500px;
            width: 100%;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }
        button[type="submit"], button a {
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
            width: 100%;
            display: block;
            text-align: center;
        }
        button[type="submit"]:hover, button a:hover {
            background-color: #0056b3;
        }
        .message {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .result {
            text-align: left;
            font-size: 16px;
            margin-bottom: 15px;
        }
        .back-link {
            margin-top: 15px;
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .back-link:hover {
            color: #b02a37;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST['tampil'])) {
            if (isset($_POST['jumlah'])) {
                $jumlah = $_POST['jumlah'];
                if ($jumlah == '' || $jumlah <= 0) {
                    echo '<div class="message">Masukan nilai jumlah yang valid!</div>';
                    echo '<a class="back-link" href="admin.php">Kembali</a>';
                } else {
                    echo '<form action="" method="post">';
                    for ($i = 0; $i < $jumlah; $i++) {
                        echo '
                            <div class="form-group">
                                <label>Data ke- ' . ($i + 1) . '</label>
                                <input type="text" name="nama[]" placeholder="Masukan nama" required>
                                <input type="number" name="umur[]" placeholder="Masukan umur" required>
                            </div>
                        ';
                    }
                    echo '
                        <button type="submit" name="tampilData">Tampilkan</button>
                        <a class="back-link" href="admin.php">Kembali</a>
                    </form>';
                }
            } else {
                echo '<div class="message">Masukan jumlah tampilan data!</div>';
                echo '<a class="back-link" href="admin.php">Kembali</a>';
            }
        }

        if (isset($_POST['tampilData'])) {
            $nama = $_POST['nama'];
            $umur = $_POST['umur'];
            $jumlah = count($nama);
            echo '<div class="result">';
            for ($i = 0; $i < $jumlah; $i++) {
                echo 'Data ke- ' . ($i + 1) . ': Nama: ' . htmlspecialchars($nama[$i]) . ' | Umur: ' . htmlspecialchars($umur[$i]) . '<br>';
            }
            echo '</div>';
            echo '<a class="back-link" href="admin.php">Kembali</a>';
        }
        ?>
    </div>
</body>
</html>
