<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestion</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
  <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
  <link rel="icon" href="../images/icon.png" type="image/x-icon">
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="/../quiron/inicio.php">
        <figure class="image is-64x64">
          <img src="../images/lowgo.png">
        </figure>
      </a>
      
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="true" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
    
    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="inicio.php">Inicio</a>
        <a class="navbar-item" href="citas.php">Citas</a>
        <a class="navbar-item" href="mascotas.php" >Mascotas</a>
        
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">Más</a>
          <div class="navbar-dropdown">
            <a class="navbar-item" href="productos.php">
              Productos
            </a>
            <a class="navbar-item" href="usuarios.php">
              Usuarios
            </a>
            <a class="navbar-item" href="marcas.php">
              Marcas
            </a>
            <a class="navbar-item" href="categorias.php">
              Categorías
            </a>
            <hr class="navbar-divider">
            
          </div>
        </div>
        
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">RyP</a>
          <div class="navbar-dropdown">
            <a class="navbar-item" href="privilegios.php">
              Privilegios
            </a>
            <a class="navbar-item" href="roles.php">
              Roles
            </a>
          </div>
        </div>
        
        
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">Personal</a>
          <div class="navbar-dropdown">
            <a class="navbar-item" href="veterinarios.php">
              Veterinarios
            </a>
            <a class="navbar-item" href="peluqueros.php">
              Peluqueros
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a href="login.php?action=logout" class="button is-warning">
            <strong>Cambiar Sesión</strong>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
</head>

