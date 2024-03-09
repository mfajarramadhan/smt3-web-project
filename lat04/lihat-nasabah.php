<head>
    <style>
        table tr:nth-child(odd){
            background-color: skyblue;
        }
        table tr:nth-child(even){
            background-color: lightgreen;
        }
        table tr:hover{
            background-color : white;
            color: black;
        }
    </style>
</head>

<?php 
include 'koneksi.php';

$nsb = mysqli_query($koneksi, "SELECT * FROM nasabah");
$jm_baris = mysqli_num_rows($nsb);

echo "
    <table border=1>
    <tr>
        <td>No</td>
        <td>Norek</td>
        <td>Nama</td>
    </tr>";

for($k=1; $k<=$jm_baris; $k++){
    $data = mysqli_fetch_array($nsb);
    echo "
        <tr>
            <td>$k</td>
            <td>$data[norek]</td>
            <td>$data[nama]</td>
        </tr>
        <tr>
            <td>$k</td>
            <td>$data[norek]</td>
            <td>$data[nama]</td>
        </tr>
    ";
}
echo "<table>";
?>

