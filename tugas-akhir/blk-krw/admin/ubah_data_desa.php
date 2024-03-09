<?php 
    require 'function.php';    
    require 'sidebar.php';  
    
    // Ambil data kode desa
    $kode_desa = $_GET["kode_desa"];

    // Query data desa
    $desa = query("SELECT * FROM tbl_desa WHERE kode_desa = $kode_desa")[0];

    if(isset($_POST["submit"])){
        
        // Ambil data dari variabel conn dan query
        // if(mysqli_affected_rows($conn) > 0){

        // Tidak memerlukan syntax diatas, diubah menjadi dibawah
        if(ubahdesa($_POST) > 0){
            // data didalam elemen form diambil, dimasukkan ke function tambah dan dikirimkan melalui $_POST kemudian ditangkap oleh $data di lat02 
            // kemudian di cek apakah nilai post lebih besar dari 0 atau = 1 yg menandakan data berhasil ditambahkan
            
            echo "
                <script>
                    alert('Data berhasil diubah!')
                    document.location.href = 'data_desa.php';
                </script>
                ";
            }else{
                echo " 
                <script>
                    alert('Gagal merubah data!');
                    document.location.href = 'data_desa.php';
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
    <title>Ubah Data Desa</title>
    <link rel="stylesheet" href="../css/tambah_data_all.css?v=<?php echo time(); ?>">
</head>
<body>  
    <div class="container">
        <div class="sub-container">
            <div class="header">
                    <h2>Ubah Data Desa</h2>
            </div>
            <div class="box">
                <div class="content">
                    <form action="" method="post">
                        <div class="t_body">
                            <table border="0" cellpadding="10" cellspacing="0">
                                <tr>
                                    <td>
                                        <input type="hidden" name="kode_desa" value="<?= $desa["kode_desa"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="nama_desa">Nama desa :</label><br>
                                    <input type="text" name="nama_desa" id="nama_desa" value="<?= $desa["nama_desa"]; ?>" required></td>
                                </tr>
                                <tr>
                                    <td><label for="alamat">Alamat :</label><br>
                                    <input type="text" name="alamat" id="alamat" value="<?= $desa["alamat"]; ?>" required></td>
                                </tr>
                                <tr>
                                    <td><label for="ket">Keterangan :</label><br>
                                    <input type="text" name="ket" id="ket" value="<?= $desa["ket"]; ?>" required></td>                        
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