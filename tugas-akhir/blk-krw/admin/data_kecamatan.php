<?php 
    session_start();
    if(!isset($_SESSION["login"])){
        header("location : login.php");
        exit;
        // bila session login tidak ada, maka tendang user kembali ke halaman login
    }

    require 'function.php';    
    include 'sidebar.php';

    
    // query atau mengambil semua data dari tabel kecamatan
    $kecamatan = query("SELECT * FROM tbl_kecamatan ORDER BY kode_kecamatan ASC");

    // cek apakah tombol tambah_kecamatan sudah di klik
    if(isset($_POST["tambah_kecamatan"])){
        header("location: tambah_data_kecamatan.php");
        // var kecamatan akan berisi data hasil pencarian dari function cari()
        // function cari mendapat data dari apapun yang diketikan oleh user
    }

    // cek apakah tombol cari_kecamatan sudah di klik
    if(isset($_POST["cari_kecamatan"])){
        $kecamatan = carikecamatan($_POST["search_kecamatan"]);
        // var kecamatan akan berisi data hasil pencarian dari function cari()
        // function cari mendapat data dari apapun yang diketikan oleh user
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kecamatan</title>
    <link rel="stylesheet" href="../css/tambah_data.css?v=<?php echo time(); ?>">
</head>
<body>

    <div class="container">
        <div class="sub_container">

            <!-- Header -->
            <div class="header">
                <h2>Data Kecamatan</h2>
            </div>

            <!-- Content -->
            <div class="box">
                <div class="content">
                    <form action="" method="post">
                        <div class="menu">
                            <div class="search">
                                <input type="text" name="search_kecamatan" id="search" placeholder="Cari data...">
                                <button type="submit" name="cari_kecamatan" id="cari">Cari</button>
                            </div>
                            <div class="tambah">
                                <button type="submit" name="tambah_kecamatan" id="tambah">Tambah</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    
                    <!-- Data Kecamatan -->
                    <div class="t_body">
                        <table border="0" cellpadding="10" cellspacing="0">
                            <tr>
                                <th>No</th>
                                <th>Kode Kecamatan</th>
                                <th>Nama Kecamatan</th>
                                <th>Aksi</th>
                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach($kecamatan as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['kode_kecamatan']; ?></td>
                                <td><?= $row['nama_kecamatan']; ?></td>
                                    <td class="action-btn">
                                        <button type="submit" name="submit" id="ubah"><a href="ubah_data_kecamatan.php?kode_kecamatan=<?= $row["kode_kecamatan"]; ?>">Ubah</a></button>
                                        <button type="submit" name="submit" id="hapus"><a href="hapus_data_kecamatan.php?kode_kecamatan=<?= $row["kode_kecamatan"]; ?>" onclick="return confirm('yakin menghapus data ini?')">Hapus</a></button>
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
