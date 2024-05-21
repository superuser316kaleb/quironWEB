<?php
require_once(__DIR__."/sistema.clase.php");
class usuarioRol extends Sistema
{
    function getAll($id_usuario){
        $this->connect();
        $stmt =$this->conn->prepare("SELECT concat(nombre,' ',primer_apellido,' ',segundo_apellido) as nombre,correo,r.rol,r.id_rol,u.id_usuario
            from usuarios u join usuario_rol ur on u.id_usuario = ur.id_usuario
            join roles r on ur.id_rol = r.id_rol
            where u.id_usuario=:id_usuario;");
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this->setCount(count($datos));
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
        $stmt = $this->conn->prepare("INSERT INTO usuario_rol (id_usuario,id_rol)
        VALUES (:id_usuario,:id_rol);");
        $stmt->bindParam(':id_usuario', $datos['id_usuario'], PDO::PARAM_INT);
        $stmt->bindParam(':id_rol', $datos['id_rol'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
        return 0;
    }
   
   
function Delete($id_usuario, $id_rol){
    $this->connect();
    $stmt = $this->conn->prepare("DELETE FROM usuarios_rol WHERE id_usuario=:id_usuario AND id_rol=id_rol;");
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function Update($id_usuario, $id_rol){
    $this->connect();
    $stmt = $this->conn->prepare("UPDATE usuarios_rol
     SET id_usuario=:id_usuario, id_rol=:id_rol
     WHERE id_usuario=:id_usuario AND id_rol=id_rol;");
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}   
   
}
?>
