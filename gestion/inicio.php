<?php 
include (__DIR__.'/vistas/header.php');
require_once(__DIR__."/sistema.clase.php");
//CONSULTAS PARA LEVEL
$consultas = new Sistema();
$usuarios=$consultas->query("SELECT count(*) as usuarios from usuarios;")[0]['usuarios'];
$veterinarios=$consultas->query("SELECT count(*) as veterinarios from veterinarios;")[0]['veterinarios'];
$mascotas=$consultas->query("SELECT count(*) as mascotas from mascotas;")[0]['mascotas'];
$citas=$consultas->query("SELECT count(*) as citas from citas ;")[0]['citas'];
?>
<nav class="level">
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Usuarios Activos</p>
      <p class="title"><?php echo $usuarios;?></p>
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
 <nav class="navbar">
  <div class="container">
    <div id="navMenu" class="navbar-menu">


      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <a class="button is-dark">Mostrar Marcas</a>
            <a class="button is-link">Mostrar Productos</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

<section class="hero is-link is-fullheight-with-navbar">
  <div class="hero-body">
    <p class="title">BIENVENIDO ADMINISTRADOR</p>
  </div>
</section>
<?php
include (__DIR__.'/vistas/footer.php');
?>