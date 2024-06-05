<!DOCTYPE html>
<html lang="en-us">
<head>
   <meta charset="utf-8">
   <title>Quirón Veterinaria</title>
<?php 
include __DIR__."/gestion/sistema.clase.php";
?>
   <!-- mobile responsive meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
   <meta name="description" content="This is meta description">
   <meta name="author" content="Themefisher">

   <!-- plugins -->
   <link rel="preload" href="https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2" style="font-display: optional;">
   <link rel="stylesheet" href="plugins/bulma/bulma.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:600%7cOpen&#43;Sans&amp;display=swap" media="screen">

   <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
   <link rel="stylesheet" href="plugins/slick/slick.css">

   <!-- Main Stylesheet -->
   <link rel="stylesheet" href="css/styles.css">

   <!--Favicon-->
   <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
   <link rel="icon" href="images/icon.png" type="image/x-icon">
</head>

<body>
<!-- navigation -->
<header class="is-sticky-top bg-white border-bottom border-default">
   <div class="container">

      <nav class="navigation navbar is-white">
         <a class="navbar-brand is-inline-flex ml-0 is-align-items-center" href="inicio.php">
            <img src="images/lowgo.png" alt="logo" width="150" height="100">
         </a>
         <button role="button" class="navbar-burger burger" data-hidden="true" data-target="navigation">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
         </button>

         <ul class="navbar-end navbar-menu" id="navigation">
            <li class="navbar-item has-dropdown is-hoverable has-active">
               <a class="navbar-link">Navegacion <small class="ti-angle-down ml-1"></small></a>
               <div class="navbar-dropdown">
                  <a class="navbar-item" href="inicio.php">Inicio</a>
                  <a class="navbar-item" href="productos.php">Productos</a>
               </div>
            </li>
                
            <li class="navbar-item">
               <a class="navbar-link is-arrowless" href="about.php">Nosotros</a>
            </li>
            <li class="navbar-item">
               <a class="navbar-link is-arrowless" href="cart.php">Carrito</a>
            </li>
                
            <li class="navbar-item has-dropdown is-hoverable has-active">
               <a class="navbar-link">Perfil <small class="ti-angle-down ml-1"></small></a>
               <div class="navbar-dropdown">
                  <?php if (isset($_SESSION['validado'])): ?>
                  <a class="navbar-item" href="perfil.php">Perfil</a>
                      <a class="navbar-item" href="login.php?action=logout">Cerrar Sesión</a>
                  <?php else: ?>
                      <a class="navbar-item" href="login.php">Iniciar Sesión</a>
                      <a class="navbar-item" href="login.php?action=register">Registrate</a>
                  <?php endif; ?>
                  <a class="navbar-item" href="citas.php">Agendar una cita</a>
               </div>
            </li>

            <li class="navbar-item">
               <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
            </li>

            <!-- search -->
            <div class="search">
               <div class="search-wrapper">
                  <form action="javascript:void(0)" class="h-100">
                     <input class="search-box pl-4" id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                  </form>
                  <button id="searchClose" class="search-close"><i class="ti-close text-dark"></i></button>
               </div>
            </div>
         </ul>
      </nav>
   </div>
</header>

