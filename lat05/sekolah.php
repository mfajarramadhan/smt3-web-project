<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolah</title>
</head>
<body>
    <h2>DATA SEKOLAH</h2>
    <form action="simpan_sekolah.php" method="post">
        <table border="0" cellpadding="2" cellspacing="0">
            <tr>
                <td>Kode Sekolah</td>
                <td>:</td>
                <td><input type="text" name="kode_sekolah"></td>
            </tr>
            <tr>
                <td>Nama Sekolah</td>
                <td>:</td>
                <td><input type="text" name="nama_sekolah"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat_sekolah"></td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="simpan">Simpan</button>
                    <a href="lihat-sekolah.php"><button type="submit" name="lihat">Lihat</button></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>


<!-- tr*3>td*3

Hasilnya :

<tr>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td></td>
</tr> -->