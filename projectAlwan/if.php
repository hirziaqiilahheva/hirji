<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Umur Film</title>
</head>
<body>
    <div class="container">
        <h1>Cek Film yang Bisa Ditonton</h1>
        <form action="" method="post">
            <label for="umur">Umur</label>
            <input type="number" id="umur" name="umur" placeholder="Masukkan umurmu" required>
            <input type="submit" name="ok" value="Kirim">
        </form>
    </div>

<?php
if (isset($_POST['ok'])) {
    $umur = (int) $_POST['umur']; 

    if ($umur >= 21) {
        echo "<p>Anda boleh menonton semua jenis film.</p>";
    } elseif ($umur >= 13) {
        echo "<p>Anda tidak boleh menonton film dewasa tetapi boleh menonton film remaja & semua umur.</p>";
    } else {
        echo "<p>Anda hanya boleh menonton film remaja & semua umur.</p>";
    }
}
?>
</body>
</html>
