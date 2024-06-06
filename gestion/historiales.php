<?php
include (__DIR__.'/historiales.class.php');
$app=new Historial();
include (__DIR__.'/vistas/header.php');
$action=(isset($_GET['action']))?$_GET['action'] : null;
$id_historial=(isset($_GET['id_historial']))?$_GET['id_historial'] : null;
$datos=array();
$alerta=array();
$app->checkPrivilegio('Historiales',true);
switch ($action){
    case 'create':
        include (__DIR__.'/vistas/historiales/form.php');
        break;
     case 'save':
         $datos=$_POST;
         if($app->Insert($datos)){
            $alerta['tipo']="success";  
            $alerta['mensaje']="Historial agregado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al agregar el historial";
            }
        $datos=$app->getAll(isset($_GET['id_mascota'])?$_GET['id_mascota']:$datos['id_mascota']);
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/historiales/index.php');
        break;
    case 'update':
        $datos=$app->getOne($id_historial);
        if(isset($datos['id_historial'])){
            include (__DIR__.'/vistas/historiales/form.php');
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="Historial no existe";
            $datos=$app->getAll($_GET['id_mascota']);
            include (__DIR__.'/vistas/alerta.php');
            include (__DIR__.'/vistas/historiales/index.php');
        }
        break;
    case 'change':
        $datos=$_POST;
        if($app->Update($id_historial,$datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Historial actualizada correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al actualizar la historial";
            }
        $datos=$app->getAll($datos['id_mascota']);
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/historiales/index.php');
        break;    
    default:
    $datos=$app->getAll(isset($_GET['id_mascota'])? $_GET['id_mascota']: $_POST['id_mascota']);
    include (__DIR__.'/vistas/historiales/index.php');
    
}
include (__DIR__.'/vistas/footer.php');
?>