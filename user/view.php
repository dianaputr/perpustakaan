<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">


<?php

include ('koneksi.php');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM user WHERE id = $id");
$query->execute();
$data = $query->fetch();

?>

<body>
<div class="panel panel-primary">
			<div class="panel-heading"><h1>RINCIAN PENULIS</h1>
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
						<td>Nama</td>
						<td>:</td>
						<td><?php print $data['nama']; ?></td>
					</tr>
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><?php print $data['username']; ?></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><?php print $data['password']; ?></td>
					</tr>
					<tr>
						<td>Role</td>
						<td>:</td>
						<td><?php print $data['role']; ?></td>
					</tr>
				</table>
				<div>
				<a  href="index.php"><h4>Daftar User</h4></a>
				</div>
	</div>
	</div>
</body>	