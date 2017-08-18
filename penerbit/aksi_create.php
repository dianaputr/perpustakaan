<?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$tahun_terbit = $_POST['tahun_terbit'];


print $nama.'<br>';
print $alamat. '<br>'; 
print $tahun_terbit.'<br>';


$query = $db->prepare("INSERT INTO penerbit (nama, alamat, lat, lng, tahun_terbit) VALUES ('$nama','$alamat', '$lat', '$lng', '$tahun_terbit')");

if($query->execute()) {
	header("Location: index.php");
}

?>