<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script> 
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">


<?php

include('koneksi.php');

/*CONTOH SELECT * FROM*/
$query = $db->prepare("SELECT * FROM penerbit");
/*$query = $db->prepare("DELETE FROM buku WHERE id=90");
$query = $db->prepare("INSERT INTO buku ('nama, id_jenis') VALUES ('tes1','jenis1') ");
$query = $db->prepare("SELECT * FROM buku WHERE id = 90");
$query = $db->prepare("UPDATE buku SET nama = 'naon' WHERE id = 90");*/

/*EKSEKUSI*/
$query->execute();

/*IF MANY SELECT*/
/*$query->fetchAll();

/*IF JUST 1 SELECT */
/*$query->fetch();*/

?>

<body>
<div class="panel panel-primary">
	<div class="panel-heading"><h1>DAFTAR PENERBIT BUKU</h1></div>
</div>

<div class="row">
	<div class="col-sm-3">
		<?php include('../home.php'); ?>

	</div>
	<div class="col-sm-6">
		<div class="container">
			 <div class="panel-body">
			    <a href="create.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus "></i> Tambah Penerbit Buku</a>
			    <a class="btn btn-primary" href="../home2.php"><i class="glyphicon glyphicon-home"></i> Home </a>
			    <a class="btn btn-primary" href="map.php"><i class="glyphicon glyphicon-map-marker"></i> Lihat Maps </a>
			    <div>&nbsp;</div>
			    <div class="col-sm-10">
				<table class="table table-bordered table-stripped table-hover">
				<thead>
				<tbody>
				<tr>
					<th>No</th>
					<th>Nama Penerbit</th>
					<th>Alamat Penerbit</th>
					<th>Latitude</th>
					<th>Longitude</th>
					<th>Tahun Penerbitan</th>
					<th>Aksi</th>
				</tr>
				<?php $i=1; foreach ($query->fetchAll() as $value): ?> 
				<tr>
					<td style="text-align: center"><?= $i ?></td>
					<td><?= $value['nama'] ?></td>
					<td><?= $value['alamat'] ?></td>
					<td><?= $value['lat'] ?></td>
					<td><?= $value['lng'] ?></td>
					<td><?= $value['tahun_terbit'] ?></td>
					<td>
					<?php session_start();
								if($_SESSION['role'] == 1){ ?>
									<a href="update.php?id=<?= $value['id'] ;?>">
									<span class="glyphicon glyphicon-pencil"></span>
									</a>
									<a href="delete.php?id=<?= $value['id']; ?>">
									<span class="glyphicon glyphicon-trash"></span></a>
									<a href="view.php?id=<?= $value['id']; ?>">
									<span class="glyphicon glyphicon-list"></span></a>
									<?php } elseif ($_SESSION['role'] == 2) { ?>
									<a href="view.php?id=<?= $value['id']; ?>">
									<span class="glyphicon glyphicon-list"></span></a>
								<?php } ?>
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