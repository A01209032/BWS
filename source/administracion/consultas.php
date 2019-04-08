<?php
  session_start();
  include("../views/_header_carpetas.html");
  include ("partials/_formulario_consultas.html");
  include("partials/_consultas.html");
  require_once ("modelo/util.php");
  include("../views/_footer.html");
?>
