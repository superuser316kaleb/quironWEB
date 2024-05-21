<?php
require_once(__DIR__."/sistema.clase.php");
class Inventario extends Sistema
{
    function getAll($id_producto){
        $this->connect();
        $stmt = $this->conn->prepare("SELECT p.nombre as nombre, i.existencia,fecha_actualizacion,i.id_producto, i.id_inventario from inventario i
        join productos p on p.id_producto=i.id_producto
        Where i.id_producto=:id_producto;");
        $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this-> setCount(count($datos));
        return $datos;
    }

    function getOne($id_usuario){
    $this->connect();
    $stmt = $this->conn->prepare("SELECT id_producto,id_usuario, existencia, fecha_actualizacion FROM inventario WHERE id_usuario=:id_usuario;");
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $datos = $stmt->fetchAll();
    if(isset($datos[0])) {
        $this->setCount(count($datos));
        return $datos[0];
    }
    return array();
}

    function Insert($datos){
    $this->connect();
    $stmt=$this->conn->prepare("INSERT INTO inventario (existencia,id_producto) 
    VALUES (:existencia,:id_producto);");
    $stmt->bindParam(':existencia', $datos['existencia'], PDO::PARAM_STR);
    $stmt->bindParam(':id_producto', $datos['id_producto'], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount();
}

function Delete($id_usuario){    
    $this->connect();
    $stmt = $this->conn->prepare("DELETE FROM inventario WHERE id_usuario=:id_usuario;");
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function Update($id_usuario, $datos){
    $this->connect(); 
    $stmt=$this->conn->prepare("UPDATE inventario SET existencia=:existencia, fecha_actualizacion=:fecha_actualizacion 
    WHERE id_usuario=:id_usuario;");
    $fecha_actualizacion = date('Y-m-d H:i:s');
    $stmt->bindParam(':existencia', $datos['existencia'], PDO::PARAM_INT); // Considerando que existencia es un entero
    $stmt->bindParam(':fecha_actualizacion', $fecha_actualizacion, PDO::PARAM_STR); // Cambio a PARAM_INT
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}


    function validateProducto($datos){
        if(empty($datos['categoria'])){
            return false;
        }
        return true;
    }
   
}
