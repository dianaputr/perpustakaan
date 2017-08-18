<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">


<?php

include ('koneksi.php');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM peminjaman WHERE id = $id");
$query->execute();
$data = $query->fetch();

function getBuku($id) {
	include ('koneksi.php');
	$query = $db->prepare("SELECT * FROM buku WHERE id = $id");
	$query->execute();
	$data = $query->fetch();

	return $data['nama'];
}

function getUser($id) {
	include ('koneksi.php');
	$query = $db->prepare("SELECT * FROM user WHERE id = $id");
	$query->execute();
	$data = $query->fetch();

	return $data['nama'];
}
?>

<body>
<div class="panel panel-primary">
			<div class="panel-heading"><h1>RINCIAN PEMINJAMAN</h1>
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
			<div>&nbsp;</div>
		<table class="table table-border">
			<tr>
				<td>Nama Buku</td>
				<td>:</td>
				<td><?php print getBuku ($data['id_buku']); ?></td>
			</tr>
			<tr>
				<td>Nama User</td>
				<td>:</td>
				<td><?php print getUser ($data['id_user']); ?></td>
			</tr>
			<tr>
				<td>Waktu Peminjaman</td>
				<td>:</td>
				<td><?php print $data['waktu_dipinjam']; ?></td>
			</tr>
			<tr>
				<td>Waktu Pengembalian</td>
				<td>:</td>
				<td><?php print $data['waktu_pengembalian']; ?></td>
			</tr>
		</table>
		<div>
		<a  href="index.php"><h4>Daftar Peminjaman</h4></a>
		</div>
	</div>
	</div>
</body>	