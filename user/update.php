<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

if ($_SESSION['role'] == 1) {
 	# code...
 ?>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/jquery-1.12.0.min.js"></script> 
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">


<?php

$id = $_GET['id']; 

include('koneksi.php');

$query = $db->prepare("SELECT * FROM user WHERE id = $id");
$query->execute();
$data = $query->fetch();

?>

<body>
<div class="panel panel-primary">
			<div class="panel-heading"><h1>UPDATE USER</h1>
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
					<td>Nama</td>
					<td>:</td>
					<td><input class="form-control" type="text" name="nama" value="<?= $data['nama']; ?>"></input></td>
				</tr>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td><input class="form-control" type="text" name="username" value="<?= $data['username']; ?>"></input></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input class="form-control" type="text" name="password" value="<?= $data['password']; ?>"></input></td>
				</tr>
				<tr>
					<td>Role</td>
					<td>:</td>
					<td><select class="form-control" type="text" name="role" value="<?= $data['role']; ?>">
					<option>1</option>
					<option>2</option></select></td>
				</tr>
				<tr>
				<td colspan="2"><input class="btn btn-primary" type="submit" name="submit" value="Simpan"></input></td>
				</tr>
			</table>
		</form>
		<div>
				<a href="index.php"><h4>Daftar User</h4></a>
		</div>
	</div>
	</div>
</body>	

<?php } else {
	header('Location: ../index.php');
}
?>