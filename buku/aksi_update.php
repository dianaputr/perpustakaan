<?php

include('koneksi.php');

$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM buku WHERE id = :id");
$query->bindValue(':id', $_GET['id']);
$query->execute();
$buku = $query->fetch();

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
} else{
	$nama_file = $buku['cover'];
}

print $nama.'<br>';
print $id_jenis.'<br>';
print $id_penulis. '<br>';
print $cover.'<br>';

$query = $db->prepare("UPDATE buku SET nama = '$nama', id_jenis = '$id_jenis', id_penulis = '$id_penulis',  cover = '$nama_file' WHERE id = $id");

if ($query->execute()) {
	header("Location: index.php");
}

?>