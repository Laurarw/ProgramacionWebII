<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
//session_start();

function campoVacio($variable){
    if(trim($variable) == ''){
       return true;
    }else{
       return false;
    }
 }

function validarNombreApellido($name,&$errores,$nombrecampo){
	//SI longitud pero NO solo caracteres A-z
	if(!preg_match("/^[a-zA-Z]+$/", $name)){
                        $errores[$nombrecampo]="solo caracteres";
           }
	//longitud
	else if(strlen($name) <= 1){
              $errores[$nombrecampo]="debe tener mas caracteres";}
	// SI longitud, SI caracteres A-z
	
  
}


function validarEntero($valor){
    if(filter_var($valor, FILTER_VALIDATE_INT) === FALSE){
       return false;
    }else{
       return true;
    }
 }

 function rangoDocumento($documento,&$errores){
     if($documento>1000000 and $documento<99999999){
       $errores['documento']='';
     }else{
    
      $errores['documento']='su documento no esta en rango';
     }
 }
 
 function cargarSelect($array,$valor){
    foreach ($array as $objeto){
       if($objeto==$valor){
           echo "<option selected  value=".$objeto.">".$objeto."</option>";
       }
            echo "<option  value=".$objeto.">".$objeto."</option>";
     }
}

function fechaValida($fecha1,$fecha2){
    if($fecha1>=$fecha2){
        return true;
        
    }
    return false;
    
}
function valoresDeCampos(&$variableSession,$variablePost,&$errores,$nombrecampo){
    
    if(campoVacio($variablePost)){
      
        $errores[$nombrecampo]="El campo no debe estar vacio. Completelo porfavor";
        $variableSession='';
      
    }else{
         
       $variableSession=$variablePost;
       if($nombrecampo=='nombre' ||$nombrecampo== 'apellido'){
                 validarNombreApellido($variableSession, $errores, $nombrecampo);
       }
       if($nombrecampo=='documento'){
           rangoDocumento($variableSession,$errores);
       }
    }
    
}