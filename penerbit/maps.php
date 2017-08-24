<!DOCTYPE html>
<header><title>Maps Penerbit Buku</title></header> 

<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../bootstrap/css/dataTables.bootstrap.css">
   <script type="text/javascript" src="../bootstrap/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../bootstrap/js/dataTables.bootstrap.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css"> 
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbkig6HjyecypiKEExAwT3f69fJBvLXk0&sensor=false" type="text/javascript"></script>
    <script>
    function initialize(a,b,c,d) {
  var myLatlng = new google.maps.LatLng(a, b);
  var mapOptions = {
    zoom: 15,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    title: d});
}
    </script>
<style>
      html, body, #map-canvas {
        
        height: 90%;
        padding: 5px;
        
      }
    </style>
<body>
<div class="panel panel-primary">
      <div class="panel-heading"><h1>Maps Penerbit Buku</h1>
      </div>
      <div class="panel-body">
        <a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-list "></i> Daftar Penerbit</a>
  </div>
  <div class="row">
  <div class="col-sm-4">
 <table class="table table-bordered table-stripped table-hover">
  <thead>
  <tr>
   <th>No</th><th>Nama</th><th>Latitude</th><th>Longitude</th><th>Tool</th>
   </tr>
  </thead>
  <tbody>

   

<?php
include 'koneksi.php';

$query = $db->prepare("SELECT * FROM penerbit");
$query->execute();
$i=1;
foreach ($query->fetchAll() as $data) {

 $no = $i;
 $nama = $data['nama'];
 $alamat = $data['alamat'];
 $lat = $data['lat'];
 $lng = $data['lng'];
 echo "<tr><td>$no</td><td>$nama</td><td>$lat</td><td>$lng</td><td><button onclick='initialize($lat,$lng,\"$nama\",\"$alamat\")' class='btn btn-primary'><i class='glyphicon glyphicon-map-marker'></i> Maps</button></td></tr>";

 $i++;
}


?>

  </tbody>
 </table>
 </div>
 <div class="col-sm-8">
 <div id='map-canvas' style="width: 825px; height: 375px;"></div>
 </div>
 </div>
 </div>
 </div>
</body>
