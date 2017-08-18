<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script> 
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">

<body>
	<div class="panel panel-primary">
			<div class="panel-heading"><h1>TAMBAH JENIS KELAMIN</h1>
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
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td><input class="form-control" type="text" name="nama"></input></td>
					</tr>
					<tr>
						<td colspan="0"><input class="btn btn-primary" type="submit" name="submit" value="Simpan"></input></td>
					</tr>
				</table>
			</form>
			<div>
				<a  href="index.php"><h4>Daftar Jenis Kelamin</h4></a>
			</div>
		</div>
	</div>
	</div>	
</body>
