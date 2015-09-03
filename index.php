<!DOCTYPE html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
    session_start();
    require_once 'procesamientoDatos.php';
    require_once 'funciones.php';
    $errores=$_SESSION["errores"];
    session_destroy();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!--        <link rel="stylesheet" href="estilo.css" type="text/css">-->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        

        <title>Formulario</title>
    </head>
    <body>
         
        <H3> Ingresar los datos Del Documento Nacional de Identidad (DNI)</H3>
        <div class="container">  
            <form method="post" action= "procesamientoDatos.php">
                <div>
                    <label for="nombres">Nombres:</label>
                    <input type="text" name="nombres" placeholder="Ingresar nombres" value="<?php echo @$_SESSION['nombre']  ?>">
                   <?php     echo "<span style='color:#F00066'>". $errores[1]."</span>";      ?>
                    
                </div>
             <div>
                    <br><label for="apellidos">Apellidos:</label>
                    <input type="text" name="apellidos" placeholder="Ingresar apellidos" value="<?php echo @$_SESSION['apellido'] ?>">
                    <?php         echo "<span style='color:#F00066'>". $errores[2]."</span>";  ?>
                </div>
                
                 <div class="checkbox">
                    <br> <label for="sex">Sexo:</label>  
                        <?php  $sex_post=$_SESSION['sexo'];
                        if ($sex_post=='m'){
                           echo "<input type='radio' name='sex' value='m' checked>Masculino";
                           echo " <input type='radio' name='sex' value='f'>Femenino";
                        }elseif ($sex_post == 'f') {
                              echo "<input type='radio' name='sex' value='m'>Masculino";
                              echo " <input type='radio' name='sex' value='f' checked>Femenino";
                         }
                         else{
                                   echo "<input type='radio' name='sex' value='m'>Masculino";
                                   echo" <input type='radio' name='sex' value='f'>Femenino";
                         }  
                         echo "<span style='color:#F00066'>". $errores[3]."</span>"; ?>

                    
                </div>
<!--             <div>
                    <br> <label for="nacionalidad">Nacionalidad:</label><br>
                    <select name="nacionalidad" onchange="sumit()">				
                        <option value="pais">Seleccionar</option>
                    </select>   
                </div>
                <div>
                    <br> <label for="provinciaResidencia">Provincia en la que reside:</label><br>
                    <select name="provinciaResidencia" onchange="sumit()">				
                        <option value="provincia">Seleccionar</option>
                    </select>
                    <br> <label for="ciudadResidencia">Ciudad en la que reside:</label><br>
                    <select name="ciudadResidencia" onchange="sumit()">				
                        <option value="ciudad">Seleccionar</option>
                    </select>
                </div>
-->               
               <div>
                    <br><label for="ejemplar">Ejemplar:</label>
                    <select name="ejemplar" onchange="sumit()">	
                      <?php if($_SESSION['ejemplar'] =='') {
                          echo "<option value='' >Seleccionar Ejemplar</option>";
                           cargarSelect($ejemplares,@$_SESSION['ejemplar']) ;
                      }else{
                        cargarSelect($ejemplares,@$_SESSION['ejemplar']) ;
                      }
                      ?>
                   </select>
                    <?php         echo "<span style='color:#F00066'>". $errores[6]."</span>";  ?>
                </div>

                <div>			
                    <br><label for="fechaNacimiento">Fecha de Nacimiento</label>
                    <input type= "date" name="fechaNacimiento" value="<?php echo @$_SESSION['fechaNacimiento'] ?>" >
                    <?php         echo "<span style='color:#F00066'>". $errores[7]."</span>";  ?>
                </div>	
                
                <div>
                    <br><label for="documento">Numero de Documento:</label>
                    <input type="number" name="documento" placeholder="Ingresar documento" value="<?php echo @$_SESSION['documento'] ?>">
                     <?php         echo "<span style='color:#F00066'>". $errores[4]."</span>";  ?>
                </div>	
                <div>
                    <br><label for="domicilio">Domicilio:</label>
                    <input type="text" name="domicilio" placeholder="Ingresar domicilio" value="<?php echo $_SESSION['domicilio'] ?>">
                      <?php         echo "<span style='color:#F00066'>". $errores[5]."</span>";  ?>
                </div>
<!--                <div>
                    <br><H4> Adjunte su foto</H4>
                    <input type="file" name="foto" multiple ><br>
                </div>-->
                <input type="submit" name="enviar" value= "Enviar" />
                			      
            </form>
        </div>

    </body>
</html>
