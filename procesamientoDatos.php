<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
session_start();
require_once 'funciones.php';

date_default_timezone_set('UTC');

$ejemplares = array ('A','B','C','D','E');
$errores=  [];

 
 


if(isset($_POST["enviar"])){
  
    valoresDeCampos($_SESSION['nombre'], $_POST['nombres'], $errores,'nombre');
     valoresDeCampos($_SESSION['apellido'], $_POST['apellidos'], $errores,'apellido');
     valoresDeCampos($_SESSION['sexo'], $_POST['sex'], $errores,'sexo');
     valoresDeCampos($_SESSION['documento'], $_POST['documento'], $errores,'documento');
     valoresDeCampos($_SESSION['sexo'], $_POST['sex'], $errores,'sexo');
      valoresDeCampos($_SESSION['domicilio'], $_POST['domicilio'], $errores,'domicilio');
       valoresDeCampos($_SESSION['ejemplar'], $_POST['ejemplar'], $errores,'ejemplar');
         $fechaEmision=date("Y-m-d");
                $fechaVencimiento=strtotime ( '+15 year' , strtotime( $fechaEmision ) ) ;
                $fechaVencimiento = date ( 'Y-m-j' , $fechaVencimiento );
       if($fechaNacimiento==NULL){
                     $errores[7]='Debe ingresar su fecha de nacimiento';
                 }elseif(fechaValida( $fechaEmision,$fechaNacimiento)){
                     $errores[7]='la fecha de su nacimiento no puede ser mayor a la fecha actual';

                 }
    $_SESSION["errores"]=$errores; 
      
    if(empty($errores)){
           
              header('Location: datosCorrectos.php');
          }else{
                
              header('Location: index.php');
          }
}



