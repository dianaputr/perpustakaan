 <html>  
  <head>  
  <title></title>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../bootstrap/css/dataTables.bootstrap.css">
   <script type="text/javascript" src="../bootstrap/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../bootstrap/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../bootstrap/js/dataTables.bootstrap.js"></script>
<link rel="stylesheet" href="../bootstrap/css/style.css">  
 </head>  
   <body>  
   <div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <center><h4>PETA LOKASI PENERBIT</h4></center>
        </div>
        <div class="panel-body">
        <a href="index.php" class="btn btn-warning">Daftar Penerbit</a>&nbsp<button class="btn btn-danger" onclick="location.reload()">Refresh Maps</button></br>
        </br> 
        <div id="map_canvas" style="width:100%; height:70%;">  
    </div> 
        </div>
    </div>
  </div>
</div>
 
  </body>  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbkig6HjyecypiKEExAwT3f69fJBvLXk0&sensor=false" type="text/javascript"></script>
  <script type="text/javascript">  
  var infowindow = null;  
  (function() {  // fungsi untuk dijalankan ketika halaman web dubuka  
     
      
   initialize(); // mengeksekusi fungsi initialize()  
     
  })();  
      
    
    function initialize() {  
        // Baris berikut digunakan untuk mengisi marker atau tanda titik di peta  
        var sites = [  
    
         ['Balai Pustaka', -6.148514, 106.834845 ,1, '<h4>Balai Pustaka</h4><p>Jl. Gunung Sahari Raya No.4 Jakarta</p>'], // pertama merupakan judul market, kedua adalah titik koordinan latitude, ketiga longitude, dan keempat merupakan z index (titik mana yang ditampilkan lebih dulu) untuk menentukan titik mana diatas titik mana, ketiga merupakan isi keterangan marker nya.  
         ['Grasindo', -6.211191,106.795356 ,2, '<h4>Grasindo</h4><p>Jl. Palmerah Selatan 22Jakarta</p>'],  
    
        ];  
        var centerMap = new google.maps.LatLng(-6.148514, 106.834845); // mengatur pusat peta  
          
        var myOptions = {  
          zoom: 13, // level zoom peta  
          center: centerMap, // setting pusat peta ke centerMap  
          mapTypeId: google.maps.MapTypeId.ROADMAP //menentukan tipe peta  
        }  
    
        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); //menempatkan peta pada div gan ID map_canvas di html  
    
        setMarkers(map, sites); // memanggil fungsi setMarker untuk menandai titik di peta.  
        setAction(map); //tambahan dari tutorial 2 untuk memanggil fungsi setAction(map);  
        infowindow = new google.maps.InfoWindow({  
            content: "loading..."  
          });  
    
        var bikeLayer = new google.maps.BicyclingLayer();  
        bikeLayer.setMap(map); //memnunculkan peta  
       
   }  
    
        
    
    
  function setMarkers(map, markers) {  
         //berikut merupakan perulangan untuk membaca masing masing titik yang telah kita definisikan di sites[];  
        for (var i = 0; i < markers.length; i++) {  
          var sites = markers[i];  
          var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);  
          var marker = new google.maps.Marker({  
            position: siteLatLng,  
            map: map,  
            title: sites[0],  
            zIndex: sites[3],  
         html: sites[4]  
 
          });  
    
          var contentString = "Some content";  
          // berikut merupakan fungsi untuk mengatur agar keterangan marker muncuk ketika mouse diarahkan ke marker (sver)  
          google.maps.event.addListener(marker, "mouseover", function () {  
              
            infowindow.setContent(this.html);  
            infowindow.open(map, this);  
          });  
        }  
      }  
    
      //-----------------------------------Tambahan1 dari tutorial 2 -----------------------------------------------  
 
     function setAction(map){  
            
          google.maps.event.addListener(map, "rightclick", function(event) {  
    
          if(confirm("Tandai Titik Ini? (klik pada tanda yang muncul untuk melihat pilihan)")){  
                 var lat = event.latLng.lat();  
            var lng = event.latLng.lng();  
              
            var siteLatLng = new google.maps.LatLng(lat, lng);  
            var marker = new google.maps.Marker({  
                position: siteLatLng,  
                map: map,  
               title: "add data",  
                zIndex: 100,  
                html: "ddd"  
    
              });           
                  google.maps.event.addListener(marker, "mouseover", function () {                    
                infowindow.setContent(this.html);  
                infowindow.open(map, this);  
              });  
    
          }              
        });  
        }  
    
      //-----------------------------------akhir tambahan1 dari tutorial------------------------------------------  
    
    
  </script>  
  </html>  