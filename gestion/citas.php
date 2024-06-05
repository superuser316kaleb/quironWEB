<?php
include (__DIR__.'/cita.class.php');
$app=new Citas();
include (__DIR__.'/vistas/header.php');
$action=(isset($_GET['action']))?$_GET['action'] : null;
$id_cita=(isset($_GET['id_cita']))?$_GET['id_cita'] : null;
$datos=array();
$alerta=array();

switch ($action){
    case 'delete':
        $fila=$app->Delete($id_cita);
        if($fila){
            $alerta['tipo']="success";
            $alerta['mensaje']="Marca eliminada correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al eliminar la cita";
            }    
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/citas/index.php');
        break;
    case 'create':
        include (__DIR__.'/vistas/citas/form.php');
        break;
     case 'save':
         $datos=$_POST;
         if($app->Insert($datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Marca agregada correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al agregar la cita";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/citas/index.php');
        break;
    case 'update':
        $datos=$app->getOne($id_cita);
        if(isset($datos['id_cita'])){
            include (__DIR__.'/vistas/citas/form.php');
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="Esa cita no existe";
            $datos=$app->getAll();
            include (__DIR__.'/vistas/alerta.php');
            include (__DIR__.'/vistas/citas/index.php');
        }
        break;
    case 'change':
        $datos=$_POST;
        if($app->Update($id_cita,$datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Marca actualizado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al actualizar la cita";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/citas/index.php');
        break;    
    default:
    $datos=$app->getAll();
    include (__DIR__.'/vistas/citas/index.php');
    
}
include (__DIR__.'/vistas/footer.php');
?>