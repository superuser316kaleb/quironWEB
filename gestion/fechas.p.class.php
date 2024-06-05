<?php
require_once(__DIR__."/sistema.clase.php");
class Fechasp extends Sistema
{
    function getAll($id_peluquero){
        $this->connect();
        $stmt = $this->conn->prepare("SELECT p.nombre as nombre,fecha,id_fecha,hora,p.id_peluquero as id_peluquero,disponible
         from fechas_peluqueros f
        join peluqueros p on p.id_peluquero=f.id_peluquero
        Where f.id_peluquero=:id_peluquero;");
        $stmt->bindParam(':id_peluquero', $id_peluquero, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this-> setCount(count($datos));
        return $datos;
    }

    function getOne($id_fecha){
    $this->connect();
    $stmt = $this->conn->prepare("SELECT id_peluquero,id_fecha, fecha, hora,disponible FROM fechas_peluqueros
     WHERE id_fecha=:id_fecha;");
    $stmt->bindParam(':id_fecha', $id_fecha, PDO::PARAM_INT);
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
    $stmt=$this->conn->prepare("INSERT INTO fechas_peluqueros (fecha,hora,id_peluquero) 
    VALUES (:fecha,:hora,:id_peluquero);");
    $stmt->bindParam(':fecha', $datos['fecha'], PDO::PARAM_STR);
    $stmt->bindParam(':hora', $datos['hora'], PDO::PARAM_STR);
    $stmt->bindParam(':id_peluquero', $datos['id_peluquero'], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount();
}

function Delete($id_fecha){    
    $this->connect();
    $stmt = $this->conn->prepare("DELETE FROM fechas_peluqueros WHERE id_fecha=:id_fecha;");
    $stmt->bindParam(':id_fecha', $id_fecha, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function Update($id_fecha, $datos){
    $this->connect(); 
    $stmt=$this->conn->prepare("UPDATE fechas_peluqueros SET fecha=:fecha, hora=:hora,disponible=:disponible 
    WHERE id_fecha=:id_fecha;");
    $stmt->bindParam(':fecha', $datos['fecha'], PDO::PARAM_STR);
    $stmt->bindParam(':hora', $datos['hora'], PDO::PARAM_STR);
    $stmt->bindParam(':disponible', $datos['disponible'], PDO::PARAM_BOOL);
    $stmt->bindParam(':id_fecha', $id_fecha, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}
function getAllFront(){
        $datos=$this->query("SELECT concat(v.nombre,' ',v.primer_apellido,' ',v.segundo_apellido) as nombre,fecha,id_fecha,hora,v.id_peluquero 
        as id_peluquero,disponible
        from fechas_peluqueros f
        join peluqueros v on v.id_peluquero=f.id_peluquero
        Where disponible=true;");
        return $datos;
    }


    
}
