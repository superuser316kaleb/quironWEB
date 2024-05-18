<?php
include (__DIR__.'/veterinario.class.php');
$app=new Veterinario();
include (__DIR__.'/vistas/header.php');
$action=(isset($_GET['action']))?$_GET['action'] : null;
$id_veterinario=(isset($_GET['id_veterinario']))?$_GET['id_veterinario'] : null;
$datos=array();
$alerta=array();

switch ($action){
    case 'delete':
        $fila=$app->Delete($id_veterinario);
        if($fila){
            $alerta['tipo']="success";
            $alerta['mensaje']="Veterinario eliminado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al eliminar el veterinario";
            }    
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/veterinarios/index.php');
        break;
    case 'create':
        include (__DIR__.'/vistas/veterinarios/form.php');
        break;
     case 'save':
         $datos=$_POST;
         if($app->Insert($datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Veterinario agregado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al agregar el veterinario";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/veterinarios/index.php');
        break;
    case 'update':
        $datos=$app->getOne($id_veterinario);
        if(isset($datos['id_veterinario'])){
            include (__DIR__.'/vistas/veterinarios/form.php');
        }else {
            $alerta['tipo']="danger";
            $alerta['mensaje']="Ese veterinario no existe";
            $datos=$app->getAll();
            include (__DIR__.'/vistas/alerta.php');
            include (__DIR__.'/vistas/veterinarios/index.php');
        }
        break;
    case 'change':
        $datos=$_POST;
        if($app->Update($id_veterinario,$datos)){
            $alerta['tipo']="success";
            $alerta['mensaje']="Veterinario actualizado correctamente";
            }else{
            $alerta['tipo']="danger";
            $alerta['mensaje']="Error al actualizar el veterinario";
            }
        $datos=$app->getAll();
        include (__DIR__.'/vistas/alerta.php');
        include (__DIR__.'/vistas/veterinarios/index.php');
        break;    
    default:
    $datos=$app->getAll();
    include (__DIR__.'/vistas/veterinarios/index.php');
    
}
include (__DIR__.'/vistas/footer.php');
?>