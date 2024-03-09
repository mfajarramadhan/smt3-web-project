<?php 
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nasabah</title>
</head>
<body>
    <h1>Tambah Nasabah</h1>
    <form action="" method="post">
        <table border="0" cellpadding="10" cellspacing="0">
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><input type="text" name="nik" required autofocus></td>
            </tr>
            <tr>
                <td>Nama Karyawan</td>
                <td>:</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><input type="text" name="jenis_k"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat" id="" cols="30" rows="5"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button type="submit" name="tambah">Tambah</button></td>
            </tr>
        </table>
    </form>

    <?php 
    // Tambah Data
    if(isset($_POST['tambah'])){
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $jenis_k = $_POST['jenis_k'];
        $alamat = $_POST['alamat'];

        $cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik = '$_POST[nik]'");
        if (mysqli_num_rows($cek) > 0){
            echo "<script>
                    alert('Mohon maaf data sudah ada!');
            </script>";
            exit;
        }else{
        

        $query = mysqli_query($koneksi, "INSERT INTO karyawan VALUES('$nik', '$nama', '$jenis_k', '$alamat')");
        if($query){
            echo "<script>
                    alert('Tambah Data Berhasil');
                    window.location = 'nasabah_tampil.php';
            </script>";
        }
    }
    }
    ?>
</body>
</html>