<?php
  session_start();
  include("../views/_header_carpetas.html");
  require_once ("modelo/util.php");
  include ("partials/_formulario_consultas.html");
  include("partials/_consultas.html");
  include("../views/_footer.html");
?>
