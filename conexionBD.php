<?php require_once 'datosde_DB.php';
try {
    $con = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    //$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //echo "Conexion exitosa!";
}catch (PDOException $e) {
    echo "¡Error!: " . $e->getMessage() . "
    ";
    die();
}
//$con =null;

