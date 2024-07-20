<?php
session_start();
require 'function.php';
if (isset($_SESSION["login"])) {
    header("location: data_peserta.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Cek seluruh username dan dimasukkan kedalam variabel $result
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // Cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password berdasarkan username
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            $_SESSION["login"] = true;
            echo "
                <script>
                    window.location = 'data_peserta.php';
                </script>
            ";

            exit;
            // menghentikan kode ketika password tidak sesuai
        }
    }
    echo "
            <script>
                alert('username/password salah');
            </script>
            ";

    // error diletakkan diluar if untuk di eksekusi ketika tidak ada baris yg dikembalikan didalam database
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            margin: 12px 0;
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
        }

        .login-container button:hover {
            background-color: #45a049;
        }

        .login-container li {
            list-style: none;
            text-align: left;
        }

        .login-container li:nth-child(3) {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        ul li {
            margin-left: -40px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" autofocus required>
                </li>
                <li>
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" required>
                </li>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>