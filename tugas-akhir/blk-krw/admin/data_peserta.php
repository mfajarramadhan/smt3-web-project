<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("location : login.php");
    exit;
    // bila session login tidak ada, maka tendang user kembali ke halaman login
}
    require 'function.php';    
    include 'sidebar.php';
    $peserta = query("SELECT * FROM tbl_peserta, tbl_kecamatan, tbl_desa, tbl_kejuruan, tbl_sekolah 
    WHERE   
        tbl_peserta.kode_kecamatan =  tbl_kecamatan.kode_kecamatan && 
        tbl_peserta.kode_desa = tbl_desa.kode_desa &&
        tbl_peserta.kode_kejuruan = tbl_kejuruan.kode_kejuruan &&
        tbl_peserta.npsn = tbl_sekolah.npsn ORDER BY nama ASC") ;
    // $kejuruan = query("SELECT * FROM tbl_kejuruan");


    if(isset($_POST["cari"])){
        $peserta = cari($_POST["search"]);
        // var peserta akan berisi data hasil pencarian dari function cari()
        // function cari mendapat data dari apapun yang diketikan oleh user
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peserta</title>
    <link rel="stylesheet" href="../css/tambah_data.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <div class="sub_container">
            <div class="header">
                <h2>Data Peserta</h2>
            </div>
                <div class="box">
                    <div class="content">
                        <form action="" method="post">
                            <div class="menu">
                                <div class="search">
                                    <input type="text" name="search" id="search" autocomplete="off" placeholder="Cari data...">
                                    <button type="submit" name="cari" id="cari">Cari</button>
                                </div>
                                <div class="publish">
                                    <button type="submit" name="publish" id="publish"><a href="index.php">Publish</a></button>
                                </div>
                            </div>
                        </form>

                        <br>
                        <div class="t_body">
                            <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kejuruan</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Opsi</th>
                                </tr>
                                <?php $i = 1; ?>
                                <?php foreach($peserta as $row) : ?>
                                    <!-- foreach($peserta as $row) :  -->
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row["nama"]; ?></td>
                                    <td><?= $row["kejuruan"]; ?></td>
                                    <td><?= $row["tanggal_lahir"]; ?></td>
                                    <td class="action-btn">
                                        <button type="submit" name="submit" id="ubah"><a href="ubah_data_peserta.php?nik=<?= $row["nik"]; ?>">Ubah</a></button>
                                        <button type="submit" name="submit" id="hapus"><a href="hapus_data_peserta.php?nik=<?= $row["nik"]; ?>" onclick="return confirm('yakin menghapus data ini?')">Hapus</a></button>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
</body>
</html>