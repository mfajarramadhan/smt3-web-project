<?php 
    require 'function.php';       

    // cek apakah tombol tambah sudah di klik
    if(isset($_POST["log"])){
        
        // cek function tambahdesa apakah data berhasil ditambahkan
        if(logpes($_POST) > 0){
            // data didalam elemen form diambil, dimasukkan ke function tambah dan dikirimkan melalui $_POST kemudian ditangkap oleh $data di lat02 
            // kemudian di cek apakah nilai post lebih besar dari 0 atau = 1 yg menandakan data berhasil ditambahkan
            
            echo "
                <script>
                    alert('Berhasil membuat akun!')
                    window.location = 'index.php';
                </script>
                ";
            }else{
                echo " 
                <script>
                    alert('Gagal membuat akun!');
                    document.location.href = 'buat_akun.php.php';
                </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin: 8px 0;
        }

        button:hover {
            background-color: #45a049;
        }

        p{
            font-size: 13px;
        }
    </style>
    <title>Registrasi</title>
</head>
<body>
    <form action="" method="post">
        <h2>Registrasi</h2>
        
        <label for="name">Nama:</label>
        <input type="text" id="name" name="nama" autofocus required>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" autocomplete="off" required>

        <label for="phone">Nomor Telepon:</label>
        <input type="text" id="phone" name="nohp" required>

        <label for="password">Kata Sandi:</label>
        <input type="password" id="password" name="sandi" autocomplete="off" required>

        <button type="submit" name="log" value="log">Daftar</button>
        <br>
        <p>sudah punya akun?<b><a href="login_peserta.php"> Login</a></b></p>
    </form>
</body>
</html>
