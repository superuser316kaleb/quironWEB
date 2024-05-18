<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion</title>
    <script src="/../quiron/js/main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" href="/../quiron/css/login.css">
    <link rel="shortcut icon" href="../../../images/icon.png" type="image/x-icon">
    <link rel="icon" href="../../../images/icon.png" type="image/x-icon">
  </head>
  <body>
    <div class="columns is-vcentered">
      <div class="login column is-5">
        <section class="section">
          <div class="has-text-centered">
          <a href="/../quiron/inicio.php"> 
              <img class="login-logo" src="/../quiron/images/lowgo.png">
          </a>
          <h1 class="title">Inicia Sesión ADMIN</h1>
          </div>
          <form action="login.php?action=login" method="post">  
          <div class="field">
            <label class="label">Correo</label>
            <div class="control has-icons-right">
              <input name="correo" class="input" type="text">
              <span class="icon is-small is-right">
                <i class="fa fa-user"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <label class="label">Contraseña</label>
            <div class="control has-icons-right">
              <input name="contrasena" class="input" type="password">
              <span class="icon is-small is-right">
                <i class="fa fa-key"></i>
              </span>
            </div>
          </div>
          <div class="control">
          <div class="has-text-centered">
            <button type="submit" class="button is-vcentered is-info is-outlined">Iniciar Sesión</butt>
          </div>
          <div class="has-text-centered ">
            <a class="has-text-info" href="login.php?action=forgot" >Olvidaste tu contraseña?!</a>
          </div>
          </div>
          </form>  
          
        </section>
      </div>
      <div id="particles-js" class="interactive-bg column is-8">
      </div>
    </div>

  </body>
</html>
