<?php
include (__DIR__.'/usuario.class.php');
$app=new Usuario();
include (__DIR__.'/vistas/header.php');
$action=(isset($_GET['action']))?$_GET['action'] : null;
$id_usuario=(isset($_GET['id_usuario']))?$_GET['id_usuario'] : null;
$datos=array();
$alerta=array();
switch ($action){
    case 'delete':
        $fila=$app->Delete($id_usuario);
        if($fila){
            $alerta['tipo']="success";
            $alerta['mensaje']="Usuario eliminado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al eliminar el usuario";
            }    
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/usuarios/index.php');
        break;
    case 'create':
        include (__DIR__.'/vistas/usuarios/form.php');
        break;
     case 'save':
         $datos=$_POST;
         if($app->Insert($datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Usuario agregado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al agregar el usuario";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/usuarios/index.php');
        break;
    case 'update':
        $datos=$app->getOne($id_usuario);
        if(isset($datos['id_usuario'])){
            include (__DIR__.'/vistas/usuarios/form.php');
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="Ese usuario no existe";
            $datos=$app->getAll();
            include (__DIR__.'/vistas/alerta.php');
            include (__DIR__.'/vistas/usuarios/index.php');
        }
        break;
    case 'change':
        $datos=$_POST;
        if($app->Update($id_usuario,$datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Usuario actualizado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al actualizar el usuario";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/usuarios/index.php');
        break;    
    default:
    $datos=$app->getAll();
    include (__DIR__.'/vistas/usuarios/index.php');
    
}
include (__DIR__.'/vistas/footer.php');
?>