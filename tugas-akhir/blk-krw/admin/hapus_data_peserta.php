<?php 
    require 'function.php';
    // menghubungkan halaman

    $nik = $_GET["nik"];
    // mengambil data id di url yg dikirim dari lat01 pada <td>hapus</td> dan dimasukkan ke dalam variabel id
  
    if(hapus($nik) > 0){
        // function hapus detailnya di lat-02, jika function hapus memiliki nilai lebih dari 0 maka berhasil menghapus data
        
        echo "
                <script>
                    alert('Data berhasil dihapus')
                    document.location.href = 'data_peserta.php';
                </script>
                ";
            }else{
                echo " 
                <script>
                    alert('Gagal menghapus data');
                    document.location.href = 'data_peserta.php';
                </script>
            ";
    }
    
?>