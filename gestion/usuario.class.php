<?php
require_once(__DIR__."/sistema.clase.php");
class Usuario extends Sistema
{
    function getAll(){
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_usuario, nombre,correo,primer_apellido,segundo_apellido,numero_telefonico,direccion from usuarios;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this-> setCount(count($datos));
        return $datos;
    }

    function getOne($id_usuario){
    $this->connect();
    $stmt = $this->conn->prepare("SELECT id_usuario, nombre, correo,primer_apellido, segundo_apellido, numero_telefonico,direccion FROM usuarios WHERE id_usuario=:id_usuario;");
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
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
    if($this->validateUsuario($datos)){
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre,correo,contrasena, primer_apellido, segundo_apellido, numero_telefonico,direccion)
         VALUES (:nombre,:correo,:contrasena, :primer_apellido, :segundo_apellido, :numero_telefonico,:direccion);");
        $contraseña = password_hash($datos['contrasena'],PASSWORD_DEFAULT); 
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':contrasena',$contraseña, PDO::PARAM_STR);
        $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':numero_telefonico', $datos['numero_telefonico'], PDO::PARAM_INT);
        $stmt->bindParam(':direccion', $datos['direccion'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
        return 0;
    }
   
}   


function Delete($id_usuario){
    $this->connect();
    $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario;");
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function Update($id_usuario, $datos){
    $this->connect();
    $stmt = $this->conn->prepare("UPDATE usuarios SET nombre=:nombre,correo=:correo,
    primer_apellido=:primer_apellido, segundo_apellido=:segundo_apellido, numero_telefonico=:numero_telefonico, direccion=:direccion 
    WHERE id_usuario=:id_usuario;");
    $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
    $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
    $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
    $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
    $stmt->bindParam(':numero_telefonico', $datos['numero_telefonico'], PDO::PARAM_INT);
    $stmt->bindParam(':direccion', $datos['direccion'], PDO::PARAM_STR);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

    function validateUsuario($datos){
        $notNulls = ['nombre', 'numero_telefonico','correo','contrasena'];
        foreach ($notNulls as $atributo) {
            if (empty($datos[$atributo])) {
                return false;
            }
        }
        return true;
    }
   
}
