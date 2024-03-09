<?php 
    require 'function.php';    
    require 'sidebar.php';  
    
    // Ambil data kode kejuruan
    $kode_kejuruan = $_GET["kode_kejuruan"];

    // Query data kecamatan
    $kejuruan = query("SELECT * FROM tbl_kejuruan WHERE kode_kejuruan = '$kode_kejuruan'")[0];

    if(isset($_POST["submit"])){
        
        // Ambil data dari variabel conn dan query
        // if(mysqli_affected_rows($conn) > 0){

        // Tidak memerlukan syntax diatas, diubah menjadi dibawah
        if(ubahkejuruan($_POST) > 0){
            // data didalam elemen form diambil, dimasukkan ke function tambah dan dikirimkan melalui $_POST kemudian ditangkap oleh $data di lat02 
            // kemudian di cek apakah nilai post lebih besar dari 0 atau = 1 yg menandakan data berhasil ditambahkan
            
            echo "
                <script>
                    alert('Data berhasil diubah!')
                    document.location.href = 'data_kejuruan.php';
                </script>
                ";
            }else{
                echo " 
                <script>
                    alert('Gagal merubah data!');
                    document.location.href = 'data_kejuruan.php';
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
    <title>Ubah Data Kejuruan</title>
    <link rel="stylesheet" href="../css/tambah_data_all.css?v=<?php echo time(); ?>">
</head>
<body>  
    <div class="container">
        <div class="sub-container">
            <div class="header">
                    <h2>Ubah Data Kejuruan</h2>
            </div>
            <div class="box">
                <div class="content">
                    <form action="" method="post">
                        <div class="t_body">
                            <table border="0" cellpadding="10" cellspacing="0">
                                <tr>
                                    <td>
                                        <input type="hidden" name="kode_kejuruan" value="<?= $kejuruan["kode_kejuruan"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="kejuruan">Nama kejuruan :</label><br>
                                    <input type="text" name="kejuruan" id="kejuruan" value="<?= $kejuruan["kejuruan"]; ?>" required></td>
                                </tr>
                                <tr>
                                    <td><label for="pelatihan">Program Pelatihan :</label><br>
                                    <input type="text" name="pelatihan" id="pelatihan" value="<?= $kejuruan["pelatihan"]; ?>" required></td>
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