<?php 
    require 'function.php';    
    require 'sidebar.php';    



    // cek apakah tombol tambah sudah di klik
    if(isset($_POST["tambah"])){
        
        // cek function tambahkejuruan apakah data berhasil ditambahkan
        if(tambahkejuruan($_POST) > 0){
            // data didalam elemen form diambil, dimasukkan ke function tambah dan dikirimkan melalui $_POST kemudian ditangkap oleh $data di lat02 
            // kemudian di cek apakah nilai post lebih besar dari 0 atau = 1 yg menandakan data berhasil ditambahkan
            
            echo "
                <script>
                    alert('Berhasil menambahkan data baru!')
                    document.location.href = 'data_kejuruan.php';
                </script>
                ";
            }else{
                echo " 
                <script>
                    alert('Gagal menambahkan data!');
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
    <title>Data Kejuruan</title>
    <link rel="stylesheet" href="../css/tambah_data_all.css?v=<?php echo time(); ?>">
</head>
<body>  
    <div class="container">
        <div class="sub-container">
            <div class="header">
                    <h2>Tambah Data Kejuruan</h2>
            </div>
            <div class="box">
                <div class="content">
                    <form action="" method="post">
                        <div class="t_body">
                            <table border="0" cellpadding="10" cellspacing="0">
                                <tr>
                                    <td><label for="kode_kejuruan">Kode Kejuruan :</label><br>
                                    <input type="text" name="kode_kejuruan" id="kode_kejuruan" placeholder="Masukkan id kejuruan..." autofocus required></td>
                                </tr>
                                <tr>
                                    <td><label for="kejuruan">Kejuruan :</label><br>
                                    <input type="text" name="kejuruan" id="kejuruan" placeholder="Masukkan nama kejuruan..." required></td>
                                </tr>
                                <tr>
                                    <td><label for="pelatihan">Program Pelatihan :</label><br>
                                    <input type="text" name="pelatihan" id="pelatihan" placeholder="Masukkan nama kejuruan..." required></td>
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

