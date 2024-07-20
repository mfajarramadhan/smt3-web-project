<?php
require 'function.php';
require 'sidebar.php';

if (isset($_POST["tambah"])) {
    if (tambahadmin($_POST) > 0) {
        echo "
                <script>
                    alert('Berhasil menambahkan data baru!')
                    document.location.href = 'admin.php';
                </script>
                ";
    } else {
        echo " 
                <script>
                    alert('Gagal menambahkan data!');
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
    <title>Data Admin</title>
    <link rel="stylesheet" href="../css/tambah_data_all.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="container">
        <div class="sub-container">
            <div class="header">
                <h2>Tambah Data Admin</h2>
            </div>
            <div class="box">
                <div class="content">
                    <form action="" method="post">
                        <div class="t_body">
                            <table border="0" cellpadding="10" cellspacing="0">
                                <tr>
                                    <td><label for="nama">Nama Admin :</label><br>
                                        <input type="text" name="nama" id="nama" placeholder="Masukkan nama..." autocomplete="off" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="username">Username :</label><br>
                                        <input type="text" name="username" id="username" placeholder="Username..." autocomplete="off" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="password">Password :</label><br>
                                        <input type="password" name="password" id="password" placeholder="Masukkan password..." autocomplete="off" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="password2">Konfirmasi Password :</label><br>
                                        <input type="password" name="password2" id="password2" placeholder="Masukkan ulang password..." autocomplete="off" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="action_btn"><button type="submit" name="tambah">Tambah</button></td>
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

















<!-- 
<?php
// require 'function.php';    
// require 'sidebar.php';    



// // cek apakah tombol tambah sudah di klik
// if(isset($_POST["tambah"])){

//     // cek function tambahkecamatann apakah data berhasil ditambahkan
//     if(tambahdataadmin($_POST) > 0){
//         // data didalam elemen form diambil, dimasukkan ke function tambah dan dikirimkan melalui $_POST kemudian ditangkap oleh $data di lat02 
//         // kemudian di cek apakah nilai post lebih besar dari 0 atau = 1 yg menandakan data berhasil ditambahkan

//         echo "
//             <script>
//                 alert('Berhasil menambahkan data baru!')
//                 document.location.href = 'admin.php';
//             </script>
//             ";
//         }else{
//             echo " 
//             <script>
//                 alert('Gagal menambahkan data!');
//                 document.location.href = 'admin.php';
//             </script>
//         ";
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../css/tambah_data_all.css?v=<?php echo time(); ?>">
</head>
<body>  
    <div class="container">
        <div class="sub-container">
            <div class="header">
                    <h2>Tambah Data Admin</h2>
            </div>
            <div class="box">
                <div class="content">
                    <form action="" method="post">
                        <div class="t_body">
                            <table border="0" cellpadding="10" cellspacing="0">
                                <tr>
                                    <td><label for="id_admin">ID Admin :</label><br>
                                    <input type="text" name="id_admin" id="id_admin" placeholder="Id Admin" autofocus required></td>
                                </tr>
                                <tr>
                                    <td><label for="username">Username :</label><br>
                                    <input type="text" name="username" id="username" placeholder="Username" required></td>
                                </tr>
                                <tr>
                                    <td><label for="password">Password :</label><br>
                                    <input type="text" name="password" id="password" placeholder="Password" required></td>                        
                                </tr>
                                <tr>
                                    <td><label for="nama">Nama :</label><br>
                                    <input type="text" name="nama" id="nama" placeholder="Nama" required></td>                        
                                </tr>
                                <tr>
                                    <td class="action_btn"><button type="submit" name="tambah">Tambah</button></td>
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
 -->