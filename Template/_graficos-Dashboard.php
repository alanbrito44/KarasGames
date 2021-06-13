<?php
$conexion = new mysqli("localhost","root","","karsagame");
$sql = "SELECT juego_nombre, juego_precio FROM productos ORDER BY juego_precio DESC LIMIT 5;";
$res = $conexion->query($sql);
?>
<html>
  <head> <center>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Nombre del Juego', 'Precio Del Juego'],
          <?php
            while ($fila = $res->fetch_assoc()) {
             echo "['".$fila["juego_nombre"]."',".$fila["juego_precio"]."],";
            }

          ?>
        ]);

        var options = {
          title: 'Juegos de Mayor Precio',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script></center>
  </head>
  <body>
    <div id="piechart_3d" style="width: 1500px; height: 900px; margin: 0 auto;"></div>
  </body>
</html>

<?php
$conexion = new mysqli("localhost","root","","karsagame");
$sql = "SELECT juego_nombre, juego_precio FROM productos ORDER BY juego_precio asc LIMIT 5;";
$res = $conexion->query($sql);
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Nombre del Juego', 'Precio Del Juego'],
          <?php
            while ($fila = $res->fetch_assoc()) {
             echo "['".$fila["juego_nombre"]."',".$fila["juego_precio"]."],";
            }

          ?>
        ]);

        var options = {
          title: 'Juegos de Menor Precio',
          legend: 'none',
          pieSliceText: 'label',
          slices: {  4: {offset: 0.2},
                    12: {offset: 0.3},
                    14: {offset: 0.4},
                    15: {offset: 0.5},
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 1500px; height: 900px; margin: 0 auto;"></div>
  </body>
</html>


