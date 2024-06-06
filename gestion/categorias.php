<?php
include (__DIR__.'/categoria.class.php');
$app=new Categoria();
include (__DIR__.'/vistas/header.php');
$action=(isset($_GET['action']))?$_GET['action'] : null;
$id_categoria=(isset($_GET['id_categoria']))?$_GET['id_categoria'] : null;
$datos=array();
$alerta=array();
$app->checkPrivilegio('Productos',true);
switch ($action){
    case 'delete':
        $fila=$app->Delete($id_categoria);
        if($fila){
            $alerta['tipo']="success";
            $alerta['mensaje']="Categoría eliminada correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al eliminar la categoría";
            }    
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/categorias/index.php');
        break;
    case 'create':
        include (__DIR__.'/vistas/categorias/form.php');
        break;
     case 'save':
         $datos=$_POST;
         if($app->Insert($datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Categoría agregada correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al agregar la categoría";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/categorias/index.php');
        break;
    case 'update':
        $datos=$app->getOne($id_categoria);
        if(isset($datos['id_categoria'])){
            include (__DIR__.'/vistas/categorias/form.php');
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="Esa categoría no existe";
            $datos=$app->getAll();
            include (__DIR__.'/vistas/alerta.php');
            include (__DIR__.'/vistas/categorias/index.php');
        }
        break;
    case 'change':
        $datos=$_POST;
        if($app->Update($id_categoria,$datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Categoría actualizada correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al actualizar la categoría";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/categorias/index.php');
        break;    
    default:
    $datos=$app->getAll();
    include (__DIR__.'/vistas/categorias/index.php');
    
}
include (__DIR__.'/vistas/footer.php');
?>