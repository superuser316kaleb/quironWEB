<?php
include (__DIR__.'/producto.class.php');
include (__DIR__.'/marca.class.php');
include (__DIR__.'/categoria.class.php');
$app=new Producto();
$appmarcas=new Marca();
$appcategorias=new Categoria();
include (__DIR__.'/vistas/header.php');
$marcas=$appmarcas->getAll();
$categorias=$appcategorias->getAll();
$action=(isset($_GET['action']))?$_GET['action'] : null;
$id_producto=(isset($_GET['id_producto']))?$_GET['id_producto'] : null;
$datos=array();
$alerta=array();
$app->checkPrivilegio('Productos',true);

switch ($action){
    case 'delete':
        $app->deleteInventory($id_producto);
        $fila=$app->Delete($id_producto);
        if($fila){
            $alerta['tipo']="success";
            $alerta['mensaje']="Producto eliminado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al eliminar el producto";
            }    
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/productos/index.php');
        break;
    case 'create':
        include (__DIR__.'/vistas/productos/form.php');
        break;
     case 'save':
         $datos=$_POST;
         $datos['fotografia']=$_FILES['fotografia']['name'];  
         if($app->Insert($datos)&$app->insertInventory()){
            $alerta['tipo']="success";
            $alerta['mensaje']="Producto agregado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al agregar el producto";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/productos/index.php');
        break;
    case 'update':
        $datos=$app->getOne($id_producto);
        if(isset($datos['id_producto'])){
            include (__DIR__.'/vistas/productos/form.php');
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="Ese producto no existe";
            $datos=$app->getAll();
            include (__DIR__.'/vistas/alerta.php');
            include (__DIR__.'/vistas/productos/index.php');
        }
        break;
    case 'change':
        $datos=$_POST;
        if($app->Update($id_producto,$datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Producto actualizado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al actualizar el proucto";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/productos/index.php');
        break;      
    default:
    $datos=$app->getAll();
    include (__DIR__.'/vistas/productos/index.php');
    
}
include (__DIR__.'/vistas/footer.php');
?>