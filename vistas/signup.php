<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Regístrate</title>
    <script src="/../quiron/js/main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" href="/quiron/css/login.css">
    <link rel="shortcut icon" href="/images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="/images/icon.png" type="image/x-icon">
</head>
<body>
    <div class="columns is-vcentered">
        <div class="login column is-7">
            <section class="section">
                <div class="has-text-centered">
                    <a href="/quiron/inicio.php"> 
                        <img class="login-logo" src="/images/lowgo.png">
                    </a>
                    <h1 class="title">Crea tu cuenta</h1>
                </div>
                <form action="login.php?action=save" method="post">  
                    <div class="field">
                        <label class="label">Correo</label>
                        <p class="control is-expanded has-icons-left has-icons-right">
                            <input name="correo" class="input is-success" type="email" placeholder="Correo" required="required">
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <span class="icon is-small is-right">
                                <i class="fas fa-check"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field">
                        <label class="label">Nombre</label>
                        <div class="control has-icons-right">
                            <input name="nombre" class="input" type="text" required="required">
                            <span class="icon is-small is-right">
                                <i class="fa fa-user"></i>
                            </span>     
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Primer Apellido</label>
                        <div class="control has-icons-right">
                            <input name="primer_apellido" class="input" type="text">
                            <span class="icon is-small is-right">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <p class="help">Opcional</p>
                    </div>
                    <div class="field">
                        <label class="label">Segundo Apellido</label>
                        <div class="control has-icons-right">
                            <input name="segundo_apellido" class="input" type="text">
                            <span class="icon is-small is-right">
                                <i class="fa fa-user"></i>  
                            </span>
                        </div>
                        <p class="help">Opcional</p>
                    </div>
                        
                    <div class="field">
                        <label class="label">Número telefónico</label>
                        <div class="field-body">
                            <div class="field is-expanded">
                                <div class="field has-addons">
                                    <p class="control">
                                        <a class="button is-static">
                                            +52
                                        </a>
                                    </p>
                                    <p class="control is-expanded">
                                        <input class="input" type="tel" maxlength="10" minlength="10" name="numero_telefonico" required="required">
                                    </p>
                                </div>
                                <p class="help">10 dígitos</p>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Dirección</label>
                        <div class="control has-icons-right">
                            <input name="direccion" class="input" type="text" >
                            <span class="icon is-small is-right">
                                <i class="fa fa-user"></i>  
                            </span>
                        </div>
                    </div>
                    
                    <div class="field">
                        <label class="label">Crea una contraseña</label>
                        <div class="control has-icons-right">
                            <input name="contrasena" class="input" type="password" required="required">
                            <span class="icon is-small is-right">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                    </div>
                    
                    <div class="field">
                        <label class="label">Confirma tu contraseña</label>
                        <div class="control has-icons-right">
                            <input name="confirmacion" class="input" type="password" required="required">
                            <span class="icon is-small is-right">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                    </div>
                    <div class="control">
                        <div class="has-text-centered">
                            <button type="submit" class="button is-vcentered is-info is-outlined">Registrar</button>
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
