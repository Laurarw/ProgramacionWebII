<!DOCTYPE html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
@session_start();
  //require 'login.php';
    require_once 'procesamientoDatos.php';
    require_once 'funciones.php';
    @$errores=$_SESSION["errores"];
    
    session_destroy();?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--               <link rel="stylesheet" href="estilo.css" type="text/css">-->
 
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        

        <title>Formulario</title>
        
        
       

    </head>
    <body>
        
        <H3> Ingresar los datos Del Documento Nacional de Identidad (DNI)</H3>
      <?php echo 'Usuario conectado: '.@$_SESSION['usuario'];?>
        
        <div class="container">  
            <form method="post" action= "procesamientoDatos.php">
                <div>
                    <label for="nombres">Nombres:</label>
                    <input type="text" name="nombres" placeholder="Ingresar nombres" value="<?php echo @$_SESSION['nombre']?>">
                   <?php echo    "<span style='color:#F00066'>". @$errores['nombre']."</span>";?>
                    
                </div>
             <div>
                    <br><label for="apellidos">Apellidos:</label>
                    <input type="text" name="apellidos" placeholder="Ingresar apellidos" value="<?php echo @$_SESSION['apellido'] ?>">
                    <?php echo "<span style='color:#F00066'>". @$errores['apellido']."</span>";?>
                </div>
                
                <div class="checkbox">
                    <br> <label for="sex">Sexo:</label>  
                        <?php  $sex_post=@$_SESSION['sexo'];
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
                         echo "<span style='color:#F00066'>". @$errores['sexo']."</span>";?>

                    
                  </div>
                <div>
                    <br> <label for="pais" >Nacionalidad:</label><br>
                    <select id="pais" name="pais">				
                       <option value='0'>Seleccionar</option>;
                         <?php 
                      
                         selectPaises($con,@$_SESSION['pais']);                    
                        ?>
                       
                    </select>    <?php echo "<span style='color:#F00066'>". @$errores['pais']."</span>";?>
                   
                </div>
        <!--      <div>
                    <br> <label for="provincia">Provincia en la que reside:</label><br>
                    <select name="provincia" onchange="sumit()">				
                        <option value="0">Seleccionar</option>
                      
                        
                        
                    </select>
                    
                    <br> <label for="localidad">Ciudad en la que reside:</label><br>
                    <select name="localidad" onchange="sumit()">				
                        <option value="0">Seleccionar</option>
                    </select>
                </div> 
                
                <center>
                           <div id="divAplicacion"></div>
                  </center>-->
             
              <div>
                    <br><label for="ejemplar">Ejemplar:</label>
                    <select name="ejemplar" onchange="sumit()">	
                    <?php echo "<option value='' >Seleccionar Ejemplar</option>";
                           cargarSelect($ejemplares,@$_SESSION['ejemplar']) ;?>
                   </select> <?php echo "<span style='color:#F00066'>". @$errores['ejemplar']."</span>";?>
                </div>

               <div>			
                    <br><label for="fechaNacimiento">Fecha de Nacimiento</label>
                    <input type= "date" name="fechaNacimiento" value="<?php echo @$_SESSION['fechaNacimiento'] ?>" >
                    <?php echo "<span style='color:#F00066'>". @$errores[fechaNacimiento]."</span>";?>
                </div>	
                
                <div>
                    <br><label for="documento">Numero de Documento:</label>
                    <input type="number" name="documento" placeholder="Ingresar documento" value="<?php echo @$_SESSION['documento'] ?>">
                     <?php echo "<span style='color:#F00066'>". @$errores['documento']."</span>";?>
                </div>	
                 <div>
                    <br><label for="domicilio">Domicilio:</label>
                    <input type="text" name="domicilio" placeholder="Ingresar domicilio" value="<?php echo @$_SESSION['domicilio'] ?>">
                      <?php echo "<span style='color:#F00066'>". @$errores['domicilio']."</span>";?>
                </div>
            <!--   <div>
                    <br><H4> Adjunte su foto</H4>
                    <input type="file" name="foto" multiple ><br>
                </div>-->
                <input type="submit" name="enviar" value= "Enviar" />
                			      
            </form>
        </div>

    </body>
</html>