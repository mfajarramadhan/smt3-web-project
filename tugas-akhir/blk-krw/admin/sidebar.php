<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Tambah Data</title> -->
    <link rel="stylesheet" href="../css/sidebar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="sidebar">
        <div class="logo">
            <img src="../img/logo-blk.png" alt="Logo BLK Karawang">
            <h4>UPTD BLK <br> Kabupaten Karawang</h4>
        </div>
        <ul>
            <li><a href="data_peserta.php">Peserta</a></li>
            <li><a href="admin.php">Admin</a></li>
            <li>
                <a href="#" class="feat-btn">Tambah Data
                    <span class="fas fa-caret-down first"></span>
                </a>
                <ul class="feat-show">
                    <li><a href="data_kejuruan.php">Data Kejuruan</a></li>
                    <li><a href="data_desa.php">Data Desa</a></li>
                    <li><a href="data_kecamatan.php">Data Kecamatan</a></li>
                </ul>
            </li>
            <li><a href="logout.php" onclick="return confirm('yakin keluar?')">Logout</a></li>
        </ul>
    </nav>

    <script src="../js/dropdown.js"></script>
</body>

</html>