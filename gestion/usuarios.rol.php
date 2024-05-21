<?php
include (__DIR__.'/usuario.rol.class.php');
include (__DIR__.'/rol.class.php');
$app=new usuarioRol();
$appRol=new rol();
include (__DIR__.'/vistas/header.php');
$action=(isset($_GET['action']))?$_GET['action'] : null;
$id_rol=(isset($_GET['id_rol']))?$_GET['id_rol'] : null;
$roles=$appRol->getAll();
$datos=array();
$alerta=array();

switch ($action){
    case 'delete':
        $fila=$app->Delete($id_rol,isset($_GET['id_usuario'])? $_GET['id_usuario']: $_POST['id_usuario']);
        if($fila){
            $alerta['tipo']="success";
            $alerta['mensaje']="Rol eliminado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al eliminar el rol";
            }    
        $datos=$app->getAll(isset($_GET['id_usuario'])? $_GET['id_usuario']: $_POST['id_usuario']);
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/roles/index.php');
        break;
    case 'create':
        include (__DIR__.'/vistas/roles/roles.form.php');
        break;
     case 'save':
         $datos=$_POST;
         if($app->Insert($datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Rol agregado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al agregar el rol";
            }
        $datos=$app->getAll(isset($_GET['id_usuario'])? $_GET['id_usuario']: $_POST['id_usuario']);
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/roles/index.php');
        break;
    case 'update':
        $datos=$app->getOne($id_rol);
        if(isset($datos['id_rol'])){
            include (__DIR__.'/vistas/roles/roles.form.php');
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="Ese rol no existe";
            $datos=$app->getAll(isset($_GET['id_usuario'])? $_GET['id_usuario']: $_POST['id_usuario']);
            include (__DIR__.'/vistas/alerta.php');
            include (__DIR__.'/vistas/roles/index.php');
        }
        break;
    case 'change':
        $datos=$_POST;
        if($app->Update($id_rol,$datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Rol actualizado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al actualizar el rol";
            }
        $datos=$app->getAll(isset($_GET['id_usuario'])? $_GET['id_usuario']: $_POST['id_usuario']);
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/roles/index.php');
        break;    
    default:
    $datos=$app->getAll(isset($_GET['id_usuario'])? $_GET['id_usuario']: $_POST['id_usuario']);
    include (__DIR__.'/vistas/roles/roles.php');
    
}
include (__DIR__.'/vistas/footer.php');
?>