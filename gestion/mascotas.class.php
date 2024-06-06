<?php
require_once(__DIR__."/sistema.clase.php");
class Mascota extends Sistema
{
    function getAll(){
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_mascota,nombre,especie,raza,sexo,color,no_identificacion,microchip,tatuaje,peso 
        FROM mascotas;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this-> setCount(count($datos));
        return $datos;
    }

function getOne($id_mascota){
    $this->connect();
    $stmt = $this->conn->prepare("SELECT id_mascota, nombre, especie, raza, sexo, color, no_identificacion, microchip, tatuaje, peso 
    FROM mascotas WHERE id_mascota=:id_mascota;");
    $stmt->bindParam(':id_mascota', $id_mascota, PDO::PARAM_INT);
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
    if($this->validateMascota($datos)){
        $stmt=$this->conn->prepare("INSERT INTO mascotas(nombre, especie, raza, sexo, color, no_identificacion, microchip, tatuaje, peso)    
        VALUES (:nombre, :especie, :raza, :sexo, :color, :no_identificacion, :microchip, :tatuaje, :peso);");
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':especie', $datos['especie'], PDO::PARAM_STR);
        $stmt->bindParam(':raza', $datos['raza'], PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $datos['sexo'], PDO::PARAM_STR);
        $stmt->bindParam(':color', $datos['color'], PDO::PARAM_STR);
        $stmt->bindParam(':no_identificacion', $datos['no_identificacion'], PDO::PARAM_STR);
        $stmt->bindParam(':microchip', $datos['microchip'], PDO::PARAM_STR);
        $stmt->bindParam(':tatuaje', $datos['tatuaje'], PDO::PARAM_STR);
        $stmt->bindParam(':peso', $datos['peso'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }
    return 0;
}

function Delete($id_mascota){
    $this->connect();
    $stmt = $this->conn->prepare("DELETE FROM mascotas WHERE id_mascota=:id_mascota;");
    $stmt->bindParam(':id_mascota', $id_mascota, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function Update($id_mascota, $datos){
    $this->connect(); 
    $stmt = $this->conn->prepare("UPDATE mascotas SET nombre=:nombre, especie=:especie, raza=:raza, sexo=:sexo, color=:color, 
    no_identificacion=:no_identificacion, microchip=:microchip, tatuaje=:tatuaje, peso=:peso WHERE id_mascota=:id_mascota;");
    $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
    $stmt->bindParam(':especie', $datos['especie'], PDO::PARAM_STR);
    $stmt->bindParam(':raza', $datos['raza'], PDO::PARAM_STR);
    $stmt->bindParam(':sexo', $datos['sexo'], PDO::PARAM_STR);
    $stmt->bindParam(':color', $datos['color'], PDO::PARAM_STR);
    $stmt->bindParam(':no_identificacion', $datos['no_identificacion'], PDO::PARAM_STR);
    $stmt->bindParam(':microchip', $datos['microchip'], PDO::PARAM_STR);
    $stmt->bindParam(':tatuaje', $datos['tatuaje'], PDO::PARAM_STR);
    $stmt->bindParam(':peso', $datos['peso'], PDO::PARAM_STR);
    $stmt->bindParam(':id_mascota', $id_mascota, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}



    function validateMascota($datos){
        $notNulls = ['nombre', 'especie', 'raza', 'sexo', 'color', 'peso'];
        foreach ($notNulls as $atributo) {
            if (empty($datos[$atributo])) {
                return false;
            }
        }
        return true;
    }
   
}
