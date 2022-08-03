<?php
include "config.php";

$servidor="localhost";
$usuario="root";
$contraseña="";
$nombre="tienda";

$servido="mysql:dbname=".$nombre.";host=".$servidor;

try {
    $pdo= new PDO($servido, $usuario, $contraseña,);
             
  
   

} catch (PDOException $e) {

    echo "fallo". $e;


}


?>