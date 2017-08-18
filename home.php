<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

if (isset($_SESSION['username'])) {
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
  <h3>APLIKASI PERPUSTAKAAN</h3>
  <div class="row">
    <div class="col-md-3">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#">Menu Aplikasi Perpustakaan</a></li>
        <?php if($_SESSION['role'] == 1){ ?>
        <li><a href="http://localhost/ppi-perpustakaan/buku/index.php">Buku</a></li>
        <li><a href="http://localhost/ppi-perpustakaan/jenis/index.php">Jenis</a></li>
        <li><a href="http://localhost/ppi-perpustakaan/jenis_kelamin/index.php">Jenis Kelamin</a></li>
        <li><a href="http://localhost/ppi-perpustakaan/peminjaman/index.php">Peminjaman</a></li>
        <li><a href="http://localhost/ppi-perpustakaan/penerbit/index.php">Penerbit</a></li>
        <li><a href="http://localhost/ppi-perpustakaan/penulis/index.php">Penulis</a></li>
        <li><a href="http://localhost/ppi-perpustakaan/user/index.php">User</a></li>
      </ul>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="http://localhost/ppi-perpustakaan/logout.php"><span class="glyphicon glyphicon-log-out"></span> Menu Logout</a></li></ul>

      <?php } elseif($_SESSION['role'] == 2){ ?>

        <li><a href="http://localhost/ppi-perpustakaan/buku/index.php">Buku</a></li>
        <li><a href="http://localhost/ppi-perpustakaan/peminjaman/index.php">Peminjaman</a></li>
        <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="http://localhost/ppi-perpustakaan/logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li></ul>
        <?php } ?>
    </div>
  </div>
</div>
 <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/jquery-1.12.0.min.js"></script>  
</body>
</html>

<?php 

print_r($_SESSION);

?>

<?php } else {
  session_destroy();

  if (basename(__FILE__) == 'home.php') {
    header('location: index.php');

  } else{
    header('location: ../../../index.php');
  }
}
?>