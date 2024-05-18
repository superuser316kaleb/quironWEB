<?php
include(__DIR__.'/sistema.clase.php');
include(__DIR__.'/vistas/header.sencillo.php');
$app = new Sistema();
$action=(isset($_GET['action']))?$_GET['action']:null;
switch ($action){
    case 'logout':
        $app->logout();
        $tipo = 'success';
        $mensaje='Ha salido del sistema correctamente';
        $app->alert($tipo,$mensaje);
        include __DIR__.'/vistas/login/main.php';
        break;
    case 'login':
        $correo=$_POST['correo'];
        $contrasena=$_POST['contrasena'];
        $login = $app->login($correo,$contrasena);
        if($login){
            header('Location: inicio.php');
        }else{
            $tipo='danger';
            $mensaje='Usuario o contraseña incorrectos';
            $app->alert($tipo,$mensaje);
        }
        break;
    case 'forgot':
        include __DIR__."/vistas/login/forgot.php";
        break;
    case 'reset':
        $correo=$_POST['correo'];
        $reset=$app->reset($correo);
        if($reset){
            $tipo='success';
            $mensaje='Se ha enviado un correo para recuperacion';
            $app->alert($tipo,$mensaje);
        }else{
            $tipo='danger';
            $mensaje='No se pudo enviar el correo';
            $app->alert($tipo,$mensaje);
        }
        break;
    case 'recovery':
        if(isset($_GET['token'])){
            $token = $_GET['token'];
            if($app->recovery($token)){   
                if(isset($_POST['nueva']) && $_POST['confirmacion']){
                    $contrasena=$_POST['confirmacion'];
                    if($app->recovery($token,$contrasena)){
                        $tipo='success';
                        $mensaje='Se ha cambiado la contraseña correctamente';
                        $app->alert($tipo,$mensaje);
                        include __DIR__.'/vistas/login/main.php';
                        die;
                    }else{
                        $tipo='danger';
                        $mensaje='No se pudo cambiar la contraseña';
                        $app->alert($tipo,$mensaje);
                        die;
                    }
                }
                include __DIR__.'/vistas/login/recovery.php';
                die;
            }
            $tipo = 'danger';
            $mensaje = 'Token no valido';
            $app->alert($tipo,$mensaje);
        }
        break;
    default:
        include __DIR__.'/vistas/login/main.php';
        break;
}
require_once(__DIR__.'/vistas/footer.php');
?>