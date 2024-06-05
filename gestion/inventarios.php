<?php
include (__DIR__.'/inventario.class.php');
$app=new Inventario();
include (__DIR__.'/vistas/header.php');
$action=(isset($_GET['action']))?$_GET['action'] : null;
$id_inventario=(isset($_GET['id_inventario']))?$_GET['id_inventario'] : null;
$datos=array();
$alerta=array();
switch ($action){
    case 'create':
        include (__DIR__.'/vistas/inventarios/form.php');
        break;
     case 'save':
         $datos=$_POST;
         if($app->Insert($datos)){
            $alerta['tipo']="success";  
            $alerta['mensaje']="Inventario agregado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al agregar el inventario";
            }
        $datos=$app->getAll(isset($_GET['id_producto'])?$_GET['id_producto']:$datos['id_producto']);
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/inventarios/index.php');
        break;
    case 'update':
        $datos=$app->getOne($id_inventario);
        if(isset($datos['id_inventario'])){
            include (__DIR__.'/vistas/inventarios/form.php');
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="Inventario no existe";
            $datos=$app->getAll($_GET['id_producto']);
            include (__DIR__.'/vistas/alerta.php');
            include (__DIR__.'/vistas/inventarios/index.php');
        }
        break;
    case 'change':
        $datos=$_POST;
        if($app->Update($id_inventario,$datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Inventario actualizada correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al actualizar la Inventario";
            }
        $datos=$app->getAll($datos['id_producto']);
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/inventarios/index.php');
        break;    
    default:
    $datos=$app->getAll(isset($_GET['id_producto'])? $_GET['id_producto']: $_POST['id_producto']);
    include (__DIR__.'/vistas/inventarios/index.php');
    
}
include (__DIR__.'/vistas/footer.php');
?>