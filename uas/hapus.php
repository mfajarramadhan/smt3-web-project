<?php 
include "koneksi.php";

if(isset($_GET['nik'])){
mysqli_query($koneksi,"DELETE FROM karyawan WHERE nik = '$_GET[nik]'");
}
?>