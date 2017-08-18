<?php

include ('koneksi.php');

header("Content-type: application/vnd-ms-word");

header("Content-Disposition: attachment; filename=daftarbuku.doc");

include 'template_word.php';
?>