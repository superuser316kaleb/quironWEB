<?php
require_once(__DIR__."/sistema.clase.php");
class Producto extends Sistema
{
    function getAll(){
        $datos=$this->query("SELECT p.id_producto,p.nombre,m.marca as marca ,p.descripcion,p.precio,p.costo,c.categoria as categoria ,p.fotografia
        FROM productos p left join marcas m on p.id_marca = m.id_marca
        left join categorias c on p.id_categoria=c.id_categoria
        order by 1;");
        return $datos;
    }

    function getOne($id_producto){
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_producto,nombre,descripcion,precio,costo,id_marca,id_categoria,fotografia
        FROM productos
        WHERE id_producto=:id_producto;");
        $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
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
    $nombre_archivo=$this-> upload("productos");
    if($nombre_archivo){
        if($this->validateProducto($datos)){
            $stmt=$this->conn->prepare("Insert into inventario(id_producto) values (nextval('public.productos_id_producto_seq'));
            INSERT INTO productos 
            (nombre, descripcion, precio, costo, id_marca, id_categoria, fotografia)    
            VALUES (:nombre, :descripcion, :precio, :costo, :id_marca, :id_categoria, :fotografia);");
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(':precio', $datos['precio'], PDO::PARAM_INT);
            $stmt->bindParam(':costo', $datos['costo'], PDO::PARAM_INT);
            $stmt->bindParam(':id_marca', $datos['id_marca'], PDO::PARAM_INT);
            $stmt->bindParam(':id_categoria', $datos['id_categoria'], PDO::PARAM_INT);
            $stmt->bindParam(':fotografia', $nombre_archivo, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        }
    } else {
        $stmt=$this->conn->prepare("INSERT INTO productos 
            (nombre, descripcion, precio, costo, id_marca, id_categoria)    
            VALUES (:nombre, :descripcion, :precio, :costo, :id_marca, :id_categoria);");
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':precio', $datos['precio'], PDO::PARAM_INT);
        $stmt->bindParam(':costo', $datos['costo'], PDO::PARAM_INT);
        $stmt->bindParam(':id_marca', $datos['id_marca'], PDO::PARAM_INT);
        $stmt->bindParam(':id_categoria', $datos['id_categoria'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
    return 0;
}
function insertInventory(){
    $this->connect();
    $stmt=$this->conn->prepare("Insert into inventario(id_producto) 
    SELECT id_producto from productos order by 1 DESC limit 1;");
    $stmt->execute();
    return $stmt->rowCount();
}
function deleteInventory($id_producto){    
    $this->connect();
    $stmt = $this->conn->prepare("DELETE FROM inventario WHERE id_producto=:id_producto;");
    $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function Delete($id_producto){
    $this->connect();
    $stmt = $this->conn->prepare("DELETE FROM productos
    WHERE id_producto=:id_producto;");
    $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}

function Update($id_producto, $datos){
    $this->connect(); 
    $nombre_archivo=$this->upload('productos');
    if($nombre_archivo){
        $stmt=$this->conn->prepare("UPDATE productos SET 
        nombre=:nombre,
        descripcion=:descripcion,
        precio=:precio,
        costo=:costo,
        id_marca=:id_marca,
        id_categoria=:id_categoria,
        fotografia=:fotografia      
        WHERE id_producto=:id_producto;");
        $stmt->bindParam(':fotografia', $nombre_archivo, PDO::PARAM_STR);
    } else {
        $stmt=$this->conn->prepare("UPDATE productos SET 
        nombre=:nombre,
        descripcion=:descripcion,
        precio=:precio,
        costo=:costo,
        id_marca=:id_marca,
        id_categoria=:id_categoria      
        WHERE id_producto=:id_producto;");
    }
    $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
    $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
    $stmt->bindParam(':precio', $datos['precio'], PDO::PARAM_INT);
    $stmt->bindParam(':costo', $datos['costo'], PDO::PARAM_INT);
    $stmt->bindParam(':id_marca', $datos['id_marca'], PDO::PARAM_INT);
    $stmt->bindParam(':id_categoria', $datos['id_categoria'], PDO::PARAM_INT);
    $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}


    function validateProducto($datos){
        if(empty($datos['nombre'])){
            return false;
        }
        if(empty($datos['precio'])){
            return false;
        }
        if(empty($datos['costo'])){
            return false;
        }
        return true;
    }
   
}
