<?php
include (__DIR__.'/peluqueros.class.php');
$app=new Peluquero();
include (__DIR__.'/vistas/header.php');
$action=(isset($_GET['action']))?$_GET['action'] : null;
$id_peluquero=(isset($_GET['id_peluquero']))?$_GET['id_peluquero'] : null;
$datos=array();
$alerta=array();
$app->checkPrivilegio('Personal',true);
switch ($action){
    case 'delete':
        $fila=$app->Delete($id_peluquero);
        if($fila){
            $alerta['tipo']="success";
            $alerta['mensaje']="Peluquero eliminado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al eliminar el peluquero";
            }    
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/peluqueros/index.php');
        break;
    case 'create':
        include (__DIR__.'/vistas/peluqueros/form.php');
        break;
     case 'save':
         $datos=$_POST;
         if($app->Insert($datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Peluquero agregado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al agregar el peluquero";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/peluqueros/index.php');
        break;
    case 'update':
        $datos=$app->getOne($id_peluquero);
        if(isset($datos['id_peluquero'])){
            include (__DIR__.'/vistas/peluqueros/form.php');
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="Ese peluquero no existe";
            $datos=$app->getAll();
            include (__DIR__.'/vistas/alerta.php');
            include (__DIR__.'/vistas/peluqueros/index.php');
        }
        break;
    case 'change':
        $datos=$_POST;
        if($app->Update($id_peluquero,$datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Peluquero actualizado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al actualizar el peluquero";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/peluqueros/index.php');
        break;    
    default:
    $datos=$app->getAll();
    include (__DIR__.'/vistas/peluqueros/index.php');
    
}
include (__DIR__.'/vistas/footer.php');
?>