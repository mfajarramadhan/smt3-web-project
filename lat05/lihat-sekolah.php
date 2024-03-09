<head>
 <style>
  .ganjil {background-color: green;}
  .genap {background-color: gray;}
  .ganjil:hover, .genap:hover {background-color: yellow;}
 </style>
</head>

<script>
	function pesan(y){
		if(k)
		{
			window.location = 'hapus.php?kkk'+y;
			// alert(y)
		}
		}
		else
		{
			exit;
		}
</script>

<?php

$c = $_GET['tcari'];
// echo $c
$k = mysqli_connect("localhost","root","","dbs");

if($c==''){
    $lihat = mysqli_query($k,"select * from sekolah");
}else{
    $lihat = mysqli_query($k,"select * from sekolah where kode_sekolah = '$c'");
}

$j = mysqli_num_rows($lihat);
echo "<h3>Data Sekolah</h3>";
echo "<form action=lihat-sekolah.php method=get
			<input type=text name=tcari>
			<input type=submit name=cari>
	  </form>";

echo "<table border=1>";
echo "<tr><th>No</th><th>Kode Sekolah</th><th>Nama Sekolah</th><th>Alamat</th><th>Proses</th></tr>";

for($k=1; $k<=$j; $k++)
{
  $data = mysqli_fetch_array($lihat);	
  if($k % 2 == 1)//% adalah modulus
  { 
  echo "<tr class=ganjil>
		<td>$k</td>
		<td>$data[kode_sekolah]</td>
		<td>$data[nama_sekolah]</td>
		<td>$data[alamat_sekolah]</td>		
		</tr>";
	}
	else
	{
  echo "<tr class=genap>
		<td>$k</td>
		<td>$data[kode_sekolah]</td>
		<td>$data[nama_sekolah]</td>
		<td>$data[alamat_sekolah]</td>
		<td>		
			<input type=hidden value=$data[kode_sekolah] id=xxx$k>
			<input type=button value=X onclick='pesan(xxx$k.value)';>
		</td>
		</tr>";
	}	
 }
 echo "</table>";
?>