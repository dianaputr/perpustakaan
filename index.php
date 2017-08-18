<?php
session_start();

ini_set('display_errors', 1);

include 'koneksi.php';


if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = $db->prepare("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

	$query->execute();
	$count = $query->fetchColumn();

	if ($count != false) {

		$query->execute();
		$user = $query->fetch();/*$user sebagai nama tabel*/


		$_SESSION['username'] = $user['username'];
		$_SESSION['role'] = $user['role'];
		$_SESSION['id_user'] = $user['id'];
		$_SESSION['user'] = $user['nama'];
		header('location: home2.php');
	} else {
		echo "<script>alert('Your Account Invalid')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
     <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/jquery-1.12.0.min.js"></script> 
	<link rel="stylesheet" href="bootstrap/css/style.css">

</head>
<body>
<div class="row">
<div class="container">
<div class="col-sm-6">
	<form method="POST">
		<div class="form">
			<h2 style="text-align: center;"><b>Login User</b><hr width="50%"></h2>
				<div class="form-group">
					<label for="usr">Username:</label>
					<input type="text" class="form-control" name="username" placeholder="Username" required></input>
						</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" name="password" placeholder="Password" required></input>
						</div>	
						<button class="btn btn btn-info" name="login">Login
						</button>	
				</div>
			</div>	
		</div>
	</form>	
</div>
</div>
</body>