<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();


require_once 'funciones.php';





?>

<html>
    <head>
        <title> Formulario Valido </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
    <strong>Los datos de <?php echo "  ".$_SESSION['nombre']." con el DNI ".$_SESSION['documento']."  "  ?>han sido enviados correctamente </strong>
    <strong>Total de resultados es de <?php echo $_SESSION['totalPersonas'] ?></strong>
  
        <table >
                 <thead>
                   <tr>

                          <th>Nombre</th>
                            <th>Apellido</th>
                             <th>Sexo</th>
                              <th>Nacionalidad</th>
                             <th>Ejemplar</th>
                              <th>Fecha Nacimiento</th>
                            <th>Fecha de Emicion</th>
                            <th>Fecha de Vencimiento</th>
                             <th>Documento</th>
                              <th>Domicilio</th>
                        </tr>
               </thead>
               <tbody>
                   <?php      //resultados de registros   
                          include_once  'paginacion.php'; 
                    ?>
     </tbody>
          
</table>
    
    <form action="paginacion.php" method="get">
                        Criterio de búsqueda:
                        <input type="text" name="criterio" size="22" maxlength="150">
                        <input type="submit" name="buscar" value="Buscar">
                 </form> 
    
    
    
        </body>
</html>


