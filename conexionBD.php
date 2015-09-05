<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'datosde_DB.php';
try {
    $con = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //echo "Conexion exitosa!";
}catch (PDOException $e) {
    echo "¡Error!: " . $e->getMessage() . "
    ";
    die();
}
//$con =null;

