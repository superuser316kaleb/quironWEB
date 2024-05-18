<?php
require_once(__DIR__."/sistema.clase.php");
class Categoria extends Sistema
{
    function getAll(){
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_categoria, categoria from categorias;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this-> setCount(count($datos));
        return $datos;
    }

    function getOne($id_categoria){
    $this->connect();
    $stmt = $this->conn->prepare("SELECT id_categoria, categoria FROM categorias WHERE id_categoria=:id_categoria;");
    $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
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
    $stmt=$this->conn->prepare("INSERT INTO categorias (categoria) VALUES (:categoria);");
    $stmt->bindParam(':categoria', $datos['categoria'], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount();
}

function Delete($id_categoria){
    $this->connect();
    $stmt = $this->conn->prepare("DELETE FROM categorias WHERE id_categoria=:id_categoria;");
    $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function Update($id_categoria, $datos){
    $this->connect(); 
    $stmt=$this->conn->prepare("UPDATE categorias SET categoria=:categoria WHERE id_categoria=:id_categoria;");
    $stmt->bindParam(':categoria', $datos['categoria'], PDO::PARAM_STR);
    $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
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
