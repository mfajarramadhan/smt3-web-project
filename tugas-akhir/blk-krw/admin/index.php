<?php
require 'function.php';
// include 'navbar.php';
$kecamatan = query("SELECT * FROM tbl_kecamatan");
$desa = query("SELECT * FROM tbl_desa");
$kejuruan = query("SELECT * FROM tbl_kejuruan");
$sekolah = query("SELECT * FROM tbl_sekolah");

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // Ambil data dari variabel conn dan query
    // if(mysqli_affected_rows($conn) > 0){

    // Tidak memerlukan syntax diatas, diubah menjadi dibawah
    if (tambah($_POST) > 0) {
        // data didalam elemen form diambil, dimasukkan ke function tambah dan dikirimkan melalui $_POST kemudian ditangkap oleh $data di lat02 
        // kemudian di cek apakah nilai post lebih besar dari 0 atau = 1 yg menandakan data berhasil ditambahkan

        echo "
                    <script>
                        alert('Berhasil Mendaftar')
                        document.location.href = '../index.html';
                    </script>
                    ";
    } else {
        echo " 
                    <script>
                        alert('Gagal Mendaftar');
                        document.location.href = '../index.html';
                    </script>
                ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Online</title>
    <link rel="stylesheet" href="../css/index.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="header">
        <h2>FORMULIR PENDAFTARAN ONLINE</h2>
    </div>
    <form action="" method="post" enctype="multipart/form-data" onsubmit='return validasi()' ;>
        <table>
            <tr>
                <td>
                    <label for="kode_kejuruan">Kejuruan yang akan dipilih : </label><br>
                    <select name="kode_kejuruan" id="kejuruan">
                        <option value="">-- Pilih Kejuruan --</option>
                        <?php
                        // $query = $conn->query("SELECT * FROM tbl_kecamatan");
                        // while($data = $query->fetch_assoc()){
                        foreach ($kejuruan as $row) :
                        ?>
                            <option value="<?= $row['kode_kejuruan']; ?>">
                                <?= $row['kejuruan']; ?>
                            </option>
                        <?php
                        // }
                        endforeach;
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nik">NIK :</label>
                    <input type="text" placeholder="Masukkan NIK anda" id="nik" name="nik" maxlength=16 required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nama">Nama :</label>
                    <input type="text" placeholder="Nama Lengkap" id="nama" name="nama" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tempat_lahir">Tempat Lahir :</label>
                    <input type="text" placeholder="Tempat Lahir" id="tempat_lahir" name="tempat_lahir" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tanggal_lahir">Tanggal Lahir :</label>
                    <input type="date" placeholder="Tanggal Lahir" id="tanggal_lahir" name="tanggal_lahir" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="radio" class="radio">Jenis Kelamin :</label><br>
                    <input type="radio" id="laki_laki" name="jk" value="L">Laki-Laki <br>
                    <input type="radio" id="perempuan" name="jk" value="P">Perempuan
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nama">Status Pernikahan :</label><br>
                    <input type="radio" id="menikah" name="status_nikah" value="Menikah">Menikah <br>
                    <input type="radio" id="belum_menikah" name="status_nikah" value="Belum Menikah">Belum Memikah
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Tinggi Badan :</label><br>
                    <input type="text" placeholder="Contoh  : 176" id="tinggi_badan" name="tinggi_badan" required><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Berat Badan :</label><br>
                    <input type="text" placeholder="Contoh  : 50" id="berat_badan" name="berat_badan" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">No Telepon :</label><br>
                    <input type="text" placeholder="0896*********" id="no_telp" name="no_telp" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Email :</label><br>
                    <input type="email" placeholder="Contoh  : pesertapelatihan@gmail.com" id="email" name="email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Alamat :</label><br>
                    <textarea name="alamat" id="alamat" cols="50" rows="5" placeholder="Contoh : Jl. Soekarno-Hatta, RT/RW 001/002" required></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kode_desa">Desa : </label><br>
                    <select name="kode_desa" id="desa">
                        <option value="">-- Pilih Desa Anda --</option>
                        <?php
                        // $query = $conn->query("SELECT * FROM tbl_kecamatan");
                        // while($data = $query->fetch_assoc()){
                        foreach ($desa as $row) :
                        ?>
                            <option value="<?= $row['kode_desa']; ?>">
                                <?= $row['nama_desa']; ?>
                            </option>
                        <?php
                        // }
                        endforeach;
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kode_kecamatan">Kecamatan : </label><br>
                    <select name="kode_kecamatan" id="kecamatan">
                        <option value="">-- Pilih Kecamatan Anda --</option>
                        <?php
                        // $query = $conn->query("SELECT * FROM tbl_kecamatan");
                        // while($data = $query->fetch_assoc()){
                        foreach ($kecamatan as $row) :
                        ?>
                            <option value="<?= $row['kode_kecamatan']; ?>">
                                <?= $row['nama_kecamatan']; ?>
                            </option>
                        <?php
                        // }
                        endforeach;
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Nama Orangtua :</label><br>
                    <input type="text" placeholder="Nama Orangtua" id="nama_ortu" name="nama_ortu" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">No Telepon Orang Tua :</label><br>
                    <input type="text" placeholder="0896*********" id="no_ortu" name="no_ortu" required>
                </td>
            </tr>
            <tr>
            <tr>
                <td>
                    <label for="pendidikan">Pendidikan Terakhir : </label><br>
                    <select name="pendidikan" id="pendidikan" required>
                        <option value="">-- Pilih Pendidikan Terakhir --</option>
                        <option value="strata" id="strata" name="pendidikan">S1/D3/D4</option>
                        <option value="sma/smk" id="sma" name="pendidikan">SMA/SMK</option>
                        <option value="smp" id="smp" name="pendidikan">SMP</option>
                        <option value="sd" id="sd" name="pendidikan">SD</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="npsn">Asal Sekolah : </label><br>
                    <select name="npsn" id="sekolah">
                        <option value="">-- Pilih Sekolah Anda --</option>
                        <?php
                        // $query = $conn->query("SELECT * FROM tbl_sekolah");
                        // while($data = $query->fetch_assoc()){
                        foreach ($sekolah as $row) :
                        ?>
                            <option value="<?= $row['npsn']; ?>">
                                <?= $row['nama_sekolah']; ?>
                            </option>
                        <?php
                        // }
                        endforeach;
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Jurusan/Prodi :</label><br>
                    <input type="text" placeholder="Contoh : Teknik Mesin" id="jurusan" name="jurusan" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tujuan">Tujuan Setelah Pelatihan : </label><br>
                    <select name="tujuan" id="tujuan" required>
                        <option value="">-- Pilih Tujuan --</option>
                        </option>
                        <option value="kerja" id="kerja" name="tujuan">Kerja</option>
                        <option value="usaha" id="usaha" name="tujuan">Usaha</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Upload KTP :</label><br>
                    <input type="file" id="ktp" name="ktp" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="agree" required>
                    <label for="agree">Bersedia mengikuti aturan dan tata tertib pelatihan</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit"></input>
                </td>
            </tr>
        </table>
    </form>
    <footer>
        Copyright 2023 @ BLK Karawang
    </footer>

    <script src="../js/validasi.js"></script>
</body>

</html>