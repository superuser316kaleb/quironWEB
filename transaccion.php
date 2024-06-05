<?php
//include __DIR__.'/gestion/sistema.clase.php';
include __DIR__.'/header.php';
$datos=$_POST;
$app=new Sistema;
$app->checkRole('Cliente');
try{
    //CONEXIÓN a la base de datos
    $app->connect();
    //Iniciar transacción
    $app->conn->beginTransaction();
    //PRREGUNTAR si existe el carrito en session
    if(isset($_SESSION['cart'])){
        $id_usuario=$_SESSION['id_usuario'];
        $correo=$_SESSION['correo'];
        if(isset($id_usuario)){
            $sql="insert into venta(id_usuario, fecha) 
            VALUES (:id_usuario,now());";
            $stmt=$app->conn->prepare($sql);
            $stmt->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
            $stmt->execute();
            $filas=$stmt->rowCount();
            if($filas){
                $sql="select v.id_venta from venta v
                where v.id_usuario=:id_usuario
                order by 1
                desc limit 1;";
                $stmt=$app->conn->prepare($sql);
                $stmt->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $venta=$stmt->fetchAll();
                if(isset($venta[0])){
                    $id_venta=$venta[0]['id_venta'];
                    $carrito=$_SESSION['cart'];
                    $filas=0;
                    foreach($carrito as $key=>$value){
                        $id_producto=$key;
                        $cantidad=$value;
                        $sql="insert into venta_detalle(id_venta, id_producto, 
                        cantidad) values (:id_venta,:id_producto,:cantidad);";
                        $stmt=$app->conn->prepare($sql);
                        $stmt->bindParam(':id_venta',$id_venta,PDO::PARAM_INT);
                        $stmt->bindParam(':id_producto',$id_producto,PDO::PARAM_INT);
                        $stmt->bindParam(':cantidad',$cantidad,PDO::PARAM_INT);
                        $stmt->execute();
                        $filas+=$stmt->rowCount();
                    }
                if($filas){
                    $app->conn->commit();
                    unset($_SESSION['cart']);
                    $app->alert('success','Venta realizada');
                    $sql="SELECT concat(nombre,' ',primer_apellido,' ',segundo_apellido)as nombre,
                    correo 
                    from usuarios    
                    where correo=:correo;";
                    $stmt=$app->conn->prepare($sql);
                    $stmt->bindParam(':correo',$correo,PDO::PARAM_STR);
                    $stmt->execute();
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $cliente=$stmt->fetchAll();
                    $nombre=$cliente[0]['nombre'];
                    $app->alert('success','Su pago y venta fueron realizados con éxito');
                    $mensaje="Estimado $nombre, su compra ha sido realizada con éxito, 
                    puedes recoger tu pedido en nuestra tienda. Muchas Gracias.";
                    $app->sendMail($correo,$nombre,"Compra realizada con éxito",$mensaje);

                }else{
                    $app->alert('danger','No se pudo completar la compra');
                    $app->conn->rollBack();
                }
                }else{
                    $app->alert('danger','No se pudo completar la compra');
                    $app->conn->rollBack();
                }
            }else{
                $app->alert('danger','Tu compra no se pudo realizar');
                $app->conn->rollBack();
            }
        }else{
            $app->alert('danger','No esta registrado como cliente');
            $app->conn->rollBack();
        }
            
    }else{
        $app->alert('danger','El carrito está vacío');
        $app->conn->rollBack();
    }

}catch(Exception $e){
    echo $e->getMessage();
    $app->conn->rollBack();
}
?>