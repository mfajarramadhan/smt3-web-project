<?php
session_start();
include "function.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            max-width: 100%;
            text-align: center;
            padding: 20px;
        }

        .login-container h2 {
            color: #333;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-container button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 8px 0;
        }

        .login-container button:hover {
            background-color: #45a049;
        }

        p{
            text-align: left;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="#" method="POST">
        <input type="text" name="email" placeholder="email" autofocus required>
        <input type="password" name="sandi" placeholder="Kata Sandi" required>
        <button type="submit" name="proseslog">Login</button>
        <br>
        <p>belum punya akun?<b><a href="buat_akun.php"> Registrasi</a></b></p>
    </form>
</div>
</body>
</html>

<?php

if(isset($_POST['proseslog'])){
    $sql = mysqli_query($conn,"select * from login_peserta where email = '$_POST[email]' and sandi = '$_POST[sandi]'");

    $cek = mysqli_num_rows($sql);
    if($cek > 0){
        $_SESSION['email'] = $_POST['email'];

        echo "<meta http-equiv=refresh content=0;URL='index.php'>";
    }else{
        echo "<p align=center><b> Username dan Password salah !</b></p>";
        echo "<meta http-equiv=refresh content=2;URL='login_peserta.php'>";
    }
}
?>
