<?php

function validarCampo($variable){
    if(trim($variable) == ''){
       return false;
    }else{
       return true;
    }
 }

function validarNombreApellido($name){
	//SI longitud pero NO solo caracteres A-z
	if(!preg_match("/^[a-zA-Z]+$/", $name)){
            return 1;}
	//longitud
	else if(strlen($name) < 3){
            return 2;}
	// SI longitud, SI caracteres A-z
	
    return 0;
}


function validarEntero($valor){
    if(filter_var($valor, FILTER_VALIDATE_INT) === FALSE){
       return false;
    }else{
       return true;
    }
 }

 function rangoDocumento($documento){
     if($documento>1000000 and $documento<99999999){
         return true;
     }
     return false;
     
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
    if($fecha1>$fecha2){
        return true;
        
    }
    return false;
    
}
