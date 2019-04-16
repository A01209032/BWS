<?php
  session_start();
  include("../views/_header_carpetas.html");

  require_once ("modelo/util.php");

  /*Se carga todos los datos de todos los departamentos y se muestran en cartas con su contraseña
  y con la opción de modificarla*/
  //se conecta con controlador/guardar_contrasena.php
 
  //título
  include("partials/_cuentas.html");
  
?>

<?php
  include("../views/_footer.html");
?>
<script type="text/javascript" src="js/ajax.js"> </script>