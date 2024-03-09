<?php 
    require 'function.php';    
    require 'sidebar.php';  
    
    // Ambil data kode kecamatan
    $id_admin = $_GET["id_admin"];

    // Query data kecamatan
    $admin = query("SELECT * FROM users WHERE id_admin = '$id_admin'")[0];

    if(isset($_POST["submit"])){
        
        // Ambil data dari variabel conn dan query
        // if(mysqli_affected_rows($conn) > 0){

        // Tidak memerlukan syntax diatas, diubah menjadi dibawah
        if(ubahadmin($_POST) > 0){
            // data didalam elemen form diambil, dimasukkan ke function tambah dan dikirimkan melalui $_POST kemudian ditangkap oleh $data di lat02 
            // kemudian di cek apakah nilai post lebih besar dari 0 atau = 1 yg menandakan data berhasil ditambahkan
            
            echo "
                <script>
                    alert('Data berhasil diubah!')
                    document.location.href = 'admin.php';
                </script>
                ";
            }else{
                echo " 
                <script>
                    alert('Gagal merubah data!');
                    document.location.href = 'admin.php';
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
    <title>Ubah Data Kecamatan</title>
    <link rel="stylesheet" href="../css/tambah_data_all.css?v=<?php echo time(); ?>">
</head>
<body>  
    <div class="container">
        <div class="sub-container">
            <div class="header">
                    <h2>Ubah Data Admin</h2>
            </div>
            <div class="box">
                <div class="content">
                    <form action="" method="post">
                        <div class="t_body">
                            <table border="0" cellpadding="10" cellspacing="0">
                                <tr>
                                    <td>
                                        <input type="hidden" name="id_admin" value="<?= $admin["id_admin"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="nama">Nama :</label><br>
                                    <input type="text" name="nama" id="nama" value="<?= $admin["nama"]; ?>" required></td>                        
                                </tr>
                                <tr>
                                    <td><label for="username">Username :</label><br>
                                    <input type="text" name="username" id="username" value="<?= $admin["username"]; ?>" required></td>
                                </tr>
                                <tr>
                                    <td><label for="password">Masukkan Password Baru :</label><br>
                                    <input type="password" name="password" id="password" autocomplete="off" required></td>                        
                                </tr>
                                <tr>
                                    <td><label for="password2">Konfirmasi Password :</label><br>
                                    <input type="password" name="password2" id="password2" autocomplete="off" required></td>                        
                                </tr>
                                <tr>
                                    <td class="action_btn"><button type="submit" name="submit">Update</button></td>
                                </tr>
                            </table>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>