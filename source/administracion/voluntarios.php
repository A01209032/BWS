<?php
  //Carga la tabla de voluntarios con la opcion de modificar y eliminarlos
  session_start();
  include("../views/_header.html");
  require_once ("modelo/util.php");

  include("partials/_voluntarios.html");

  include("../common/views/alertModal.html");
  include("partials/_confirmacion_borrar_voluntario.html");

  //include("../common/views/confirmModal.html");
?>

<script type="text/javascript" src="js/edicion.js"></script>
<script type="text/javascript" src="js/loading.js"></script>

<?php include("../views/_footer.html"); ?>
