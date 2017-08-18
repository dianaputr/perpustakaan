<?php

include ('koneksi.php');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM buku WHERE id = $id");
$query->execute();
$data = $query->fetch();

function getJenis($id) {
	include ('koneksi.php');
	$query = $db->prepare("SELECT * FROM jenis WHERE id = $id");
	$query->execute();
	$data = $query->fetch();

	return $data['nama'];
}

function getPenulis($id) {
	include ('koneksi.php');
	$query = $db->prepare("SELECT * FROM penulis WHERE id = $id");
	$query->execute();
	$data = $query->fetch();

	return $data['nama'];
}

?>

<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">
<body>

	<div class="panel panel-primary">
			<div class="panel-heading"><h1>RINCIAN BUKU</h1>
			</div>
	</div>
	<div class="row">
	<div class="col-sm-3">
		<?php include('../home.php'); ?>

	</div>
	<div class="col-sm-6">
		<div class="container">
		</div>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
		<table class="table table-border">
			<tr>
				<td>Nama Buku</td>
				<td>:</td>
				<td><?php print $data['nama']; ?></td>
			</tr>
			<tr>
				<td>Jenis Buku</td>
				<td>:</td>
				<td><?php print getJenis ($data['id_jenis']); ?></td>
			</tr>
			<tr>
				<td>Penulis Buku</td>
				<td>:</td>
				<td><?php print getPenulis ($data['id_penulis']); ?></td>
			</tr>
			<tr>
				<td>Cover</td>
				<td>:</td>
				<td><img width="350px" src="cover/<?php print $data['cover']; ?>"/></td>
			</tr>
		</table>
			<div>
				<a  href="index.php"><h4>Daftar Buku</h4></a>

			</div>
	</div>
	</div>	
</body>
