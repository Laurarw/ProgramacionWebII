<?php
@session_start();
require_once 'funciones.php';
require_once 'conexionBD.php';
date_default_timezone_set('UTC');

$ejemplares = array ('A','B','C','D','E');
$errores=  [];
if(isset($_POST["enviar"])){
   $_SESSION['fechaNacimiento']=$_POST['fechaNacimiento'];
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
                
               
       if($_SESSION['fechaNacimiento']==NULL){
                     $errores['fechaNacimiento']='Debe ingresar su fecha de nacimiento';
                 }elseif(fechaValida( $fechaEmision,$_SESSION['fechaNacimiento'])){
                     $errores['fechaNacimiento']='la fecha de su nacimiento no puede ser mayor a la fecha actual';

                 }else{
                     $errores['fechaNacimiento']='';
                 }
    $_SESSION["errores"]=$errores; 
      
    if(empty($errores)){
           
              header('Location: datosCorrectos.php');
          }else{
                
              header('Location: index.php');
          }
}

if(isset($_POST["logear"])){    
            
             $errMsg = '';
         //username and password sent from Form
         $usuario = trim($_POST['usuario']);
         $pass = trim($_POST['pass']);

         if($usuario == '')
             {$errMsg .= 'Debes ingresar tu nombre de usuario<br>';}

         if($pass == '')
             {$errMsg .= 'Debes ingresar tu contraseña<br>';}


         if($errMsg == ''){
                    $records = $con->prepare('SELECT * FROM usuarios WHERE nombre= :usuario AND pass= :pass")');
                    $records->bindParam(':usuario', $usuario);
                    $records->bindParam(':pass', $pass);
                
                    $records->execute();
                    $results = $records->fetch(PDO::FETCH_NUM);
                    
                    if(count($results) == 1 ){
                        
                            $_SESSION['usuario'] = $usuario;
                          //  $_SESSION['usuario']='jj';
                           // $_SESSION['mensajelogin']= "<label>Usuario conectado: ".$_SESSION['usuario']."</label>";
                            header('Location: index.php');
                            exit;
                    }else{
                            $errMsg .= 'Usuario y contraseña no se econtraron<br>';
                    }
         }
 }




