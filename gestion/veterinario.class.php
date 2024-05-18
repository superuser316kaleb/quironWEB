<?php
require_once(__DIR__."/sistema.clase.php");
class Veterinario extends Sistema
{
    function getAll(){
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_veterinario, nombre,primer_apellido,segundo_apellido,numero_telefonico from veterinarios;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this-> setCount(count($datos));
        return $datos;
    }

    function getOne($id_veterinario){
    $this->connect();
    $stmt = $this->conn->prepare("SELECT id_veterinario, nombre, primer_apellido, segundo_apellido, numero_telefonico FROM veterinarios WHERE id_veterinario=:id_veterinario;");
    $stmt->bindParam(':id_veterinario', $id_veterinario, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $datos = $stmt->fetchAll();
    if(isset($datos[0])) {
        return $datos[0];
    }
    return array();
}

   function Insert($datos){
    $this->connect();
    if($this->validateVeterinario($datos)){
        $stmt = $this->conn->prepare("INSERT INTO veterinarios (nombre, primer_apellido, segundo_apellido, numero_telefonico) VALUES (:nombre, :primer_apellido, :segundo_apellido, :numero_telefonico);");
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':numero_telefonico', $datos['numero_telefonico'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
        return 0;
    }
   
}


function Delete($id_veterinario){
    $this->connect();
    $stmt = $this->conn->prepare("DELETE FROM veterinarios WHERE id_veterinario=:id_veterinario;");
    $stmt->bindParam(':id_veterinario', $id_veterinario, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function Update($id_veterinario, $datos){
    $this->connect();
    $stmt = $this->conn->prepare("UPDATE veterinarios SET nombre=:nombre, primer_apellido=:primer_apellido, segundo_apellido=:segundo_apellido, numero_telefonico=:numero_telefonico WHERE id_veterinario=:id_veterinario;");
    $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
    $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
    $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
    $stmt->bindParam(':numero_telefonico', $datos['numero_telefonico'], PDO::PARAM_INT);
    $stmt->bindParam(':id_veterinario', $id_veterinario, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

    function validateVeterinario($datos){
        $notNulls = ['nombre', 'numero_telefonico'];
        foreach ($notNulls as $atributo) {
            if (empty($datos[$atributo])) {
                return false;
            }
        }
        return true;
    }
   
}
