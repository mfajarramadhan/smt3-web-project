 <?php 
 $kode = $_POST['kode_sekolah'];
 $nama = $_POST['nama_sekolah'];
 $alamat = $_POST['alamat_sekolah'];

//  koneksi
$k = mysqli_connect("localhost", "root", "", "dbs"); 

$cek = mysqli_query($k, "SELECT * FROM sekolah WHERE kode_sekolah = '$kode'");

// Cek apakah ada primary key (kode sekolah) di dalam tabel sekolah
$jm = mysqli_num_rows($cek);

if($jm == 1){
    echo"
        <script>
        alert('Data sudah ada, silahkan masukkan kode lain');
        window.location = 'sekolah.php';
        </script>
    ";

}else{
    $simpan = mysqli_query($k, "INSERT INTO sekolah SET
                            kode_sekolah = '$kode',
                            nama_sekolah = '$nama',
                            alamat_sekolah = '$alamat'");
    if($simpan){
        echo "
            <script>
            alert('Data berhasil disimpan');
            window.location = 'sekolah.php';
            </script>
        ";
    }
}
 ?>