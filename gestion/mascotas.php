<?php
include (__DIR__.'/mascotas.class.php');
$app=new Mascota();
include (__DIR__.'/vistas/header.php');
$action=(isset($_GET['action']))?$_GET['action'] : null;
$id_mascota=(isset($_GET['id_mascota']))?$_GET['id_mascota'] : null;
$datos=array();
$alerta=array();

switch ($action){
    case 'delete':
        $fila=$app->Delete($id_mascota);
        if($fila){
            $alerta['tipo']="success";
            $alerta['mensaje']="Mascota eliminada correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al eliminar mascota";
            }    
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/mascotas/index.php');
        break;
    case 'create':
        include (__DIR__.'/vistas/mascotas/form.php');
        break;
     case 'save':
         $datos=$_POST;
         if($app->Insert($datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Mascota agregada correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al agregar mascota";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/mascotas/index.php');
        break;
    case 'update':
        $datos=$app->getOne($id_mascota);
        if(isset($datos['id_mascota'])){
            include (__DIR__.'/vistas/mascotas/form.php');
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="Esa mascota no existe";
            $datos=$app->getAll();
            include (__DIR__.'/vistas/alerta.php');
            include (__DIR__.'/vistas/mascotas/index.php');
        }
        break;
    case 'change':
        $datos=$_POST;
        if($app->Update($id_mascota,$datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Mascota actualizado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al actualizar mascota";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/mascotas/index.php');
        break;    
    default:
    $datos=$app->getAll();
    include (__DIR__.'/vistas/mascotas/index.php');
    
}
include (__DIR__.'/vistas/footer.php');
?>