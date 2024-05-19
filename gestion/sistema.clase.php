<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require (__DIR__.'/config.php');
class Sistema extends Config{
var $conn;    
var $count=0;
    function connect(){
    $this->conn = new PDO(DB_DRIVER.":host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    
    }
    function setCount($count){
        $this->count=$count;
        
    }
    function getCount(){
        return $this->count;
    }
    function query($sql){
        $this->connect();
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $datos= array();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        return $datos;
    }
    function alert($tipo,$mensaje){
        $alerta=array();
        $alerta['tipo']=$tipo;
        $alerta['mensaje']=$mensaje;
        include (__DIR__.'/vistas/alerta.php');
    }
    function upload($carpeta){
        if(in_array($_FILES['fotografia']['type'],$this->getImageType())){
            if($_FILES['fotografia']['size']<=$this->getImageSize()){
                $n=rand(1,1000000);
                $nombre_archivo=$n.$_FILES['fotografia']['size'].$_FILES['fotografia']['name'];
                $nombre_archivo=md5($nombre_archivo);
                $extension=explode('.',$_FILES['fotografia']['name']);
                $extension=$extension[sizeof($extension)-1];
                $nombre_archivo=$nombre_archivo.".".$extension;
                if(!file_exists('../images/'.$carpeta.'/'.$nombre_archivo)){
                move_uploaded_file($_FILES['fotografia']['tmp_name'],'../images/'.$carpeta.'/'.$nombre_archivo);
                return $nombre_archivo;
                }       
            }
        }
        return false;
    }
    function checkPrivilegio($privilegio, $kill=false) {
     if (isset($_SESSION['privilegios']) && isset($_SESSION['validado'])) {
         if (in_array($privilegio, $_SESSION['privilegios'])) {
             return true;
         }
     }
     if ($kill) {
         $this->logout();
         $this->alert('danger', 'Permiso Denegado de Privilegio');
         die;
     }
 
     return false;
 }
 function checkRole($rol, $kill=false) {
     if (isset($_SESSION['roles']) && isset($_SESSION['validado'])) {
         if (in_array($rol, $_SESSION['roles'])) {
             return true;
         }
     }
     if ($kill) {
         $this->logout();
         $this->alert('danger', 'Permiso Denegado de Rol');
         die;
     }
     return false;
 }
    function logout(){
        if(!isset($_SESSION['cart'])){
            unset($_SESSION);
            session_destroy();
        }else{
            unset($_SESSION['validado']);
            unset($_SESSION['correo']);
            unset($_SESSION['roles']);
            unset($_SESSION['privilegios']);
        }
    }
    function login($correo,$contrasena){
        $this->connect();
        $sql="select * from usuarios
        where correo=:correo;";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->execute();
        $datos=array();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $hash=$datos[0]['contrasena'];
        if(password_verify($contrasena,$hash)){//si existe el dato
            $roles=array();
            $roles=$this->getRol($correo);
            $privilegios=array();
            $privilegios=$this->getPrivilegio($correo);
            $_SESSION['validado']=true;
            $_SESSION['correo']=$correo;
            $_SESSION['roles']=$roles;
            $_SESSION['privilegios']=$privilegios;
            $_SESSION['id_usuario']=$datos[0]['id_usuario'];
            return $datos[0];
        }else{
            $this->logout();
        }
        return false;    
    }

    function getRol($correo){
        $this->connect();
        $sql="SELECT  r.rol
        from usuarios u join usuario_rol ur on u.id_usuario = ur.id_usuario
        join roles r on ur.id_rol = r.id_rol
        where u.correo='".$correo."';";
        $datos= $this->query($sql);
        $info=array();
        foreach($datos as $row)
            array_push($info,$row['rol']);
        return $info;
    }
    function getPrivilegio($correo){
        $this->connect();
        $sql="SELECT p.privilegio
        from usuarios u 
        join usuario_rol ur on u.id_usuario = ur.id_usuario
        join rol_privilegio rp on ur.id_rol = rp.id_rol
        join privilegios p on rp.id_privilegio = p.id_privilegio
        where u.correo='".$correo."';";
        $datos= $this->query($sql);
        $info=array();
        foreach($datos as $row)
            array_push($info,$row['privilegio']);
        return $info;
    }
    function reset($correo){
            if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
                $this->connect();
                $sql="SELECT correo, contrasena,token, nombre from usuarios
                where correo = :correo";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':correo', $correo,PDO::PARAM_STR);
                $stmt->execute();
                $datos=array();
                $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
                $datos = $stmt->fetchAll();
                if(isset($datos[0])){
                    $token1 = md5($correo.'Al34t0ry');
                    $token2 = md5($correo.date('Y-m-d H-i-s').rand(1,100000));
                    $token = $token1 . $token2;
                    $sql = "UPDATE usuarios SET token=:token where correo=:correo";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(':token', $token,PDO::PARAM_STR);
                    $stmt->bindParam(':correo', $correo,PDO::PARAM_STR);
                    $stmt->execute();
                    $destinatario=$correo;
                    $nombre_persona=$datos[0]['nombre'];
                    $asunto='Recuperacion de contraseña';
                    $mensaje='Hola '.$nombre_persona.'<br>
                    Se te ha enviado un correo para recuperar tu contraseña. <br>
                    Si no ha recibido este correo por favor ignora este mensaje.<br>
                    <a href="http://localhost/quiron/gestion/login.php?action=recovery&token='.$token.'">Recuperar contraseña</a><br>
                    Muchas gracias <br>
                    Atentamente: La Ferreteria';
                    if($this->sendMail($destinatario,$nombre_persona,$asunto,$mensaje)){
                        return true;
                    }else{ 
                        return false;
                    }
                }
            }
        }
    function sendMail($destinatario,$nombre_persona,$asunto,$mensaje){
        require __DIR__.'/../vendor/autoload.php'; 
        $mail = new PHPMailer();
        $mail->isSMTP();
        //Enable SMTP debugging 
        //SMTP::DEBUG_OFF = off (for production use)
        //SMTP::DEBUG_CLIENT = client messages
        //SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        //Set the SMTP port number:
        // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
        // - 587 for SMTP+STARTTLS
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = '21030839@itcelaya.edu.mx';
        $mail->Password = 'wgoz vqbc kjji vkxp';
        $mail->setFrom('21030839@itcelaya.edu.mx', 'First Last');
        $mail->addReplyTo('replyto@example.com', 'First Last');
        $mail->addAddress($destinatario, $nombre_persona);
        $mail->Subject = $asunto;
        $mail->msgHTML($mensaje);
        //$mail->AltBody = 'This is a plain-text message body';
        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }

    }

 function recovery($token,$contrasena=null){
            $this->connect();
            if(strlen($token)==64){
                $sql="SELECT * from usuarios where token = :token";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':token', $token,PDO::PARAM_STR);
                $stmt->execute();
                $datos=array();
                $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
                $datos = $stmt->fetchAll();
                if(isset($datos[0])){
                    if(!is_null($contrasena)){
                        $contrasena=password_hash($contrasena,PASSWORD_DEFAULT);
                        $correo=$datos[0]['correo'];
                        $sql='UPDATE usuarios set contrasena = :contrasena, token=null where correo = :correo';
                        $stmt=$this->conn->prepare($sql);
                        $stmt->bindParam(':contrasena',$contrasena,PDO::PARAM_STR);
                        $stmt->bindParam(':correo',$correo,PDO::PARAM_STR);
                        $stmt->execute();
                    }
                    return true;
                }
            }
        }
   function register($datos){
    if (!filter_var($datos['correo'], FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    $this->connect();

    try {
        $this->conn->beginTransaction();
        
        // Check if the email already exists
        $sql = 'SELECT * FROM usuarios WHERE correo = :correo';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($usuario) {
            $this->conn->rollBack();
            return false;
        }

        // Insert new user
        $sql = 'INSERT INTO usuarios (correo, contrasena, nombre, primer_apellido, segundo_apellido, numero_telefonico, direccion) 
                VALUES (:correo, :contrasena, :nombre, :primer_apellido, :segundo_apellido, :numero_telefonico, :direccion)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':numero_telefonico', $datos['numero_telefonico'], PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $datos['direccion'], PDO::PARAM_STR);
        
        // Encrypt password
        $contrasena = password_hash($datos['contrasena'], PASSWORD_DEFAULT);
        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
        $stmt->execute();

        // Get the new user ID
        $sql = 'SELECT * FROM usuarios WHERE correo = :correo';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($usuario) {
            $id_usuario = $usuario['id_usuario'];

            // Assign role to the new user
            $sql = 'INSERT INTO usuario_rol (id_usuario, id_rol) VALUES (:id_usuario, 1)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();

            // Verify the user-role insertion
            $sql = 'SELECT * FROM usuarios WHERE id_usuario = :id_usuario';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            $info = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($info) {
                $this->conn->commit();
                return true;
            }
        }

        // Rollback if any step fails
        $this->conn->rollBack();
        return false;
    } catch (PDOException $e) {
        $this->conn->rollBack();
        return false;
    }
}


    public function validateEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

}
?>
