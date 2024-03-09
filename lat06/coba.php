<?php
    

    $npm = $_POST['npm'];
    $nama = $_POST['nama'];

    echo $npm."-".$nama;

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "new";
    
    $koneksi = mysqli_connect($host, $user, $password, $db);

    $query = mysqli_query($koneksi, "INSERT INTO baru VALUES('$npm', '$nama')");
?>