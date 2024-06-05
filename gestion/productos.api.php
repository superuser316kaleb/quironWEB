<?php
header('Content-Type: application/json; charset=utf-8');
include __DIR__ . '/producto.class.php';
$id_producto = (isset($_GET['id_producto'])) ? $_GET['id_producto'] : null;
$action = (isset($_SERVER['REQUEST_METHOD'])) ? $_SERVER['REQUEST_METHOD'] : null;

class Api extends Producto
{
    public function read()
    {
        $datos = $this->getAll();
        $datos = json_encode($datos);
        print($datos);
    }
    
    public function readOne($id_venta)
    {
        $datos = $this->getOne($id_venta);
        if (isset($datos['id_venta'])) {
            $datos = json_encode($datos);
            print($datos);
        } else {
            $datos['mensaje'] = "No se ha encontrado el pedido especificado";
            $datos = json_encode($datos);
            print($datos);
        }
    }
    
    public function deleteOne($id_venta)
    {
        $filas = $this->delete($id_venta);
        if ($filas) {
            $datos['mensaje'] = "El pedido se ha eliminado";
        } else {
            $datos['mensaje'] = "No se pudo eliminar el pedido";
        }
        $datos = json_encode($datos);
        print($datos);
    }
    public function create($datos){
        if($this->insert($datos)){
            $datos['mensaje']='El Producto se ha creado correctamente';
            $datos = json_encode($datos);
            print $datos;
        }else{
            $datos['mensaje']='No se pudo crear el Producto';
            $datos = json_encode($datos);
            print $datos;
        }
    }
    public function modify($id_producto,$datos){
        if($this->update($id_producto,$datos)){
            $datos['mensaje']='El Producto se ha modificado correctamente';
            $datos = json_encode($datos);
            print $datos;
        }else{
            $datos['mensaje']='No se pudo modificar el Producto';
            $datos = json_encode($datos);
            print $datos;
        }
    }
}

$app = new Api();
switch ($action) {
    case 'POST':
        $datos=array();
        $datos['producto']=$_POST['producto'];
        $datos['precio']=$_POST['precio'];
        $datos['id_marca']=$_POST['id_marca'];
        if(isset($_POST['id_producto'])){
            $id_producto=$_POST['id_producto'];
            $app->modify($id_producto,$datos);
        }else{
            $app->create($datos);
        }
    break;
    case 'DELETE':
    if (isset($_GET['id_venta'])) {
        $app->deleteOne($id_venta);
    }
    break;
    case 'GET':
    default:
    if (isset($_GET['id_venta'])) {
        $app->readOne($id_venta);
    } else {
        $app->read();
    }
    break;
}

?>
