<?php
require_once(__DIR__."/sistema.clase.php");
class Marca extends Sistema
{
    function getAll(){
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_marca, marca, fotografia from marcas;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this-> setCount(count($datos));
        return $datos;
    }

  function getOne($id_marca){
    $this->connect();
    $stmt = $this->conn->prepare("SELECT id_marca, marca, fotografia FROM marcas WHERE id_marca=:id_marca;");
    $stmt->bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
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
    $nombre_archivo=$this-> upload("marcas");
    if($nombre_archivo){
        if($this->validateProducto($datos)){
            $stmt=$this->conn->prepare("INSERT INTO marcas(marca,fotografia))    
            VALUES (:marca, :fotografia);");
            $stmt->bindParam(':marca', $datos['marca'], PDO::PARAM_STR);
            $stmt->bindParam(':fotografia', $nombre_archivo, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        }
    } else {
        $stmt=$this->conn->prepare("INSERT INTO marcas 
            (marca)    
            VALUES (:marca);");
        $stmt->bindParam(':marca', $datos['marca'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }
    return 0;
}

function Delete($id_marca){
    $this->connect();
    $stmt = $this->conn->prepare("DELETE FROM marcas WHERE id_marca=:id_marca;");
    $stmt->bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function Update($id_marca, $datos){
    $this->connect(); 
    $nombre_archivo = $this->upload("marcas");
    if($nombre_archivo){
        $stmt = $this->conn->prepare("UPDATE marcas SET marca=:marca, fotografia=:fotografia WHERE id_marca=:id_marca;");
        $stmt->bindParam(':marca', $datos['marca'], PDO::PARAM_STR);
        $stmt->bindParam(':fotografia', $nombre_archivo, PDO::PARAM_STR);
    } else {
        $stmt = $this->conn->prepare("UPDATE marcas SET marca=:marca WHERE id_marca=:id_marca;");
        $stmt->bindParam(':marca', $datos['marca'], PDO::PARAM_STR);
    }
    $stmt->bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}



    function validateProducto($datos){
        if(empty($datos['marca'])){
            return false;
        }
        return true;
    }
   
}
