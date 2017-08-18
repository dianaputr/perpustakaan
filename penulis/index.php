<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script> 
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">


<?php

include('koneksi.php');

/*CONTOH SELECT * FROM*/
$query = $db->prepare("SELECT * FROM penulis");
/*$query = $db->prepare("DELETE FROM buku WHERE id=90");
$query = $db->prepare("INSERT INTO buku ('nama, id_jenis') VALUES ('tes1','jenis1') ");
$query = $db->prepare("SELECT * FROM buku WHERE id = 90");
$query = $db->prepare("UPDATE buku SET nama = 'naon' WHERE id = 90");*/

/*EKSEKUSI*/
$query->execute();

/*IF MANY SELECT*/
function getJenis($id) {
	include ('koneksi.php');
	$query = $db->prepare("SELECT * FROM jenis_kelamin WHERE id = $id");
	$query->execute();
	$data = $query->fetch();

	return $data['nama'];
}

function getJumlah($id) {
	include('koneksi.php');
	$query = $db->prepare("SELECT count(id) FROM buku WHERE id_penulis = $id");
	$query->execute();
	return $query->fetchColumn();
	

}
/*$query->fetchAll();

/*IF JUST 1 SELECT */
/*$query->fetch();*/

?>

<body>
<div class="panel panel-primary">
	<div class="panel-heading"><h1>DAFTAR PENULIS BUKU</h1></div>
</div>

<div class="row">
	<div class="col-sm-3">
		<?php include('../home.php'); ?>

	</div>
	<div class="col-sm-6">
		<div class="container">
			 <div class="panel-body">
			    <a href="create.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus "></i> Tambah Penulis Buku</a>
			    <a class="btn btn-primary" href="../home2.php"><i class="glyphicon glyphicon-home"></i> Home </a>
			    <a class="btn btn-primary" href="grafik.php"><i class="glyphicon glyphicon-info-sign"></i> Grafik Penulis </a>
			    <div>&nbsp;</div>
			    <div class="col-sm-10">
				<table class="table table-bordered table-stripped table-hover">
				<thead>
				<tbody>
				<tr>
					<th>No</th>
					<th>Nama </th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Jumlah</th>
					<th>Aksi</th>
				</tr>
				<?php $i=1; foreach ($query->fetchAll() as $value): ?> 
				<tr>
					<td style="text-align: center"><?= $i ?></td>
					<td><?= $value['nama'] ?></td>
					<td><?= getJenis($value['id_jenis_kelamin']); ?></td>
					<td><?= $value['alamat'] ?></td>
					<td><?= getJumlah($value['id']) ?></td>
					<td>
						<a href="update.php?id=<?= $value['id'] ;?>">
						<span class="glyphicon glyphicon-pencil"></span></a>
						<a href="delete.php?id=<?= $value['id']; ?>">
						<span class="glyphicon glyphicon-trash"></span></a>
						<a href="view.php?id=<?= $value['id']; ?>">
						<span class="glyphicon glyphicon-list"></span></a>

					</td>
				</tr>
				<?php $i++; endforeach; ?>
				</tbody>
				</thead>
				</table>
			</div>
			</div>
		</div>		
	</div>
</div>
</body>