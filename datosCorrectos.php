<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once 'conexionBD.php';
require_once 'funciones.php';
//require_once 'procesamientoDatos.php';
$sql="SELECT * FROM personas"; 


$resultado = $con->query($sql); 
?>
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
   
   <table >
                <thead>
                        <tr>
<!--                                <th>id</th>-->
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
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>

                   </tr>
                </tfoot>
                <tbody>
                    <?php  
                  foreach ($resultado as $rows)
                            {
                             echo "<tr>";
                            echo "<td>". $rows['nombres']."</td>
                             <td>".$rows['apellidos']."</td>
                             <td>".$rows['sexo']."</td>
                             <td> ".$rows['pais_nacimientoID'].
                             "<td> ".$rows['ejemplar']."</td>
                             <td> ".$rows['fecha_nacimiento']."</td>
                             <td> ".$_SESSION['fechaEmision']."</td>
                            <td> ". $_SESSION['fechaVencimiento']."</td>
                             <td> ".$rows['num_documento']."</td>
                             <td> ".$rows['domicilio']."</td>";
                              echo "</tr>";

                            }


                    //aca van los datos

                    ?>

                <tbody>
</table>

    </body>
</html>

