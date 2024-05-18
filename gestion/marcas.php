<?php
include (__DIR__.'/marca.class.php');
$app=new Marca();
include (__DIR__.'/vistas/header.php');
$action=(isset($_GET['action']))?$_GET['action'] : null;
$id_marca=(isset($_GET['id_marca']))?$_GET['id_marca'] : null;
$datos=array();
$alerta=array();

switch ($action){
    case 'delete':
        $fila=$app->Delete($id_marca);
        if($fila){
            $alerta['tipo']="success";
            $alerta['mensaje']="Marca eliminada correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al eliminar la marca";
            }    
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/marcas/index.php');
        break;
    case 'create':
        include (__DIR__.'/vistas/marcas/form.php');
        break;
     case 'save':
         $datos=$_POST;
         $datos['fotografia']=$_FILES['fotografia']['name'];  
         if($app->Insert($datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Marca agregada correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al agregar la marca";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/marcas/index.php');
        break;
    case 'update':
        $datos=$app->getOne($id_marca);
        if(isset($datos['id_marca'])){
            include (__DIR__.'/vistas/marcas/form.php');
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="Esa marca no existe";
            $datos=$app->getAll();
            include (__DIR__.'/vistas/alerta.php');
            include (__DIR__.'/vistas/marcas/index.php');
        }
        break;
    case 'change':
        $datos=$_POST;
        if($app->Update($id_marca,$datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Marca actualizado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al actualizar la marca";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/marcas/index.php');
        break;    
    default:
    $datos=$app->getAll();
    include (__DIR__.'/vistas/marcas/index.php');
    
}
include (__DIR__.'/vistas/footer.php');
?>