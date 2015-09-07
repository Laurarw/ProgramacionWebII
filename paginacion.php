<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'conexionBD.php';
require_once 'funciones.php';

$resultado=  ejecutarQuery($con,"SELECT * FROM personas" );

$total_resultados=$resultado->rowCount();
$_SESSION['totalPersonas']=$total_resultados;
$url="http://localhost/Formulario/datosCorrectos.php";



if ($total_resultados > 0) {
	//Limito la busqueda
	$TAMANO_PAGINA = 5;
        $pagina = false;

	//examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
        
	if (!$pagina) {
		$inicio = 0;
		$pagina = 1;
	}
	else {
		$inicio = ($pagina - 1) * $TAMANO_PAGINA;
	}
	//calculo el total de paginas
	$total_paginas = ceil($total_resultados / $TAMANO_PAGINA);

	

	//pongo el numero de registros total, el tamaño de pagina y la pagina que se muestra
	
	$consulta = "SELECT * FROM personas ORDER BY nombres DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
	
                     $registros_personas=  ejecutarQuery($con,$consulta );
                     
                
                
                  foreach ($registros_personas as $rows)
                            {
                             echo "<tr>";
                            echo "<td>". $rows['nombres']."</td>
                             <td>".$rows['apellidos']."</td>
                             <td>".$rows['sexo']."</td>
                             <td> ".$rows['pais_nacimientoID'].
                             "<td> ".$rows['ejemplar']."</td>
                             <td> ".$rows['fecha_nacimiento']."</td>
                             <td> ".$rows['fecha_emicion']."</td>
                            <td> ". $rows['fecha_vencimiento']."</td>
                             <td> ".$rows['num_documento']."</td>
                             <td> ".$rows['domicilio']."</td>";
                              echo "</tr>";

                            }
                            
                            if(isset($_POST["buscar"])){   
                                
                            }



	echo '<p>';

	if ($total_paginas > 1) {
		if ($pagina != 1)
                                                    {echo '<a href="'.$url.'?pagina='.($pagina-1).'"></a>';}
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				//si muestro el indice de la pagina actual, no coloco enlace
                                                                        {echo $pagina;}
			else{
				//si el indice no corresponde con la pagina mostrada actualmente,
				//coloco el enlace para ir a esa pagina
                                                                    echo '  <a href="'.$url.'?pagina='.$i.'">'.$i.'</a>  ';}
		}
		if ($pagina != $total_paginas){
                                                          echo '<a href="'.$url.'?pagina='.($pagina+1).'"></a>';}
	}
	echo '</p>';
}else{
    echo 'No hay registros para mostrar';
}
 
