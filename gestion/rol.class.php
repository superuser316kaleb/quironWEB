<?php
require_once("sistema.clase.php");
class Rol extends Sistema
{
    function getAll()
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_rol, rol
        FROM roles;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this-> setCount(count($datos));
        return $datos;
    }

    function getOne($id_rol){
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_rol,rol
        FROM roles
        WHERE id_rol=:id_rol;");
        $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos=array();
        $datos = $stmt->fetchAll();
        if(isset($datos[0])){//si existe el dato
            $this-> setCount(count($datos));
            return $datos[0];
        }

        return array();
    }

   function Insert($datos){
            $this->connect();   
            if($this->validaterol($datos)){
            $stmt = $this->conn->prepare("INSERT INTO roles (rol)
            VALUES (:rol);");
            $stmt->bindParam(':rol', $datos['rol'],PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
            }
            return 0;
    }

    function Delete($id_rol){
        $this->connect();
        $stmt = $this->conn->prepare("DELETE FROM roles
        WHERE id_rol=:id_rol;");
        $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Update($id_rol,$datos){//datos es un array
        $this->connect();
        $stmt=$this->conn->prepare("UPDATE roles SET 
        rol=:rol
        WHERE id_rol=:id_rol;");
        $stmt->bindParam(':rol', $datos['rol'], PDO::PARAM_STR);
        $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
    function validaterol($datos){
        if(empty($datos['rol'])){
            return false;
        }
        return true;
    }
   
}
