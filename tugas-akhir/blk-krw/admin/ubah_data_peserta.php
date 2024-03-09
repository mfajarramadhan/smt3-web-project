<?php 
    require 'function.php';    
    require 'sidebar.php';  
    


    // Ambil data nik peserta
    $nik = $_GET['nik'];

    // query data 
    $peserta = query("SELECT * FROM tbl_peserta, tbl_kecamatan, tbl_desa, tbl_kejuruan, tbl_sekolah 
                    WHERE   
                        tbl_peserta.kode_kecamatan =  tbl_kecamatan.kode_kecamatan && 
                        tbl_peserta.kode_desa = tbl_desa.kode_desa &&
                        tbl_peserta.kode_kejuruan = tbl_kejuruan.kode_kejuruan &&
                        tbl_peserta.npsn = tbl_sekolah.npsn 
                        AND nik = $nik")[0];

    $kejuruan = query("SELECT * FROM tbl_kejuruan");
    $kecamatan = query("SELECT * FROM tbl_kecamatan");
    $desa = query("SELECT * FROM tbl_desa");
    $sekolah = query("SELECT * FROM tbl_sekolah");



    if(isset($_POST["submit"])){
        if(ubahpeserta($_POST) > 0){
            // data didalam elemen form diambil, dimasukkan ke function tambah dan dikirimkan melalui $_POST kemudian ditangkap oleh $data di lat02 
            // kemudian di cek apakah nilai post lebih besar dari 0 atau = 1 yg menandakan data berhasil ditambahkan
            
            echo "
                <script>
                    alert('Data berhasil di ubah!')
                    document.location.href = 'data_peserta.php';
                </script>
                ";
            }else{
                echo " 
                <script>
                    alert('Gagal merubah data!');
                    document.location.href = 'data_peserta.php';
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
    <title>Ubah Data Peserta</title>
    <link rel="stylesheet" href="../css/tambah_data_all.css?v=<?php echo time(); ?>">
</head>
<body>  
    <div class="container">
        <div class="sub-container">
            <div class="header">
                <h2>Ubah Data Peserta</h2>
            </div>
        <div class="box">
            <div class="content">
            <form action="" method="post" onsubmit='return validasi()';>
                <table>
                    <tr>
                        <td>
                            <input type="hidden" name="nik" value="<?= $peserta["nik"]; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="kode_kejuruan">Kejuruan yang akan dipilih : </label><br>
                            <select name="kode_kejuruan" id="kejuruan">
                            <option value="<?= $peserta['kode_kejuruan']; ?>"><?= $peserta['kejuruan']; ?></option>
                                <?php 
                                    // $query = $conn->query("SELECT * FROM tbl_kecamatan");
                                    // while($data = $query->fetch_assoc()){
                                    foreach($kejuruan as $row) :
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
                            <label for="nama">Nama   :</label>
                            <input type="text" placeholder="Nama Lengkap" id="nama" name="nama" value="<?= $peserta["nama"]; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tempat_lahir">Tempat Lahir   :</label>
                            <input type="text" placeholder="Tempat Lahir" id="tempat_lahir" name="tempat_lahir" value="<?= $peserta["tempat_lahir"]; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tanggal_lahir">Tanggal Lahir   :</label>
                            <input type="date" placeholder="Tanggal Lahir" id="tanggal_lahir" name="tanggal_lahir" value="<?= $peserta["tanggal_lahir"]; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="radio" class="radio">Jenis Kelamin    :</label><br>
                            <input type="radio" id="laki_laki" name="jk" value="L" <?= isset($peserta["jk"]) && $peserta["jk"]  == 'L' ? 'checked' : '';?>>Laki-Laki <br>
                            <input type="radio" id="perempuan" name="jk" value="P" <?= isset($peserta["jk"]) && $peserta["jk"]  == 'P' ? 'checked' : '';?>>Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="nama">Status Pernikahan    :</label><br>
                            <input type="radio" id="menikah" name="status_nikah" value="Menikah" <?= isset($peserta["status_nikah"]) && $peserta["status_nikah"]  == 'Menikah' ? 'checked' : '';?>>Menikah <br>
                            <input type="radio" id="belum_menikah" name="status_nikah" value="Belum Menikah" <?= isset($peserta["status_nikah"]) && $peserta["status_nikah"]  == 'Belum Menikah' ? 'checked' : '';?>>Belum Memikah
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Tinggi Badan  :</label><br>
                            <input type="text" placeholder="Contoh  : 176" id="tinggi_badan" name="tinggi_badan" value="<?= $peserta["tinggi_badan"]; ?>" required><br>
                        </td>
                    </tr>
                    <tr>
                    <td>
                            <label for="">Berat Badan  :</label><br>
                            <input type="text" placeholder="Contoh  : 50" id="berat_badan" name="berat_badan" value="<?= $peserta["berat_badan"]; ?>" required> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">No Telepon  :</label><br>
                            <input type="text" placeholder="0896*********" id="no_telp" name="no_telp" value="<?= $peserta["no_telp"]; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Email  :</label><br>
                            <input type="email" placeholder="Contoh  : pesertapelatihan@gmail.com" id="email" name="email" value="<?= $peserta["email"]; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Alamat  :</label><br>
                            <textarea name="alamat" id="alamat" cols="50" rows="5" placeholder="Nama Jalan, RT/RW" required><?= $peserta["alamat"]; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="kode_desa">Desa : </label><br>
                            <select name="kode_desa" id="desa">
                                <option value="<?= $peserta["kode_desa"]; ?>"><?= $peserta["nama_desa"]; ?></option>
                                <?php 
                                    // $query = $conn->query("SELECT * FROM tbl_kecamatan");
                                    // while($data = $query->fetch_assoc()){
                                    foreach($desa as $row) :
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
                                <option value="<?= $peserta["kode_kecamatan"]; ?>"><?= $peserta["nama_kecamatan"]; ?></option>
                                <?php 
                                    // $query = $conn->query("SELECT * FROM tbl_kecamatan");
                                    // while($data = $query->fetch_assoc()){
                                    foreach($kecamatan as $row) :
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
                            <label for="">Nama Orangtua  :</label><br>
                            <input type="text" placeholder="Nama Orangtua" id="nama_ortu" name="nama_ortu" value="<?= $peserta["nama_ortu"]; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">No Telepon Orang Tua  :</label><br>
                            <input type="text" placeholder="No Telepone Orang Tua" id="no_ortu" name="no_ortu" value="<?= $peserta["no_ortu"]; ?>" required>
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td>
                            <label for="pendidikan">Pendidikan Terakhir : </label><br>
                            <select name="pendidikan" id="pendidikan" required>
                                <option><?= $peserta["pendidikan"]; ?></option>
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
                            <select name="npsn" id="npsn">
                                <option><?= $peserta["nama_sekolah"]; ?></option>
                                <?php 
                                    // $query = $conn->query("SELECT * FROM tbl_sekolah");
                                    // while($data = $query->fetch_assoc()){
                                    foreach($sekolah as $row) :
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
                            <label for="">Jurusan/Prodi  :</label><br>
                            <input type="text" placeholder="Jurusan/Prodi" id="jurusan" name="jurusan" value="<?= $peserta["jurusan"]; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tujuan">Tujuan Setelah Pelatihan : </label><br>
                            <select name="tujuan" id="tujuan" required>
                                <option><?= $peserta["tujuan"]; ?></option>
                                </option>
                                <option value="kerja" id="kerja" name="tujuan">Kerja</option>
                                <option value="usaha" id="usaha" name="tujuan">Usaha</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="ktp">Upload KTP    :</label><br>
                            <input type="file" id="ktp" name="ktp">
                            <img src="../ktp/<?= $peserta['ktp']; ?>" width="90" height="60" alt="ktp">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="submit">Update</button>
                        </td>
                    </tr>
                </table>
            </form>
            </div>
        </div>
        </div>
    </div>
</body>
</html>