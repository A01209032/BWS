<?php
  session_start();
  require_once("util.php");
  header_html();

  switch ($_SESSION['departamento']) {
    case 'asistencias':
      require_once("registroAsistencia.php");
      break;

    case 'dispensario':
      require_once("registroDisepnsario.php");
      break;

    case 'porteria':
      require_once("registroPorteria.php");
        break;

    default:
      // code...
      break;
  }






  include("views/_footer.html");
 ?>
