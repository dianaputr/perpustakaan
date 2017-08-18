<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script> 
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">

<?php

$id = $_GET['id']; 

include('koneksi.php');

$query = $db->prepare("SELECT * FROM peminjaman WHERE id = $id");
$query->bindValue(':id', $_GET['id']);
$query->execute();
$data = $query->fetch();

$query = $db->prepare("SELECT * FROM buku");
$query->execute();
$buku = $query->fetchAll();

function getBuku($id) {
	include('koneksi.php');
	$query = $db->prepare("SELECT * FROM buku WHERE id = " . $id);
	$query->bindValue(':id', $_GET['id']);
	$query->execute();
	$buku = $query->fetchAll();

}


?>
<body>
<div class="panel panel-primary">
			<div class="panel-heading"><h1>UPDATE PEMINJAMAN</h1>
			</div>
</div>
	<div class="row">
	<div class="col-sm-3">
		<?php include('../home.php'); ?>

	</div>
	<div class="col-sm-6">
		<div class="container">
		</div>
		<form action="aksi_update.php?id=<?php print $id; ?>" method="POST">
		
			<div>&nbsp;</div>
			<div>&nbsp;</div>
			<div>&nbsp;</div>
			<table class="table table-border">
			<tr>
					<td>Nama Buku</td>
					<td>:</td>
					<td><select class="form-control" name="id_buku">
					<?php $i=1; foreach ($buku as $value): ?> 
					<option value="<?= $value['id']; ?>"><?= $value['nama']; ?></option>
					<?php $i++; endforeach; ?> </select></input></td>
				</tr>
				<tr>
					<td>Nama User</td>
					<td>:</td>
					<td><input class="form-control"  type="text" name="id_user"  value="<?= $data['id_user']; ?>"></input></td>
				</tr>
				<tr>
					<td>Waktu Peminjaman</td>
					<td>:</td>
					<td><input class="form-control" name="waktu_dipinjam" readonly value="<?= $data['waktu_dipinjam']; ?>"></input></td>
				</tr>
				<tr>
					<td>Waktu Pengembalian</td>
					<td>:</td>
					<td><input class="form-control"  type="date" name="waktu_pengembalian" readonly value="<?= $data['waktu_pengembalian']; ?>"></input></td>
				</tr>
				<tr>
				<td colspan="2"><input class="btn btn-primary" type="submit" name="submit" value="Simpan"></input></td>
			</tr>
			</table>
		</form>
		<div>
				<a href="index.php"><h4>Daftar Peminjaman</h4></a>
		</div>
	</div>
	</div>
</body>