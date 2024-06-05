<?php
require_once(__DIR__."/sistema.clase.php");
class Fechasv extends Sistema
{
    function getAll($id_veterinario){
        $this->connect();
        $stmt = $this->conn->prepare("SELECT v.nombre as nombre,fecha,id_fecha,hora,v.id_veterinario as id_veterinario,disponible
         from fechas_veterinarios f
        join veterinarios v on v.id_veterinario=f.id_veterinario
        Where f.id_veterinario=:id_veterinario;");
        $stmt->bindParam(':id_veterinario', $id_veterinario, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this-> setCount(count($datos));
        return $datos;
    }

    function getOne($id_fecha){
    $this->connect();
    $stmt = $this->conn->prepare("SELECT id_veterinario,id_fecha, fecha, hora,disponible FROM fechas_veterinarios
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
    $stmt=$this->conn->prepare("INSERT INTO fechas_veterinarios (fecha,hora,id_veterinario) 
    VALUES (:fecha,:hora,:id_veterinario);");
    $stmt->bindParam(':fecha', $datos['fecha'], PDO::PARAM_STR);
    $stmt->bindParam(':hora', $datos['hora'], PDO::PARAM_STR);
    $stmt->bindParam(':id_veterinario', $datos['id_veterinario'], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount();
}

function Delete($id_fecha){    
    $this->connect();
    $stmt = $this->conn->prepare("DELETE FROM fechas_veterinarios WHERE id_fecha=:id_fecha;");
    $stmt->bindParam(':id_fecha', $id_fecha, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function Update($id_fecha, $datos){
    $this->connect(); 
    $stmt=$this->conn->prepare("UPDATE fechas_veterinarios SET fecha=:fecha, hora=:hora,disponible=:disponible 
    WHERE id_fecha=:id_fecha;");
    $stmt->bindParam(':fecha', $datos['fecha'], PDO::PARAM_STR);
    $stmt->bindParam(':hora', $datos['hora'], PDO::PARAM_STR);
    $stmt->bindParam(':disponible', $datos['disponible'], PDO::PARAM_BOOL);
    $stmt->bindParam(':id_fecha', $id_fecha, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function getAllFront(){
        $datos=$this->query("SELECT concat(v.nombre,' ',v.primer_apellido,' ',v.segundo_apellido) as nombre,fecha,id_fecha,hora,v.id_veterinario 
        as id_veterinario,disponible
        from fechas_veterinarios f
        join veterinarios v on v.id_veterinario=f.id_veterinario
        Where disponible=true;");
        return $datos;
    }
    
}
