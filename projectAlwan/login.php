<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            color: #555;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="password"] {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 12px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: -15px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="" method="post">
            <label for="nama">Username</label>
            <input type="text" id="nama" name="nama" placeholder="Enter your username" required>
            
            <label for="pass">Password</label>
            <input type="password" id="pass" name="pass" placeholder="Enter your password" required>
            
            <input type="submit" name="ok" value="Login">
        </form>
    </div>
</body>
</html>

<?php
session_start();
if(isset($_POST['ok'])){
    $nama = $_POST['nama'];
    $pass = $_POST['pass'];
    if($nama == 'admin3' && $pass == '123'){
        $_SESSION['orang'] = 'admin1';
        header("location:admin.php");
    }
    if($nama == 'admin1' && $pass == '123'){
        $_SESSION['orang'] = 'admin2';
        header("location:nilai.php");
    }
    if($nama == 'admin2' && $pass == '123'){
        $_SESSION['orang'] = 'admin3';
        header("location:warung.php");
    }
}
?>
