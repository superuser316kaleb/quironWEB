<?php include __DIR__."/header.php"; 
include __DIR__."/gestion/cita.class.php"; 
$app = new Citas();
$cita = $_POST;
$alerta=new Sistema();
if($app->Insert($cita)){
    $alerta->alert('success','Cita guardada');
}else{
   $alerta->alert('danger','Error al guardar la cita');
}
?>