<?php
include (__DIR__.'/vistas/header.php');
include (__DIR__.'/privilegios.class.php');
$app=new Privilegio();
//$app->checkRole('Administrador',true);
//$app->checkPrivilegio('privilegios',true);
$action=(isset($_GET['action']))?$_GET['action'] : null;
$id_privilegio=(isset($_GET['id_privilegio']))?$_GET['id_privilegio'] : null;
$datos=array();
$alerta=array();

switch ($action){
    case 'delete':
        $fila=$app->Delete($id_privilegio);
        if($fila){
            $alerta['tipo']="success";
            $alerta['mensaje']="Privilegoi eliminado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al eliminar el privilegio";
            }    
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/privilegios/index.php');
        break;
    case 'create':
        include (__DIR__.'/vistas/privilegios/form.php');
        break;
    case 'save':
        $datos=$_POST;
        if($app->Insert($datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Privilegio agregado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al agregar el privilegio";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/privilegios/index.php');
        break;
    case 'update':
        $datos=$app->getOne($id_privilegio);
        if(isset($datos['id_privilegio'])){
            include (__DIR__.'/vistas/privilegios/form.php');
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="Ese privilegio no existe";
            $datos=$app->getAll();
            include (__DIR__.'/vistas/alerta.php');
            include (__DIR__.'/vistas/privilegios/index.php');
        }
        break;
    case 'change':
        $datos=$_POST;
        if($app->Update($id_privilegio,$datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Privilegio actualizado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al actualizar el privilegio";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/privilegios/index.php');
        break;    
    default:
    $datos=$app->getAll();
    include (__DIR__.'/vistas/privilegios/index.php');
}
include (__DIR__.'/vistas/footer.php');
?>