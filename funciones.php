<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

function campoVacio($variable){
    if(trim($variable) == '' or $variable=='0'){
       return true;
    }else{
       return false;
    }
 }

function validarNombreApellido($name,&$errores,$nombrecampo){
	//SI longitud pero NO solo caracteres A-z
	if(!preg_match("/^[a-z áéíóúñüàè]+$/i", $name)){
                        $errores[$nombrecampo]="solo caracteres";
                                                return;
           }
	//longitud
	else if(strlen($name) <= 1){
              $errores[$nombrecampo]="debe tener mas caracteres";
              return;
        }
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
    
         return;
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
        return false;
        
    }
    return TRUE;
    
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
function ejecutarQuery($db, $sql) {
   // require_once 'conexionBD.php';
        if(!$resultado = $db->query($sql)){
            die('There was an error running the query [' . $db->error . ']');
        }

        return $resultado;
    }
    
    function selectPaises($con,$valor){
     
        require_once 'conexionBD.php';
        
        
                        $sql = "SELECT idpaises, nombre FROM paises"; 
                       
                                $resultado = $con->query($sql); 
                                foreach ( $resultado as $rows) { 
                                      if($rows['idpaises']==$valor){
                                        
                                            echo '<option selected value="'.$rows['idpaises'].'">'.$rows['nombre'].'</option>';
                                           
                                        
                                      }else{
                                          echo '<option  value="'.$rows['idpaises'].'">'.$rows['nombre'].'</option>';
                                      }
                                }
  }
  
  function selectProvincias($con,$valorpais){
      
      require_once 'conexionBD.php';
        
        
                        $sql = "SELECT idprovincias, nombre,paisID FROM provincias WHERE paisID='$valorpais'"; 
                       
                                $resultado = $con->query($sql); 
                                foreach ( $resultado as $rows) { 
                                      if($rows['idprovincias']!=0){
                                         
                                            echo '<option selected value="'.$rows['idprovincias'].'">'.$rows['nombre'].'</option>';
                                          
                                      }else{
                                          echo '<option  value="'.$rows['idprovincias'].'">'.$rows['nombre'].'</option>';
                                      }
                                }
      
      
  }
  
  function guardarDatos ($con,$nombre,$apellidos,$sexo,$pais_nacimiento,$ejemplar,$fecha_nacimiento,$fecha_emicion,$fecha_vencimiento,$num_documento,$domicilio){
      require_once 'conexionBD.php';
      try {
        # Creamos la cadena sql
        $sql="INSERT INTO `personas`
            (
                `nombres`,`apellidos`,`sexo`,`pais_nacimientoID`,`provincia_nacimiento`,`ejemplar`,`fecha_nacimiento`,`fecha_emicion`,`fecha_vencimiento`,`num_documento`,`domicilio`,`provincias_residenciaID`,`ciudad_residencia`,`cuil`,`imagen`
            )VALUES(
               :nombres, :apellidos, :sexo, :pais_nacimientoID, :provincia_nacimiento, :ejemplar, :fecha_nacimiento, :fecha_emicion,:fecha_vencimiento, :num_documento, :domicilio, :provincias_residenciaID, :ciudad_residencia, :cuil, :imagen)";
        
        $sth=$con->prepare($sql);
        # Creamos el array con los valores a ser reemplazados en la cadena sql
        # En el textArea, reemplazamos los saltos de linea por <br> con la funcion
        # nl2br, para poder mostrarlos en la web.
        $arrayValores=array(
                ':nombres'=>$nombre,
                ':apellidos'=>$apellidos,
                ':sexo'=>$sexo,
                ':pais_nacimientoID'=>$pais_nacimiento,
             ':provincia_nacimiento'=>NULL,
                ':ejemplar'=>$ejemplar,
                ':fecha_nacimiento'=>$fecha_nacimiento,
                ':fecha_emicion'=>$fecha_emicion,
            ':fecha_vencimiento'=>$fecha_vencimiento,
             ':num_documento'=>$num_documento,
                ':domicilio'=>nl2br($domicilio),
                ':provincias_residenciaID'=>NULL,
                ':ciudad_residencia'=>NULL,
             ':cuil'=>NULL,
            ':imagen'=>NULL,
            );
          # Ejecutamos la consulta sql insertando los valores en la tabla
        $sth->execute($arrayValores);
        
        //echo "<pre>A&ntilde;adido con el ID: ".$con->lastInsertId()."</pre>";
        
    } catch(PDOException $err) {
        echo "<pre>".print_r($err,true)."</pre>";
        exit();
    }
}


