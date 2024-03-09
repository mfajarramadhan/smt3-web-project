<?php 
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nasabah</title>
    <style>
        table th{
            background-color: black;
        }

        table tr:nth-child(odd){
            background-color: blue;
            color: white;
        }

        table tr:nth-child(even){
            background-color: lightblue;
            color: black;
        }

        a{
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h1>Data Nasabah</h1>
<br>

    <!-- Pencarian Data -->
    <form action="" method="get">
        <label for="cari">Cari Data :</label>
        <input type="text" name="cari" id="cari" placeholder="cari..." size="32" autofocus>
    </form>
    <br>


    <!-- Data Nasabah -->
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <tr>
        <?php 
        // Cari Data 
        if(isset($_GET['cari'])){
            $pencarian = $_GET['cari'];
            $cari = "SELECT * FROM karyawan WHERE nik LIKE '%$pencarian%' OR nama_karyawan LIKE '%$pencarian%' OR jenis_k LIKE '%$pencarian%' OR alamat LIKE '%$pencarian%' ORDER BY nama_karyawan ASC";
        }else{
            $cari = "SELECT * FROM karyawan";
        }


        // Data Tampil 
        $no = 1;
        $query = mysqli_query($koneksi, $cari);
        while($data = mysqli_fetch_assoc($query)){
        ?>

            <td><?= $no++; ?></td>
            <td><?= $data['nik']; ?></td>
            <td><?= $data['nama_karyawan']; ?></td>
            <td><?= $data['jenis_k']; ?></td>
            <td><?= $data['alamat']; ?></td>
            <td><button type="submit" name="hapus" onclick="return confirm('Yakin menghapus data?')"><a href="hapus.php?nik=<?= $data['nik']; ?>">Hapus</a></button></td>
        </tr>

        <?php } ?>
    </table>
</body>
</html>