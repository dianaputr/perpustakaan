<?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];
$id_jenis = $_POST['id_jenis'];
$id_penulis = $_POST['id_penulis'];

	$lokasi_file =$_FILES['cover']['tmp_name'];
	$tipe_file =$_FILES['cover']['type'];
	$nama_file =$_FILES['cover']['name'];
	$direktori ="cover/$nama_file";

print $lokasi_file;

if (!empty($lokasi_file)) {
	move_uploaded_file($lokasi_file,$direktori);
}

print $nama.'<br>';
print $id_jenis.'<br>';
print $id_penulis. '<br>';
print $cover.'<br>';

$query = $db->prepare("INSERT INTO buku (nama, id_jenis, id_penulis, cover) VALUES ('$nama','$id_jenis','$id_penulis','$nama_file') ");

if($query->execute()) {
	header("Location: index.php");
}

?>