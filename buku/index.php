<?php

include('koneksi.php');

/*CONTOH SELECT * FROM*/
$query = $db->prepare("SELECT * FROM buku");
/*$query = $db->prepare("DELETE FROM buku WHERE id=90");
$query = $db->prepare("INSERT INTO buku ('nama, id_jenis') VALUES ('tes1','jenis1') ");
$query = $db->prepare("SELECT * FROM buku WHERE id = 90");
$query = $db->prepare("UPDATE buku SET nama = 'naon' WHERE id = 90");*/

/*EKSEKUSI*/
$query->execute();

function getJenis($id) {
	include ('koneksi.php');
	$query = $db->prepare("SELECT * FROM jenis WHERE id = $id");
	$query->execute();
	$data = $query->fetch();

	return $data['nama'];
}

function getPenulis($id) {
	include ('koneksi.php');
	$query = $db->prepare("SELECT * FROM penulis WHERE id = $id");
	$query->execute();
	$penulis = $query->fetch();

	return $penulis['nama'];
}
/*IF MANY SELECT*/
/*$query->fetchAll();

/*IF JUST 1 SELECT */
/*$query->fetch();*/

?>

<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script>  
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">
<body>
<div class="panel panel-primary">
	<div class="panel-heading"><h1>DAFTAR BUKU</h1></div>
</div>

<div class="row">
	<div class="col-sm-3">
		<?php include('../home.php'); ?>
	</div>
	<div class="col-sm-6">
			<div class="container">
			 
			 <div class="panel-body">
			 <?php session_start();
			  if($_SESSION['role'] == 1){ ?>
			    <a href="create.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus "></i> Tambah Buku</a>
			    <?php } ?>
				<a class="btn btn-primary" href="../home2.php"><i class="glyphicon glyphicon-home"></i> Home </a>
				<a class="btn btn-primary" href="exportfile.php"><i class="glyphicon glyphicon-download-alt"></i> Export Excel</a>
				<a class="btn btn-primary" href="mpdf.php"><i class="glyphicon glyphicon-download-alt"></i> Export PDF</a>
				<a class="btn btn-primary" href="exportword.php"><i class="glyphicon glyphicon-download-alt"></i> Export Word</a>
			    <div>&nbsp;</div>
			    <div class="col-sm-10">
			    
					<table class="table table-bordered table-stripped table-hover">
							<tr>
							<thead>
								<th>No</th>
								<th>Nama Buku</th>
								<th>Jenis Buku</th>
								<th>Penulis Buku</th>
								<th>Cover</th>
								<th>Aksi</th>
							</thead>
							</tr>
							<?php $i=1; foreach ($query->fetchAll() as $value): ?> 
							<tbody>
							<tr>
								<td style="text-align: center"><?= $i ?></td>
								<td><?= $value['nama'] ?></td>
								<td><?= getJenis($value['id_jenis']); ?></td>
								<td><?= getPenulis($value['id_penulis']); ?></td>
								<td><img width="100px" src="cover/<?= $value['cover'] ?>"></td>
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
									<a href="../peminjaman/create.php?id=<?= $value['id']; ?>">
									<span class="glyphicon glyphicon-book"></span></a>
								<?php } ?>
								</td>
							</tr>
						<?php $i++; endforeach; ?>
						</tbody>					
						</table>
				</div>
				</div>
				</div>
		</div>
	</div>
</div>
</body>
