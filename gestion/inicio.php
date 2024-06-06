<?php 
include (__DIR__.'/vistas/header.php');
require_once(__DIR__."/sistema.clase.php");

// CONSULTAS PARA LEVEL
$consultas = new Sistema();
$usuarios = $consultas->query("SELECT count(*) as usuarios from usuarios;")[0]['usuarios'];
$veterinarios = $consultas->query("SELECT count(*) as veterinarios from veterinarios;")[0]['veterinarios'];
$mascotas = $consultas->query("SELECT count(*) as mascotas from mascotas;")[0]['mascotas'];
$citas = $consultas->query("SELECT count(*) as citas from citas ;")[0]['citas'];
$consultas->checkPrivilegio('Productos', true);
$datos = $consultas->query("select m.marca, sum(vd.cantidad * p.precio) as monto from marcas m join productos p on m.id_marca = p.id_marca join venta_detalle vd on p.id_producto = vd.id_producto group by 1 order by 1 asc;");

?>
<nav class="level">
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Usuarios Activos</p>
      <p class="title"><?php echo $usuarios; ?></p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Veterinarios</p>
      <p class="title"><?php echo $veterinarios; ?></p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Mascotas</p>
      <p class="title"><?php echo $mascotas; ?></p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Citas</p>
      <p class="title"><?php echo $citas; ?></p>
    </div>
  </div>
</nav>

<section class="hero is-link is-fullheight-with-navbar">
  <div class="hero-body">
    <p class="title">BIENVENIDO ADMINISTRADOR</p>
    <div id="barchart_values" style="width: 900px; height: 300px;"></div>
    <div id="dual_x_div" style="width: 900px; height: 300px;"></div>
  </div>
</section>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', { packages: ['corechart', 'bar'] });
  google.charts.setOnLoadCallback(drawCharts);

  function drawCharts() {
    //drawChart1();
    drawChart2();
  }

  function drawChart1() {
    var data = google.visualization.arrayToDataTable([
      ["Element", "Density", { role: "style" }],
      ["Copper", 8.94, "#b87333"],
      ["Silver", 10.49, "silver"],
      ["Gold", 19.30, "gold"],
      ["Platinum", 21.45, "color: #e5e4e2"]
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1, { calc: "stringify", sourceColumn: 1, type: "string", role: "annotation" }, 2]);

    var options = {
      title: "Density of Precious Metals, in g/cm^3",
      width: 600,
      height: 400,
      bar: { groupWidth: "95%" },
      legend: { position: "none" },
    };

    var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
    chart.draw(view, options);
  }

  function drawChart2() {
    var data = google.visualization.arrayToDataTable([
      ['Marca', 'Monto', { role: 'style' }],
      <?php 
      foreach ($datos as $dato) {
        echo "['" . $dato['marca'] . "', " . $dato['monto'] . ", 'gold'],";
      } 
      ?>
    ]);

    var options = {
      width: 900,
      chart: {
        title: 'Monto de ventas por marca',
        subtitle: 'Ventas por marca'
      },
      bars: 'horizontal',
      series: {
        0: { axis: 'distance' },
        1: { axis: 'brightness' }
      },
      axes: {
        x: {
          distance: { label: 'Pesos' },
          brightness: { side: 'top', label: 'apparent magnitude' }
        }
      }
    };

    var chart = new google.charts.Bar(document.getElementById('dual_x_div'));
    chart.draw(data, options);
  }
</script>

<?php
include (__DIR__.'/vistas/footer.php');
?>
