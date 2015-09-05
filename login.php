<?php
ob_start();
session_start();
require_once 'conexionBD.php';
ob_end_flush();?>
<html>
<head><title>Login</title></head>
<body>
        <div align="center">
               <div style="width:300px; border: solid 1px #006D9C; " align="left">
                      <?php if(isset($errMsg)){
                         echo '<div style="color:#FF0000;text-align:center;font-size:12px;">'.$errMsg.'</div>';
                         } ?>

               <div style="background-color:#006D9C; color:#FFFFFF; padding:3px;"><b>Login</b></div>
                      <div style="margin:30px">

                          <form action="procesamientoDatos.php" method="post">

                                  <label>Usuario  :</label><input type="text" name="usuario" class="box"/><br /><br />
                                  <label>Password  :</label><input type="password" name="pass" class="box" /><br/><br />
                                  <input type="submit" name='logear' value="Submit" class='submit'/><br />

                             </form>
                      </div>
               </div>
        </div>
</body>
</html>

