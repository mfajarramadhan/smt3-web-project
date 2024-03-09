<?php 
require "koneksi.php";
if(isset($_POST['simpan'])){
    $norek = $_POST["norek"];
    $nama = $_POST["nama"];
    $query = mysqli_query($koneksi, "INSERT INTO nasabah VALUES('$norek', '$nama')");

    if($query){
    echo"
        <script>
        alert('Sukses');
        </script>
    ";
    }else{
        echo"
        <script>
        alert('Gagal');
        </script>
    ";
    }

    $cek = mysqli_query($koneksi, "SELECT * FROM nasabah WHERE norek = '$norek'");
    $jumlah = mysqli_num_rows($cek); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nasabah</title>
</head>
<body>
    <form action="" method="post">
        <table border="0" cellpadding="10" cellspacing="0">
            <tr>
                <td>
                    <input type="text" placeholder="norek" name="norek">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" placeholder="Nama" name="nama">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="simpan">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>