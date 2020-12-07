<?php

/* class Conexion extends PDO {

   public function __construct (){ 
        try {
            parent:: __construct("mysql:host=localhost; dbname=tickets", "root", "");
            parent::exec("set names utf8");

        } catch (PDOException $e){
            echo "ESTAMOS EXPERIMENTANDO PROBLEMAS... " . $e->getMessage();
            exit;
        }

    } 
} */

$host = "localhost";
$db = "tickets";
$usuariodb = "root";
$clave = "";

$tabla_db1 = "ticket";

error_reporting(0);

$conexion = new mysqli($host, $usuariodb, $clave, $db);

if ($conexion->connect_errno){
    echo "NUESTRO SITIO EXPERMIENTA FALLOS...";
    exit();
}

//if (isset($conn)){
//  echo 'DB IS CONNECTED';
//}*/

?>