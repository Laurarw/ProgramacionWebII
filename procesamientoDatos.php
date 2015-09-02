<?php
session_start();
require_once 'funciones.php';
date_default_timezone_set('UTC');

$ejemplares = array ('A','B','C','D','E');



if(isset($_POST["enviar"])){
  
                    $apellidos = trim($_POST["apellidos"]); 
                    $nombres =trim($_POST["nombres"]);
                    $sexo = trim($_POST["sex"]);
                    $ejemplar =($_POST["ejemplar"]);
                    $domicilio =trim($_POST["domicilio"]);
                    $documento = ($_POST["documento"]);
//                $paisNacimiento=trim($_POST["nnacionalidad"]);
//                $provinciaNacimiento=trim($_POST["provinciaNacimiento"]);
//                $ciudadNacimiento=trim($_POST["ciudadNacimiento"]);
                   $fechaNacimiento=trim($_POST["fechaNacimiento"]);
//                $provinciaRecidencia= trim($_POST["provinciaRecidencia"]);
//                $ciudadRecidencia=trim($_POST["ciudadRecidencia"]);
//                $fechaEmision=date("Y-m-d");
                   $fechaVencimiento=strtotime ( '+15 year' , strtotime( $fechaEmision ) ) ;
                   $fechaVencimiento = date ( 'Y-m-j' , $fechaVencimiento );

                    $errores=  [];



    

                    if (!validarCampo($nombres)) {

                          $errores[1]='Nombre no puede quedar en blanco. Por favor ingrese su nombre';
                    }elseif(validarNombreApellido($nombres)==1){
                         $errores[1] ='EL nombre solo debe contener letras';
                       }
                   elseif(validarNombreApellido($nombres)==2){
                         $errores[1] ='EL nombre debe tener mas de 2 caracteres';
                        
                     }

                     if ((!validarCampo($apellidos))) {
                   $errores[2]='apellidos no puede quedar en blanco. Por favor ingrese su nombre';

                  }else
                      if (validarNombreApellido($apellidos)==1) {
                          $errores[2] ='EL apellido solo debe contener letras';
                       }  elseif(validarNombreApellido($apellidos)==2){
                         $errores[2] ='EL apellido debe tener mas de 2 caracteres';
                       }
                        if ((!validarCampo($sexo))) {
                   $errores[3]='No puede dejar el campo sexo sin contestar';

                  }
                  if((!validarCampo($documento))){
                      $errores[4]='Debe ingresar su documento';
                  }elseif((!rangoDocumento ($documento))){
                      $errores[4]='revise la cantidad de digitos de su documento';
                      } 

                 if((!validarCampo($domicilio))){
                     $errores[5]='Debe ingresar su domicilio';
                 }
                  if((!validarCampo($ejemplar))){
                     $errores[6]='Debe ingresar un ejemplar';
                 }
                 if($fechaNacimiento==NULL){
                     $errores[7]='Debe ingresar su fecha de nacimiento';
                 }elseif(fechaValida( $fechaEmision,$fechaNacimiento)){
                     $errores[7]='la fecha de su nacimiento no puede ser mayor a la fecha actual';

                 }




              $_SESSION["errores"]=$errores; 
              $_SESSION["nombre"]=$nombres;
              $_SESSION["apellido"]=$apellidos;
              $_SESSION["sexo"]=$sexo;
              $_SESSION["documento"]=$documento;
               $_SESSION["domicilio"]=$domicilio;
               $_SESSION["ejemplar"]=$ejemplar;
               $_SESSION["fechaNacimiento"]=$fechaNacimiento;
               $_SESSION["fechaEmision"]= $fechaEmision;
               $_SESSION["fechaVencimiento"]=$fechaVencimiento;

              header('Location: index.php');
               
          if(empty($errores)){
              header('Location: datosCorrectos.php');
          }
}



