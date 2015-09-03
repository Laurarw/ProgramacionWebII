
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once 'procesamientoDatos.php';

?>
<html>
    <head>
        <title> Formulario Valido </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
    <strong> Sus datos han sido enviados correctamente </strong>
    Nombre: <?php  echo $_SESSION['nombre'];?>
    Apellido <?php  echo $_SESSION['apellido'];
    //aca van los datos
    
    ?>
    
    
    </body>
</html>

