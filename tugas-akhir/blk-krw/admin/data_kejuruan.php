<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location : login.php");
    exit;
    // bila session login tidak ada, maka tendang user kembali ke halaman login
}

require 'function.php';
include 'sidebar.php';


// query atau mengambil semua data dari tabel kejuruan
$kejuruan = query("SELECT * FROM tbl_kejuruan ORDER BY kode_kejuruan ASC");

// cek apakah tombol tambah_kejuruan sudah di klik
if (isset($_POST["tambah_kejuruan"])) {
    header("location: tambah_data_kejuruan.php");
    // var kejuruan akan berisi data hasil pencarian dari function cari()
    // function cari mendapat data dari apapun yang diketikan oleh user
}

// cek apakah tombol cari_kejuruan sudah di klik
if (isset($_POST["cari_kejuruan"])) {
    $kejuruan = carikejuruan($_POST["search_kejuruan"]);
    // var kejuruan akan berisi data hasil pencarian dari function cari()
    // function cari mendapat data dari apapun yang diketikan oleh user
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kejuruan</title>
    <link rel="stylesheet" href="../css/tambah_data.css?v=<?php echo time(); ?>">
</head>

<body>

    <div class="container">
        <div class="sub_container">

            <!-- Header -->
            <div class="header">
                <h2>Data Kejuruan</h2>
            </div>

            <!-- Content -->
            <div class="box">
                <div class="content">
                    <form action="" method="post">
                        <div class="menu">
                            <div class="search">
                                <input type="text" name="search_kejuruan" id="search" placeholder="Cari data...">
                                <button type="submit" name="cari_kejuruan" id="cari">Cari</button>
                            </div>
                            <div class="tambah">
                                <button type="submit" name="tambah_kejuruan" id="tambah">Tambah</button>
                            </div>
                        </div>
                    </form>
                    <br>

                    <!-- Data Kejuruan -->
                    <div class="t_body">
                        <table border="0" cellpadding="10" cellspacing="0">
                            <tr>
                                <th>No</th>
                                <th>Kejuruan</th>
                                <th>Aksi</th>
                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($kejuruan as $row) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row['kejuruan']; ?></td>
                                    <td class="action-btn">
                                        <button type="submit" name="submit" id="ubah"><a href="ubah_data_kejuruan.php?kode_kejuruan=<?= $row['kode_kejuruan']; ?>">Ubah</a></button>
                                        <button type="submit" name="submit" id="hapus"><a href="hapus_data_kejuruan.php?kode_kejuruan=<?= $row['kode_kejuruan']; ?>" onclick="return confirm('yakin menghapus data ini?')">Hapus</a></button>
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