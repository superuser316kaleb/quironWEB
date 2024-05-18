<?php
session_start();
define('DB_DRIVER','pgsql');
define('DB_HOST','localhost');
define('DB_NAME','quiron');
define('DB_USER','administrador_quiron');
define('DB_PASSWORD','123');
define('DB_PORT','5432');

Class Config{
function getImageSize(){
return 512000;  
} 
function getImageType(){
return $image['type']=array('image/jpeg','image/png','image/gif','image/jpg');  
}
}
?>