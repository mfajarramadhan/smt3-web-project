<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
</head>
<body>
    <form action="simpan_mhs.php" method="post">
        <table border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" maxlength="6"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama_mhs"></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td>
                    <select name="prodi">
                        <option value="">--- pilih prodi ---</option>
                        <option value="IF">Informatika</option>
                        <option value="SI">Sistem Informasi</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="simpan">Simpan</button></td>
                <td><button type="reset" name="clear">Bersihkan</button></td>
            </tr>
        </table>
    </form>
</body>
</html>