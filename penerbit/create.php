
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script> 
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">

<body>
	<div class="panel panel-primary">
			<div class="panel-heading"><h1>TAMBAH PENERBIT</h1>
			</div>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<?php include('../home.php'); ?>

		</div>
	<div class="col-sm-6">
		<div class="container">
			<form action="aksi_create.php" method="POST">
			<div class="col-sm-10">
			<div>&nbsp;</div>
			<div>&nbsp;</div>
			<div>&nbsp;</div>
				<table class="table table-bordered">
					<tr>
						<td>Nama Penerbit</td>
						<td>:</td>
						<td><input class="form-control" type="text" name="nama"></input></td>
					</tr>
					<tr>
						<td>Alamat Penerbit</td>
						<td>:</td>
						<td><input class="form-control" type="text" name="alamat"></input></td>
					</tr>
					<tr>
						<td>Latitude</td>
						<td>:</td>
						<td><input class="form-control" type="text" name="lat"></input></td>
					</tr>
					<tr>
						<td>Longitude</td>
						<td>:</td>
						<td><input class="form-control" type="text" name="lng"></input></td>
					</tr>
					<tr>
						<td>Tahun Penerbitan</td>
						<td>:</td>
						<td><input class="form-control" type="text" name="tahun_terbit"></input></td>
					</tr>
					<tr>
						<td colspan="2"><input class="btn btn-primary" type="submit" name="submit" value="Simpan"></input></td>
					</tr>
				</table>
			</form>
			<div>
				<a  href="index.php"><h4>Daftar Penerbit</h4></a>
			</div>
		</div>
	</div>
	</div>
</body>	