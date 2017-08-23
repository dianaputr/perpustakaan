<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">


<?php

include ('koneksi.php');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM penerbit WHERE id = $id");
$query->execute();
$data = $query->fetch();

?>

<body>
	<div class="panel panel-primary">
			<div class="panel-heading"><h1>RINCIAN PENERBITAN</h1>
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
				<td>Nama Penerbit</td>
				<td>:</td>
				<td><?php print $data['nama']; ?></td>
			</tr>
			<tr>
				<td>Alamat Penerbit</td>
				<td>:</td>
				<td><?php print $data['alamat']; ?></td>
			</tr>
			<tr>
				<td>Tahun Penerbitan</td>
				<td>:</td>
				<td><?php print $data['tahun_terbit']; ?></td>
			</tr>
		</table>
		<div>
		<a  href="index.php"><h4>Daftar Penerbit</h4></a>
		<a href="maps.php?id=<?= $value['id']; ?>"><h4>Lihat peta</h4></a>
		</div>
	</div>
	</div>
</body>