<?php
require_once(__DIR__."/sistema.clase.php");
class Historial extends Sistema
{
    function getAll($id_mascota){
        $this->connect();
        $stmt = $this->conn->prepare("SELECT m.nombre as nombre, tratamiento,id_historial, m.id_mascota as id_mascota 
        from historial_mascota h
        join mascotas m on h.id_mascota=m.id_mascota
        Where h.id_mascota=:id_mascota;");
        $stmt->bindParam(':id_mascota', $id_mascota, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this-> setCount(count($datos));
        return $datos;
    }

    function getOne($id_historial){
    $this->connect();
    $stmt = $this->conn->prepare("SELECT id_mascota,id_historial, existencia, fecha_actualizacion FROM inventario WHERE id_historial=:id_historial;");
    $stmt->bindParam(':id_historial', $id_historial, PDO::PARAM_INT);
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
    $stmt=$this->conn->prepare("INSERT INTO historial_mascota (id_mascota, tratamiento) 
    VALUES (:id_mascota,:tratamiento);");
    $stmt->bindParam(':id_mascota', $datos['id_mascota'], PDO::PARAM_INT);
    $stmt->bindParam(':tratamiento', $datos['tratamiento'], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount();
}

function Delete($id_historial){    
    $this->connect();
    $stmt = $this->conn->prepare("DELETE FROM inventario WHERE id_historial=:id_historial;");
    $stmt->bindParam(':id_historial', $id_historial, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function Update($id_historial, $datos){
    $this->connect(); 
    $stmt=$this->conn->prepare("UPDATE inventario SET existencia=:existencia, fecha_actualizacion=:fecha_actualizacion 
    WHERE id_historial=:id_historial;");
    $fecha_actualizacion = date('Y-m-d H:i:s');
    $stmt->bindParam(':existencia', $datos['existencia'], PDO::PARAM_INT); // Considerando que existencia es un entero
    $stmt->bindParam(':fecha_actualizacion', $fecha_actualizacion, PDO::PARAM_STR); // Cambio a PARAM_INT
    $stmt->bindParam(':id_historial', $id_historial, PDO::PARAM_INT);
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
