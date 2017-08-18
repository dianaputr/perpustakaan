<?php 

include('koneksi.php');
$query = $db->prepare("SELECT * FROM jenis_kelamin");
$query->execute();

?>

<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script> 
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">

<body>
	<div class="panel panel-primary">
			<div class="panel-heading"><h1>TAMBAH PENULIS</h1>
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
						<td>Nama</td>
						<td>:</td>
						<td><input class="form-control" type="text" name="nama"></input></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>
								<select name="id_jenis_kelamin" class="form-control">
									<?php $i=1; foreach ($query->fetchAll() as $value): ?> 
										<option value="<?= $value['id']; ?>"><?= $value['nama']; ?></option>
									<?php $i++; endforeach; ?>
								</select>
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><input class="form-control" type="text" name="alamat"></input></td>
					</tr>
					<tr>
						<td colspan="2"><input class="btn btn-primary" type="submit" name="submit" value="Simpan"></input></td>
					</tr>
				</table>
			</form>
			<div>
				<a  href="index.php"><h4>Daftar Penulis</h4></a>
			</div>
		</div>
	</div>
	</div>
</body>	