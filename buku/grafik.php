<html>
 <head>

<?php



function getGrafik()
{
  $data = null;
    include('koneksi.php');
      $query = $db->prepare("SELECT * FROM penulis");
      $query->execute();

      $i=1; foreach ($query->fetchAll() as $value){
        $nama = $value['nama'];

          function getJumlah($id) {
               include('koneksi.php');
              $query = $db->prepare("SELECT count(id) FROM buku WHERE id_penulis = $id");
              $query->execute();
            return $query->fetchColumn();
  

                }

        foreach ($sql_jumlah->fetchAll() as $value) {
          $jumlah = getJumlah($value['id']);
        }

        $data .= "{ name : '".$nama."', data: [".$jumlah."] },";
      }  

    return $data;
}

?>


<script src="Highcharts/code/js/jquery.min.js" type="text/javascript"></script>
<script src="Highcharts/code/js/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
 var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Penulis'
         },
         xAxis: {
            categories: ['nama']
         },
         yAxis: {
            title: {
               text: 'Jumlah penulis'
            }
         },
              series:             
            [
              <?= getGrafik(); ?>
            ]
      });
   }); 
</script>
 </head>
 <body>
  <div id='container'></div>  

  <?= getGrafik(); ?>
 </body>
</html>

