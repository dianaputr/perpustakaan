<?php
session_start();

include('koneksi.php');

/*$id = $_GET['id'];*/

$id_buku = $_POST['id_buku'];
$id_user = $_POST['id_user'];
$waktu_dipinjam = $_POST['waktu_dipinjam'];
$waktu_pengembalian = $_POST['waktu_pengembalian'];


print $id_buku.'<br>';
print $id_user.'<br>';
print $waktu_dipinjam.'<br>';
print $waktu_pengembalian.'<br>';

$query = $db->prepare("INSERT INTO peminjaman (id_buku, id_user, waktu_dipinjam, waktu_pengembalian) VALUES ('$id_buku','$id_user',NOW(),'".date('Y-m-d', strtotime('+1 week'))."')");

if($query->execute()) {
	header("Location: index.php");
}

?>