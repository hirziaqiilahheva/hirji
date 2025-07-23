<?php
session_start();
if ($_SESSION['orang'] != 'admin3') {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Warung Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        td {
            color: #333;
        }
        input[type="number"] {
            width: 60px;
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ddd;
            text-align: center;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .keluar {
            margin-top: 10px;
            width: 100%;
            padding: 10px;
            background-color: #dc3545;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .keluar:hover {
            background-color: #dc3560;
        }
        a {
            text-decoration: none;
            color: white;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
        .order-summary {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Menu Warung</h2>
        <form method="post" action="">
            <table>
                <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Order</th>
                    <th>Porsi</th>
                </tr>
                <?php
                    $menu = [
                        ["Soto", 10000],
                        ["Rawon", 15000],
                        ["Teh", 3000],
                        ["Kopi", 5000]
                    ];

                    foreach ($menu as $index => $item) {
                        echo "<tr>";
                        echo "<td>" . ($index + 1) . "</td>";
                        echo "<td>" . $item[0] . "</td>";
                        echo "<td>Rp " . number_format($item[1], 0, ',', '.') . "</td>";
                        echo "<td><input type='checkbox' name='order[]' value='$index'></td>";
                        echo "<td><input type='number' name='porsi_$index' min='1'></td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <br>
            <button type="submit" name="submit">Pesan</button>
            <button class="keluar"><a href="keluar.php">Keluar</a></button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $selectedOrders = isset($_POST['order']) ? $_POST['order'] : [];
            $hasError = false;
            $errorMessage = "";

            foreach ($menu as $index => $item) {
                $isOrdered = in_array($index, $selectedOrders);
                $porsi = isset($_POST["porsi_$index"]) ? (int)$_POST["porsi_$index"] : 0;

                if ($isOrdered && $porsi <= 0) {
                    $errorMessage = "Masukan porsi setelah memilih menu!";
                    $hasError = true;
                    break;
                } elseif (!$isOrdered && $porsi > 0) {
                    $errorMessage = "Checkbox untuk " . $item[0] . " harus dicentang jika Anda mengisi porsi.";
                    $hasError = true;
                    break;
                }
            }

            if (empty($selectedOrders)) {
                echo "<p class='error-message'>Silakan pilih minimal satu menu untuk dipesan.</p>";
            } elseif ($hasError) {
                echo "<p class='error-message'>$errorMessage</p>";
            } else {
                echo "<div class='order-summary'><h3>Pesanan Anda:</h3><ul>";
                $totalHarga = 0;
                foreach ($selectedOrders as $index) {
                    $porsi = (int)$_POST["porsi_$index"];
                    $harga = $menu[$index][1] * $porsi;
                    $totalHarga += $harga;
                    echo "<li>" . $menu[$index][0] . " x $porsi porsi = Rp " . number_format($harga, 0, ',', '.') . "</li>";
                }
                echo "</ul><p>Total Harga: Rp " . number_format($totalHarga, 0, ',', '.') . "</p></div>";
            }
        }
        ?>
    </div>
</body>
</html>
