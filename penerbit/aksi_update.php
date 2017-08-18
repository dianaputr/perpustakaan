<?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tahun_terbit = $_POST['tahun_terbit'];



print $nama.'<br>';
print $alamat. '<br>';
print $tahun_terbit.'<br>';


$query = $db->prepare("UPDATE penerbit SET nama = '$nama', alamat = '$alamat', tahun_terbit = '$tahun_terbit' WHERE id = $id");

if ($query->execute()) {
	header("Location: index.php");
}

?>