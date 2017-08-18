<?php 
session_start();

include('koneksi.php');
$query = $db->prepare("SELECT * FROM buku");
$query->execute();

function getBuku($id) {
	include ('koneksi.php');
	$query = $db->prepare("SELECT * FROM buku WHERE id = $id");
	/*$query->bindValue(':id', $_GET['id']);*/
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

			<div class="panel-heading"><h1>TAMBAH PEMINJAMAN</h1>
			</div>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<?php include('../home.php'); ?>

		</div>
	<div class="col-sm-6">
		<div class="container">
			<form action="aksi_create.php" method="POST">
			<input type="hidden" name="id_buku" value="<?= $_GET['id'] ?>"></input>
			<input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>"></input>
			<div class="col-sm-10">
			<div>&nbsp;</div>
			<div>&nbsp;</div>
			<div>&nbsp;</div>
				<table class="table table-bordered">
					<tr>
						<td>Nama Buku</td>
						<td>:</td>
						<td><input class="form-control" type="text" name="nama_buku" value="<?= getBuku($_GET['id']); ?>">
						</td>
					</tr>
					<tr>
						<td>Nama User</td>
						<td>:</td>
						<td><input class="form-control" type="text" name="username" readonly value="<?= $_SESSION['username']; ?>"></input></td>
					</tr>
					<tr>
						<td>Waktu Peminjaman</td>
						<td>:</td>
						<td><input class="form-control" name="waktu_dipinjam" readonly value="<?php print date("m/d/Y"); ?>"></input></td>
					</tr>
					<tr>
						<td>Waktu Pengembalian</td>
						<td>:</td>
						<td><input class="form-control" name="waktu_pengembalian" readonly value="<?php print date("m/d/Y", strtotime('+1 week')); ?>"></input></td>
					</tr>		
					<tr>
						<td colspan="2"><input class="btn btn-primary" type="submit" name="submit" value="Simpan"></input></td>
					</tr>
				</table>
			</form>
			<div>
				<a  href="index.php"><h4>Daftar Peminjaman</h4></a>
			</div>
		</div>
	</div>
	</div>
</body>	