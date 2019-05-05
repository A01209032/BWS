<?php
  session_start();
  include("../views/_header.html");

  require_once ("modelo/util.php");

  /*Se carga todos los datos de todos los departamentos y se muestran en cartas con su contraseña
  y con la opción de modificarla*/
  //se conecta con controlador/guardar_contrasena.php

  //título
  include("partials/_cuentas.html");
  include("../common/views/alertModal.html");

?>
<script type="text/javascript" src="js/cuentas.js"> </script>
<script type="text/javascript" src="js/loading.js"></script>
<?php
  include("../views/_footer.html");
?>
