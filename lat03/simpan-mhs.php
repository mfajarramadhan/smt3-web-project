<?php 
    $a = $_POST["nim"];
    $b = $_POST["nama_mhs"];
    $c = $_POST["prodi"];
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $basisdata = "db_pagi";

    $koneksi = mysqli_connect($host, $user, $password, $basisdata); 
    
    $simpan = mysqli_query($koneksi, "INSERT INTO mahasiswa 
                            SET nim = '$a', 
                                nama_mhs = '$b', 
                                prodi = '$c'");

    if($simpan){
        echo "
            <script>
                alert('Data Tersimpan');
                window.location = 'mahasiswa.php';
            </script>
        ";
    }else{
      echo"      
            <script>
                alert('Data Gagal');
                window.location = 'mahasiswa.php';
            </script>
        ";
    }
?>