<?php 

include('koneksi.php');
$query = $db->prepare("SELECT * FROM jenis");
$query->execute();
$jenis = $query->fetchAll();

$query = $db->prepare("SELECT * FROM penulis");
$query->execute();
$penulis = $query->fetchAll();

?>

<html>
<head>
	<title>Menu Buku</title>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">
</head>
<body>
	<div class="panel panel-primary">
			<div class="panel-heading"><h1>TAMBAH BUKU</h1>
			</div>
	</div>
	<div class="row">
	<div class="col-sm-3">
		<?php include('../home.php'); ?>
	</div>
	<div class="col-sm-6">
		<div class="container">
				<form enctype="multipart/form-data" action="aksi_create.php" method="POST">
				<div class="col-sm-10">
						<div>&nbsp;</div>
						<div>&nbsp;</div>
						<div>&nbsp;</div>
					<table class="table table-border">
					<thead>
					<tbody>
						<tr>
							<td>Nama Buku</td>
							<td>:</td>
							<td><input class="form-control" type="text" name="nama" required></input></td>
						</tr>
						<tr>
							<td>Jenis Buku</td>
							<td>:</td>
							<td>
								<select name="id_jenis" class="form-control">
									<?php $i=1; foreach ($jenis as $value): ?> 
										<option value="<?= $value['id']; ?>"><?= $value['nama']; ?></option>
									<?php $i++; endforeach; ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Penulis Buku</td>
							<td>:</td>
							<td>
							<select class="form-control" name="id_penulis"> 	
								<?php $i=1; foreach ($penulis as $value): ?> 
									<option value="<?= $value['id']; ?>"><?= $value['nama']; ?></option>
								<?php $i++; endforeach; ?>
							</select>
							</td>
						</tr>
						<tr>
							<td>Cover Buku</td>
							<td>:</td>
							<td><input class="form-control" type="file" name="cover"></input></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" class="btn btn-primary" name="submit" value="Simpan"></input></td>
						</tr>
						</tbody>
						</thead>
						</div>
					</table>
					
				</form>
					<div>
						<a  href="index.php"><h4>Daftar Buku</h4></a>

					</div>	
			</div>		
		</div>
	</div>
</div>					

