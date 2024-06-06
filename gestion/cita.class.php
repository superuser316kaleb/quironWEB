<?php
require_once(__DIR__."/sistema.clase.php");
class Citas extends Sistema
{
    function getAll(){
        $datos=$this->query("SELECT id_cita,fecha,detalle,estado,id_usuario FROM citas");
        return $datos;
    }

function getOne($id_cita){
    $this->connect();
    $stmt = $this->conn->prepare("SELECT * FROM citas WHERE id_cita=:id_cita;");
    $stmt->bindParam(':id_cita', $id_cita, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $datos = $stmt->fetchAll();
    if(isset($datos[0])) {
        $this->setCount(count($datos));
        return $datos[0];
    }
    return array();
}

function Insert($datos){
    $this->connect();
    if($this->validateCita($datos)){
        $stmt=$this->conn->prepare("INSERT INTO citas(fecha,detalle,id_usuario,hora)
        VALUES (:fecha, :detalle, :id_usuario,:hora);");
        $stmt->bindParam(':fecha', $datos['fecha'], PDO::PARAM_STR);
        $stmt->bindParam(':detalle', $datos['detalle'], PDO::PARAM_STR);
        $stmt->bindParam(':id_usuario', $datos['id_usuario'], PDO::PARAM_INT);
        $stmt->bindParam(':hora', $datos['hora'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }
    return 0;
}

function Delete($id_cita){
    $this->connect();
    $stmt = $this->conn->prepare("DElETE FROM citas where id_cita=:id_cita;");
    $stmt->bindParam(':id_cita', $id_cita, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function Update($id_cita, $datos){
    $this->connect(); 
    $stmt = $this->conn->prepare("UPDATE citas SET fecha=:fecha, detalle=:detalle, estado=:estado, 
    id_usuario=:id_usuario,hora=:hora  WHERE id_cita=:id_cita;");
    $stmt->bindParam(':fecha', $datos['fecha'], PDO::PARAM_STR);
    $stmt->bindParam(':detalle', $datos['detalle'], PDO::PARAM_STR);
    $stmt->bindParam(':estado', $datos['estado'], PDO::PARAM_STR);
    $stmt->bindParam(':id_usuario', $datos['id_usuario'], PDO::PARAM_INT);
    $stmt->bindParam(':hora',$datos['hora'],PDO::PARAM_STR);
    $stmt->bindParam(':id_cita', $id_cita, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}



    function validateCita($datos){
        $notNulls = ['id_usuario'];
        foreach ($notNulls as $atributo) {
            if (empty($datos[$atributo])) {
                return false;
            }
        }
        return true;
    }
   
}
