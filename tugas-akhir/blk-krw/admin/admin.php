<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("location : login.php");
    exit;
    // bila session login tidak ada, maka tendang user kembali ke halaman login
}
    require 'function.php';    
    include 'sidebar.php';
    $admin = query("SELECT * FROM users");
    // $kejuruan = query("SELECT * FROM users");


    if(isset($_POST["cari_admin"])){
        $admin = cariadmin($_POST["search_admin"]);
        // var peserta akan berisi data hasil pencarian dari function cari()
        // function cari mendapat data dari apapun yang diketikan oleh user
    }

        // cek apakah tombol tambah_desa sudah di klik
        if(isset($_POST["tambah_admin"])){
            header("location: tambah_data_admin.php");
            // var desa akan berisi data hasil pencarian dari function cari()
            // function cari mendapat data dari apapun yang diketikan oleh user
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/tambah_data.css?v=<?php echo time(); ?>">
</head>
<body>  
    <!-- Header -->
    <div class="container">
        <div class="sub_container">
            <div class="header">
                <h2>Data Admin</h2>
            </div>

        <!-- Content -->
            <div class="box">
                <div class="content">
                    <form action="" method="post">
                        <div class="menu">
                            <div class="search">
                                <input type="text" name="search_admin" id="search" placeholder="Cari data...">
                                <button type="submit" name="cari_admin" id="cari">Cari</button>
                            </div>
                            <div class="tambah">
                                <button type="submit" name="tambah_admin" id="tambah">Tambah</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    
                    <!-- Data Admin -->
                    <div class="t_body">
                        <table border="0" cellpadding="10" cellspacing="0">
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama Admin</th>
                                <th>Opsi</th>
                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach($admin as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['username']; ?></td>
                                <td><?= $row['nama']; ?></td>
                                    <td class="action-btn">
                                        <button type="submit" name="submit" id="ubah"><a href="ubah_data_admin.php?id_admin=<?= $row["id_admin"]; ?>">Ubah</a></button>
                                        <button type="submit" name="submit" id="hapus"><a href="hapus_data_admin.php?id_admin=<?= $row["id_admin"]; ?>" onclick="return confirm('yakin menghapus data ini?')">Hapus</a></button>
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
