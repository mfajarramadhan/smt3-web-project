<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_blkkarawang");
// (namaserver, username, pw, database)


// Mengambil data peserta
function query($query)
{
    global $conn;
    // variabel $conn didalam function merupakan variabel lokal yg menampung nilai variabel global diatas
    $result = mysqli_query($conn, $query);
    // result itu ibarat lemari untuk menampung baju
    $rows = [];
    // rows ibarat kotak kosong untuk menampung baju
    while ($row = mysqli_fetch_assoc($result)) {
        // row ibarat baju yang akan diambil satu persatu (pengulangan) 
        $rows[] = $row;
        // memasukkan baju kedalam kotak 
    }
    return $rows;
}


// Tambah data peserta
function tambah($data)
{
    // $data menangkap data dari function tambah di lat03 yang dikirimkan oleh $_POST 
    global $conn;
    // koneksi ke database, sehingga di lat03 tadak memerlukan koneksi lagi
    // ambil data dari tiap elemen dalam form dan dimasukkan kedalam variabel
    $kode_kejuruan = htmlspecialchars(strtoupper($data["kode_kejuruan"]));
    $nik = htmlspecialchars($data["nik"]);
    $nama = htmlspecialchars(strtoupper($data["nama"]));
    $tempat_lahir = htmlspecialchars(strtoupper($data["tempat_lahir"]));
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $jk = htmlspecialchars($data["jk"]);
    $status_nikah = htmlspecialchars($data["status_nikah"]);
    $tinggi_badan = htmlspecialchars($data["tinggi_badan"]);
    $berat_badan = htmlspecialchars($data["berat_badan"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $email = htmlspecialchars($data["email"]);
    $alamat = htmlspecialchars(strtoupper($data["alamat"]));
    $kode_desa = htmlspecialchars(strtoupper($data["kode_desa"]));
    $kode_kecamatan = htmlspecialchars(strtoupper($data["kode_kecamatan"]));
    $nama_ortu = htmlspecialchars(strtoupper($data["nama_ortu"]));
    $no_ortu = htmlspecialchars($data["no_ortu"]);
    $pendidikan = htmlspecialchars($data["pendidikan"]);
    $npsn = htmlspecialchars(strtoupper($data["npsn"]));
    $jurusan = htmlspecialchars($data["jurusan"]);
    $tujuan = htmlspecialchars($data["tujuan"]);
    $ktp = upload();
    if (!$ktp) {
        return false;
    }

    // query insert data peserta
    $query = "INSERT INTO tbl_peserta
                VALUES
                ('$kode_kejuruan', '$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jk', '$status_nikah', '$tinggi_badan', '$berat_badan', '$no_telp', '$email', '$alamat', '$kode_desa', '$kode_kecamatan', '$nama_ortu', '$no_ortu', '$pendidikan', '$npsn', '$jurusan', '$tujuan', '$ktp')
                ";

    mysqli_query($conn, $query);
    // mysqli_query($conn, $input);
    return mysqli_affected_rows($conn);
}


// Upload ktp
function upload()
{
    $namaFile = $_FILES['ktp']['name'];
    $ukuranFile = $_FILES['ktp']['size'];
    $error = $_FILES['ktp']['error'];
    $tmpName = $_FILES['ktp']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                    alert('Pilih gambar terlebih dahulu!');
                </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                    alert('Gambar harus berekstensi jpg, jpeg, atau png!');
                </script>
            ";
        return false;
    }

    if ($ukuranFile > 2000000) {
        echo "<script>
                    alert('Ukuran gambar terlalu besar! max 2mb');
            </script>";
        return false;
    }

    $namaFileRandom = uniqid();
    $namaFileRandom .= '.';
    $namaFileRandom .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../ktp/' . $namaFileRandom);
    return $namaFileRandom;
}


// Tambah data kecamatan
function tambahkecamatan($kecamatan)
{
    global $conn;
    $kode_kecamatan = htmlspecialchars(strtoupper($kecamatan["kode_kecamatan"]));
    $nama_kecamatan = htmlspecialchars(strtoupper($kecamatan["nama_kecamatan"]));
    $alamat = htmlspecialchars(strtoupper($kecamatan["alamat"]));
    $ket = htmlspecialchars(strtoupper($kecamatan["ket"]));

    // query insert data kecamatan
    $query = "INSERT INTO tbl_kecamatan
                VALUES
                ('$kode_kecamatan', '$nama_kecamatan', '$alamat', '$ket')
                ";

    mysqli_query($conn, $query);
    // mysqli_query($conn, $input);
    return mysqli_affected_rows($conn);
}


// Tambah data desa
function tambahdesa($desa)
{
    global $conn;
    $kode_desa = htmlspecialchars(strtoupper($desa["kode_desa"]));
    $nama_desa = htmlspecialchars(strtoupper($desa["nama_desa"]));
    $alamat = htmlspecialchars(strtoupper($desa["alamat"]));
    $ket = htmlspecialchars(strtoupper($desa["ket"]));

    // query insert data kecamatan
    $query = "INSERT INTO tbl_desa
                VALUES
                ('$kode_desa', '$nama_desa', '$alamat', '$ket')
                ";

    mysqli_query($conn, $query);
    // mysqli_query($conn, $input);
    return mysqli_affected_rows($conn);
}


// Tambah data kejuruan
function tambahkejuruan($data)
{
    global $conn;
    $kode_kejuruan = htmlspecialchars(strtoupper($data["kode_kejuruan"]));
    $kejuruan = htmlspecialchars(strtoupper($data["kejuruan"]));
    $pelatihan = htmlspecialchars(strtoupper($data["pelatihan"]));


    // query insert data kejuruan
    $query = "INSERT INTO tbl_kejuruan
                VALUES
                ('$kode_kejuruan', '$kejuruan', '$pelatihan')
                ";

    mysqli_query($conn, $query);
    // mysqli_query($conn, $input);
    return mysqli_affected_rows($conn);
}


// Register Peserta
function logpes($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $sandi = htmlspecialchars($data["sandi"]);

    // query insert data kecamatan
    $query = "INSERT INTO login_peserta
                VALUES
                ('', '$nama', '$email', '$nohp', '$sandi')
                ";

    mysqli_query($conn, $query);
    // mysqli_query($conn, $input);
    return mysqli_affected_rows($conn);
}

// Tambah data Admin
function tambahadmin($data)
{
    global $conn;
    // mengubah paksa username menjadi huruf kecil dan menghilangkan slash (/)
    $nama = htmlspecialchars(strtoupper($data["nama"]));
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    // $nama = htmlspecialchars(strtoupper($admin["nama"]));
    // mysqli_real_escape_string() menambahkan tanda kutip saat user memasukkan password dan mengamankan di database


    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('Username sudah terdaftar, buat username lain!');
                </>";
        return false;
    }



    // cek konfirmasi password 
    if ($password !== $password2) {
        echo "<script>
                    alert('Konfirmasi password tidak sesuai!');
                </script>";
        return false;
        // gunakan return false agar memasukan data false ke lat06-signup di function register() bahwa mysqli_error 
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$nama', '$username', '$password')");

    return mysqli_affected_rows($conn);
    // Tambshksn user baru ke database
}


// Merubah data peserta
function ubahpeserta($data)
{
    global $conn;

    $nik = $data["nik"];
    $kode_kejuruan = htmlspecialchars(strtoupper($data["kode_kejuruan"]));
    $nama = htmlspecialchars(strtoupper($data["nama"]));
    $tempat_lahir = htmlspecialchars(strtoupper($data["tempat_lahir"]));
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $jk = htmlspecialchars($data["jk"]);
    $status_nikah = htmlspecialchars($data["status_nikah"]);
    $tinggi_badan = htmlspecialchars($data["tinggi_badan"]);
    $berat_badan = htmlspecialchars($data["berat_badan"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $email = htmlspecialchars($data["email"]);
    $alamat = htmlspecialchars(strtoupper($data["alamat"]));
    $kode_desa = htmlspecialchars(strtoupper($data["kode_desa"]));
    $kode_kecamatan = htmlspecialchars(strtoupper($data["kode_kecamatan"]));
    $nama_ortu = htmlspecialchars(strtoupper($data["nama_ortu"]));
    $no_ortu = htmlspecialchars($data["no_ortu"]);
    $pendidikan = htmlspecialchars($data["pendidikan"]);
    $npsn = htmlspecialchars(strtoupper($data["npsn"]));
    $jurusan = htmlspecialchars($data["jurusan"]);
    $tujuan = htmlspecialchars($data["tujuan"]);
    $ktp = htmlspecialchars($data["ktp"]);

    // query insert data peserta
    $query = "UPDATE tbl_peserta SET
                    id_kejuruan = '$kode_kejuruan',  
                    nama = '$nama',    
                    tempat_lahir = '$tempat_lahir',  
                    tanggal_lahir = '$tanggal_lahir',  
                    jk = '$jk',  
                    status_nikah = '$status_nikah',  
                    tinggi_badan = '$tinggi_badan',  
                    berat_badan = '$berat_badan',  
                    no_telp = '$no_telp',  
                    email = '$email',  
                    alamat = '$alamat',  
                    id_desa = '$kode_desa',  
                    id_kecamatan = '$kode_kecamatan',  
                    nama_ortu = '$nama_ortu',  
                    no_ortu = '$no_ortu',  
                    pendidikan = '$pendidikan',  
                    asal_sekolah = '$npsn',  
                    jurusan = '$jurusan',  
                    tujuan = '$tujuan',  
                    ktp = '$ktp'     
                WHERE nik = $nik
                ";
    // Masukan rumus mysql untuk insert data ke dalam database
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// Merubah data kecamatan
function ubahkecamatan($data)
{
    global $conn;

    $kode_kecamatan = $data["kode_kecamatan"];
    $nama_kecamatan = htmlspecialchars(strtoupper($data["nama_kecamatan"]));
    $alamat = htmlspecialchars(strtoupper($data["alamat"]));
    $ket = htmlspecialchars(strtoupper($data["ket"]));

    // query insert data kecamatan
    $query = "UPDATE tbl_kecamatan SET
                    nama_kecamatan = '$nama_kecamatan',
                    alamat = '$alamat',
                    ket = '$ket'
                WHERE kode_kecamatan = $kode_kecamatan
                ";
    // Masukan rumus mysql untuk insert data ke dalam database
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// Merubah data desa
function ubahdesa($data)
{
    global $conn;

    $kode_desa = $data["kode_desa"];
    $nama_desa = htmlspecialchars(strtoupper($data["nama_desa"]));
    $alamat = htmlspecialchars(strtoupper($data["alamat"]));
    $ket = htmlspecialchars(strtoupper($data["ket"]));

    // query insert data desa
    $query = "UPDATE tbl_desa SET
                    nama_desa = '$nama_desa',
                    alamat = '$alamat',
                    ket = '$ket'
                WHERE kode_desa = $kode_desa
                ";
    // Masukan rumus mysql untuk insert data ke dalam database
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// Merubah data kejuruan
function ubahkejuruan($data)
{
    global $conn;

    $kode_kejuruan = strtoupper($data["kode_kejuruan"]);
    $kejuruan = htmlspecialchars(strtoupper($data["kejuruan"]));
    $pelatihan = htmlspecialchars(strtoupper($data["pelatihan"]));

    // query insert data kejuruan
    $query = "UPDATE tbl_kejuruan SET
                    kejuruan = '$kejuruan',
                    pelatihan = '$pelatihan'
                WHERE kode_kejuruan = '$kode_kejuruan'
                ";
    // Masukan rumus mysql untuk insert data ke dalam database
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// Merubah data sekolah
function ubahsekolah($data)
{
    global $conn;

    $npsn = $data["npsn"];
    $nama_sekolah = htmlspecialchars(strtoupper($data["nama_sekolah"]));
    $alamat = htmlspecialchars(strtoupper($data["alamat"]));

    // query insert data sekolah
    $query = "UPDATE tbl_sekolah SET
                    nama_sekolah = '$nama_sekolah',
                    alamat = '$alamat'
                WHERE npsn = $npsn
                ";
    // Masukan rumus mysql untuk insert data ke dalam database
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// Merubah data Admin
function ubahadmin($data)
{
    global $conn;

    $id_admin = $data["id_admin"];
    $nama = htmlspecialchars(strtoupper($data["nama"]));
    $username = htmlspecialchars(strtoupper($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('Username sudah terdaftar, buat username lain!');
                </>";
        return false;
    }

    // cek konfirmasi password 
    if ($password !== $password2) {
        echo "<script>
                    alert('Konfirmasi password tidak sesuai!');
                </script>";
        return false;
        // gunakan return false agar memasukan data false ke lat06-signup di function register() bahwa mysqli_error 
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query insert data Admin
    $query = "UPDATE users SET
                    nama = '$nama',
                    username = '$username',
                    password = '$password'
                WHERE id_admin = $id_admin
                ";
    // Masukan rumus mysql untuk insert data ke dalam database
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// Menghapus data peserta
function hapus($nik)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_peserta WHERE nik = $nik");
    return mysqli_affected_rows($conn);
}


// Menghapus data kecamatan
function hapuskecamatan($kode_kecamatan)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_kecamatan WHERE kode_kecamatan = $kode_kecamatan");
    return mysqli_affected_rows($conn);
}


// Menghapus data desa
function hapusdesa($kode_desa)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_desa WHERE kode_desa = '$kode_desa'");
    return mysqli_affected_rows($conn);
}


// Menghapus data kejuruan
function hapuskejuruan($kode_kejuruan)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_kejuruan WHERE kode_kejuruan = '$kode_kejuruan'");
    return mysqli_affected_rows($conn);
}


// Menghapus data sekolah
function hapussekolah($npsn)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_sekolah WHERE npsn = $npsn");
    return mysqli_affected_rows($conn);
}

// Menghapus data Admin
function hapusadmin($id_admin)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM users WHERE id_admin = '$id_admin'");
    return mysqli_affected_rows($conn);
}


// Cari data peserta
function cari($search)
{
    $query = "SELECT * FROM tbl_peserta
                    WHERE
                nik LIKE '%$search%' OR
                nama LIKE '%$search%' OR
                tempat_lahir LIKE '%$search%' OR
                tanggal_lahir LIKE '%$search%' 
                ";
    return query($query);
}


// Cari data kecamatan
function carikecamatan($search)
{
    $query = "SELECT * FROM tbl_kecamatan
                    WHERE
                kode_kecamatan LIKE '%$search%' OR
                nama_kecamatan LIKE '%$search%' OR
                ket LIKE '%$search%' 
                ";
    return query($query);
}


// Cari data desa
function caridesa($search)
{
    $query = "SELECT * FROM tbl_desa
                    WHERE
                kode_desa LIKE '%$search%' OR
                nama_desa LIKE '%$search%' OR
                ket LIKE '%$search%' 
                ";
    return query($query);
}


// Cari data kejuruan
function carikejuruan($search)
{
    $query = "SELECT * FROM tbl_kejuruan
                    WHERE
                kejuruan LIKE '%$search%'
                ";
    return query($query);
}


// Cari data sekolah
function carisekolah($search)
{
    $query = "SELECT * FROM tbl_sekolah
                    WHERE
                nama_sekolah LIKE '%$search%'
                ";
    return query($query);
}

// Cari data Admin
function cariadmin($search)
{
    $query = "SELECT * FROM users
                    WHERE
                id_admin LIKE '%$search%' OR
                username LIKE '%$search%' OR
                nama LIKE '%$search%' 
                ";
    return query($query);
}
