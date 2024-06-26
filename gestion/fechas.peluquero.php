<?php
include (__DIR__.'/fechas.p.class.php');
$app=new Fechasp();
include (__DIR__.'/vistas/header.php');
$action=(isset($_GET['action']))?$_GET['action'] : null;
$id_fecha=(isset($_GET['id_fecha']))?$_GET['id_fecha'] : null;
$datos=array();
$alerta=array();
$app->checkPrivilegio('Citas',true);
switch ($action){
     case 'delete':
        $fila=$app->Delete($id_fecha);
        if($fila){
            $alerta['tipo']="success";
            $alerta['mensaje']="Fecha eliminada correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al eliminar la fecha";
            }    
        $datos=$app->getAll(isset($_GET['id_peluquero'])?$_GET['id_peluquero']:$_POST['id_peluquero']);
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/fechas.peluqueros/index.php');
        break;
    case 'create':
        include (__DIR__.'/vistas/fechas.peluqueros/form.php');
        break;
     case 'save':
         $datos=$_POST;
         if($app->Insert($datos)){
            $alerta['tipo']="success";  
            $alerta['mensaje']="fecha agregada correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al agregar la fecha";
            }
        $datos=$app->getAll(isset($_GET['id_peluquero'])?$_GET['id_peluquero']:$datos['id_peluquero']);
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/fechas.peluqueros/index.php');
        break;
    case 'update':
        $datos=$app->getOne($id_fecha);
        if(isset($datos['id_fecha'])){
            include (__DIR__.'/vistas/fechas.peluqueros/form.php');
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="Fecha no existe";
            $datos=$app->getAll($_GET['id_peluquero']);
            include (__DIR__.'/vistas/alerta.php');
            include (__DIR__.'/vistas/fechas.peluqueros/index.php');
        }
        break;
    case 'change':
        $datos=$_POST;
        if($app->Update($id_fecha,$datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Fecha actualizada correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al actualizar la fecha";
            }
        $datos=$app->getAll($datos['id_peluquero']);
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/fechas.peluqueros/index.php');
        break;    
    default:
    $datos=$app->getAll(isset($_GET['id_peluquero'])? $_GET['id_peluquero']: $_POST['id_peluquero']);
    include (__DIR__.'/vistas/fechas.peluqueros/index.php');
    
}
include (__DIR__.'/vistas/footer.php');
?>