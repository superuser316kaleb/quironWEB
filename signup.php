<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <script src="js/particles.js"></script>
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <link rel="icon" href="images/icon.png" type="image/x-icon">
  </head>
  <body>
    <div class="columns is-vcentered">
      <div class="login column is-4 ">
        <section class="section">
          <div class="has-text-centered">
            <a href="inicio.php"> 
              <img class="login-logo" src="images/lowgo.png">
            </a>          
          </div>

          <div class="field">
            <label class="label">Username</label>
            <div class="control has-icons-right">
              <input class="input" type="text">
              <span class="icon is-small is-right">
                <i class="fa fa-user"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-right">
              <input class="input" type="text">
              <span class="icon is-small is-right">
                <i class="fa fa-envelope"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <label class="label">Password</label>
            <div class="control has-icons-right">
              <input class="input" type="password">
              <span class="icon is-small is-right">
                <i class="fa fa-key"></i>
              </span>
            </div>
          </div>
          <div class="has-text-centered">
            <a class="button is-vcentered is-info is-outlined">Sign Up!</a>
          </div>
          <div class="has-text-centered">
            <a class="has-text-info" href="login.html"> Already have an account? Log in now !</a>
          </div>
        </section>
      </div>
      <div id="particles-js" class="interactive-bg column is-8">

      </div>
    </div>

  </body>
</html>
