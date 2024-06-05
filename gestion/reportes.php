<?php
include __DIR__.'/reportes.class.php';
$app=new Reportes();
//$app->checkRole('Administrador',true);
$action=(isset($_GET['action']))?$_GET['action'] : null;
$alerta=array();
switch ($action){
    case 'productos':
        $app->productos();
        $alerta['tipo']="success";  
        $alerta['mensaje']="Inventario agregado correctamente";
        break;
    case 'marcas':
        $app->marcas();
        break;
    default:
        include (__DIR__.'/views/header.php');
        //include (__DIR__.'/views/reportes/index.php');
        break;
}
?>