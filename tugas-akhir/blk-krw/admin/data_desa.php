<?php 
    session_start();
    if(!isset($_SESSION["login"])){
        header("location : login.php");
        exit;
        // bila session login tidak ada, maka tendang user kembali ke halaman login
    }

    require 'function.php';    
    include 'sidebar.php';

    
    // query atau mengambil semua data dari tabel desa
    $desa = query("SELECT * FROM tbl_desa ORDER BY kode_desa ASC");

    // cek apakah tombol tambah_desa sudah di klik
    if(isset($_POST["tambah_desa"])){
        header("location: tambah_data_desa.php");
        // var desa akan berisi data hasil pencarian dari function cari()
        // function cari mendapat data dari apapun yang diketikan oleh user
    }

    // cek apakah tombol cari_desa sudah di klik
    if(isset($_POST["cari_desa"])){
        $desa = caridesa($_POST["search_desa"]);
        // var desa akan berisi data hasil pencarian dari function cari()
        // function cari mendapat data dari apapun yang diketikan oleh user
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa</title>
    <link rel="stylesheet" href="../css/tambah_data.css?v=<?php echo time(); ?>">
</head>
<body>

    <div class="container">
        <div class="sub_container">

            <!-- Header -->
            <div class="header">
                <h2>Data Desa</h2>
            </div>

            <!-- Content -->
            <div class="box">
                <div class="content">
                    <form action="" method="post">
                        <div class="menu">
                            <div class="search">
                                <input type="text" name="search_desa" id="search" placeholder="Cari data...">
                                <button type="submit" name="cari_desa" id="cari">Cari</button>
                            </div>
                            <div class="tambah">
                                <button type="submit" name="tambah_desa" id="tambah">Tambah</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    
                    <!-- Data Desa -->
                    <div class="t_body">
                        <table border="0" cellpadding="10" cellspacing="0">
                            <tr>
                                <th>No</th>
                                <th>Kode Desa</th>
                                <th>Nama Desa</th>
                                <th>Aksi</th>
                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach($desa as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['kode_desa']; ?></td>
                                <td><?= $row['nama_desa']; ?></td>
                                    <td class="action-btn">
                                        <button type="submit" name="submit" id="ubah"><a href="ubah_data_desa.php?kode_desa=<?= $row["kode_desa"]; ?>">Ubah</a></button>
                                        <button type="submit" name="submit" id="hapus"><a href="hapus_data_desa.php?kode_desa=<?= $row["kode_desa"]; ?>" onclick="return confirm('yakin menghapus data ini?')">Hapus</a></button>
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
