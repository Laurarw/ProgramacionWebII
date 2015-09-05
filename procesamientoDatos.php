<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
@session_start();
require_once 'funciones.php';
require_once 'conexionBD.php';
//date_default_timezone_set('UTC-8');

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
              exit();
          }else{
                
              header('Location: index.php');
              exit();
          }
}

if(isset($_POST["logear"])){    
            
          $_SESSION['errMsg'] = '';
         //username and password sent from Form
         $usuario = trim($_POST['usuario']);
         $pass = trim($_POST['pass']);

         if($usuario == '')
             {$_SESSION['errMsg']  .= 'Debes ingresar tu nombre de usuario<br>';}

         if($pass == '')
             {$_SESSION['errMsg']  .= 'Debes ingresar tu contraseña<br>';}


         if($_SESSION['errMsg']  == ''){
                    $records = $con->prepare('SELECT  nombre FROM usuarios WHERE nombre= :usuario AND pass= :pass');
                    $records->bindParam(':usuario', $usuario);
                    $records->bindParam(':pass', $pass);                
                    $records->execute();
                    //$results = $records->fetch(PDO::FETCH_ASSOC);
                    
                   // if(count($results) >0 ){
                        if($records = $records->fetch(PDO::FETCH_ASSOC)){
                            $_SESSION['usuario'] = $usuario;
                        
                           // $_SESSION['mensajelogin']= "<label>Usuario conectado: ".$_SESSION['usuario']."</label>";
                            header('Location: index.php');
                            exit();
                    }else{
                            $_SESSION['errMsg']  .= 'Usuario y contraseña no se econtraron<br>';
                            header('Location: login.php');
                            exit();
                    }
         }else{
             header('Location: login.php');
             exit();
         }
 }




