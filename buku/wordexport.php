<?php

include "koneksi.php"
require_once 'PHPWord/PHPWord.php';// memasukan library PHPWord

// mengambil data siswa dengan perintah SELECT
$query = $db->prepare("SELECT * FROM buku");
$query->execute();

$data = $query->fetch_assoc(); // menngambil data
		function getJenis($id) {
		  include ('koneksi.php');
		  $query = $db->prepare("SELECT * FROM jenis WHERE id = $id");
		  $query->execute();
		  $data = $query->fetch();

		  return $data['nama'];
		}
$query->close(); // membersihkan memori


$PHPWord = new PHPWord(); // membuat objek PHPWord
$template = $PHPWord->loadTemplate('Template.docx'); // membuka template
// proses meletakan data dari database ke file template
foreach($data as $nama_kolom => $value){
    $template->setValue($nama_kolom, $value);
}

// menyimpan hasil
$file_hasil ="daftar-buku-perpustakaan.docx";
$template->save($file_hasil);

header('location: ' . $file_hasil);// download file