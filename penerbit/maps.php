<!DOCTYPE html>
<header><title>Maps DB</title></header> 

<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../bootstrap/css/dataTables.bootstrap.css">
   <script type="text/javascript" src="../bootstrap/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../bootstrap/js/dataTables.bootstrap.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css"> 
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbkig6HjyecypiKEExAwT3f69fJBvLXk0&sensor=false" type="text/javascript"></script>
    <script>
    function initialize(a,b,c) {
  var myLatlng = new google.maps.LatLng(a, b);
  var mapOptions = {
    zoom: 15,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    title:c});
}
    </script>
<style>
      html, body, #map-canvas {
        
        height: 90%;
        padding: 10px;
        
      }
    </style>
<body>
<div class="panel panel-primary">
      <div class="panel-heading"><h1>Maps DB</h1>
      </div>
  </div>
 <table border="2">
  <thead>
   <td>ID</td><td>Nama</td><td>Latitude</td><td>Longitude</td><td>Tool</td>
  </thead>
  <tbody>

   

<?php
include 'koneksi.php';
$query = $db->prepare("SELECT * FROM penerbit");
 $query->execute();
foreach ($query->fetchAll() as $data) {

 $id = $data['id'];
 $nama = $data['nama'];
 $lat = $data['lat'];
 $lng = $data['lng'];
 echo "<tr><td>$id</td><td>$nama</td><td>$lat</td><td>$lng</td><td><button onclick='initialize($lat,$lng,\"$nama\")'>Show in Map</button></td></tr>";
}
?>
  </tbody>
 </table>
 <div id='map-canvas'>
 </div>
</body>
