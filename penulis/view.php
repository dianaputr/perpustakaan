<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">



<?php

include ('koneksi.php');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM penulis WHERE id = $id");
$query->execute();
$data = $query->fetch();

function getJenis($id) {
	include ('koneksi.php');
	$query = $db->prepare("SELECT * FROM jenis_kelamin WHERE id = $id");
	$query->execute();
	$data = $query->fetch();

	return $data['nama'];
}


?>
<body>
<div class="panel panel-primary">
			<div class="panel-heading"><h1>RINCIAN PENULIS</h1>
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
				<td>Nama</td>
				<td>:</td>
				<td><?php print $data['nama']; ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?php print getJenis ($data['id_jenis_kelamin']); ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php print $data['alamat']; ?></td>
			</tr>
		</table>
		<div>
		<a  href="index.php"><h4>Daftar Penulis</h4></a>
		</div>
	</div>
	</div>
</body>