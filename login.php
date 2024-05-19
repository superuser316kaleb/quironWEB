<?php
include(__DIR__.'/gestion/sistema.clase.php');

$app = new Sistema();
$action=(isset($_GET['action']))?$_GET['action']:null;
switch ($action){
    case 'logout':
    include_once(__DIR__.'/vistas/header.sencillo.php');
    $app->logout();
    $tipo = 'success';
    $mensaje='Ha salido del sistema correctamente';
    $app->alert($tipo,$mensaje);
    include __DIR__.'/vistas/main.php';
    break;
    case 'login':
    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];
    $login = $app->login($correo,$contrasena);
    if($login){
        header('Location: inicio.php');
    }else{
        include_once(__DIR__.'/vistas/header.sencillo.php');
        $tipo='danger';
        $mensaje='Usuario o contraseña incorrectos';
        $app->alert($tipo,$mensaje);
    }
    break;
    case 'forgot':
    include __DIR__."/vistas/forgot.php";
    break;
    case 'reset':
    $correo=$_POST['correo'];
    $reset=$app->reset($correo);
    if($reset){
        $tipo='success';
        $mensaje='Se ha enviado un correo para recuperacion';
        $app->alert($tipo,$mensaje);
    }else{
        include_once(__DIR__.'/vistas/header.sencillo.php');
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
                    include __DIR__.'/vistas/main.php';
                    die;
                }else{
                    include_once(__DIR__.'/vistas/header.sencillo.php');
                    $tipo='danger';
                    $mensaje='No se pudo cambiar la contraseña';
                    $app->alert($tipo,$mensaje);
                    die;
                }
            }
            include __DIR__.'/vistas/recovery.php';
            die;
        }
        include_once(__DIR__.'/vistas/header.sencillo.php');
        $tipo = 'danger';
        $mensaje = 'Token no valido';
        $app->alert($tipo,$mensaje);
    }
    break;
    case 'register':
    include __DIR__.'/vistas/register.php';
    break;
    case 'save':
    $datos=$_POST;
    if($datos['contrasena']!=$datos['confirmacion']){
        $tipo = 'danger';
        $mensaje = 'Las contraseñas no coinciden';
        $app->alert($tipo,$mensaje);
        die;
    }else{
        if($app->register($datos)){
            $tipo = 'success';
            $mensaje = 'Se ha creado el usuario';
            $app->alert($tipo,$mensaje);
            include_once(__DIR__.'/vistas/header.sencillo.php');
            include_once __DIR__.'/vistas/return.php';
        }else{
            include_once __DIR__.'/vistas/return.php';
            $tipo = 'danger';
            $mensaje = 'Hubo un error';
            $app->alert($tipo,$mensaje);
        }
    }
    break;    
    default:
    include __DIR__.'/vistas/login.php';
    break;
}
?>