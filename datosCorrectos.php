<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
//require_once 'procesamientoDatos.php';?>
<html>
    <head>
        <title> Formulario Valido </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
    <strong> Sus datos han sido enviados correctamente </strong>
    
   <br>
   <br>
   <br>
               
     <?php  echo "<br>Nombre:". $_SESSION['nombre'].
             "<br>Apellido".$_SESSION['apellido'].
             "<br>Sexo:".$_SESSION['sexo'].
             "<br>Nacionalidad: ".$_SESSION['pais'].
             "<br>Ejemplar: ".$_SESSION['ejemplar'].
             "<br>Fecha de Nacimiento: ".$_SESSION['fechaNacimiento'].
             "<br>Fecha de Emicion: ".$_SESSION['fechaEmision'].
             "<br>Fecha de Vencimiento: ". $_SESSION['fechaVencimiento'].
             "<br>Documento: ".$_SESSION['documento'].
             "<br>Domicilio: ".$_SESSION['domicilio']
             
             ;
    
    //aca van los datos
    
    ?>
    
    </body>
</html>

