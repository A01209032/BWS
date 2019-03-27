<?php
  session_start();
   $pacienteErr= $asistenteErr = $fechaError = $tipoErr = "*";
   $nombreErr = $nivelErr =$apellidoErr = $fechaNacimientoErr =$enfermedadErr = $sexoErr = $religionErr = '*';
  /*
  require_once("../util.php");
  require_once("util.php");
  require_once("models/registro.php");
  include("../views/_header.html");

  switch ($_SESSION['departamento']) {
    case 'asistencias':
     
     $paciente  = $asistente  = $fecha = $tipo = $observaciones ="";
     $error = 1;
     
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["paciente"])) {
     $pacienteErr = "Datos incompletos";
     $error = 1;
     } else {
     $paciente = test_input($_POST["paciente"]);
     $error=0;
     }
     if (empty($_POST["asistente"])) {
     $asistenteErr = "Datos incompletos";
     $error = 1;
     } else {
     $asistente = test_input($_POST["asistente"]);
     $error=0;

     }
     if (empty($_POST["fecha"])) {
     $fechaErr = "Porfavor elige una fecha";
     $error = 1;
     } else {
       $fecha = test_input($_POST["fecha"]);
       $error=0;

    }
    if (empty($_POST["tipo"])) {
      $tipoErr = "Datos incompletos";
      $error = 1;
    } else {
        $tipo = test_input($_POST["tipo"]);
        $observaciones = test_input($_POST['observaciones']);
        $error=0;
  
      }
      }else $error=1;




      break;

    case 'dispensario':
     $pacienteErr= $asistenteErr = $fechaError = $tipoErr = "*";
     $paciente  = $asistente  = $fecha = $tipo = $observaciones ="";
     $error = 1;
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["paciente"])) {
     $pacienteErr = "Datos incompletos";
     $error = 1;
     } else {
     $paciente = test_input($_POST["paciente"]);
     $error=0;
     }
     if (empty($_POST["asistente"])) {
     $asistenteErr = "Datos incompletos";
     $error = 1;
     } else {
     $asistente = test_input($_POST["asistente"]);
     $error=0;

     }
     if (empty($_POST["fecha"])) {
     $fechaErr = "Porfavor elige una fecha";
     $error = 1;
     } else {
       $fecha = test_input($_POST["fecha"]);
       $error=0;

    }
    if (empty($_POST["tipo"])) {
      $tipoErr = "Datos incompletos";
      $error = 1;
    } else {
        $tipo = test_input($_POST["tipo"]);
        $observaciones = test_input($_POST['observaciones']);
        $error=0;
  
      }
      }else $error=1;



      break;

    case 'porteria':
     $pacienteErr= $asistenteErr = $fechaError = $tipoErr = "*";
     $paciente  = $asistente  = $fecha = $tipo = $observaciones ="";
     $error = 1;
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["paciente"])) {
     $pacienteErr = "Datos incompletos";
     $error = 1;
     } else {
     $paciente = test_input($_POST["paciente"]);
     $error=0;
     }
     if (empty($_POST["asistente"])) {
     $asistenteErr = "Datos incompletos";
     $error = 1;
     } else {
     $asistente = test_input($_POST["asistente"]);
     $error=0;

     }
     if (empty($_POST["fecha"])) {
     $fechaErr = "Porfavor elige una fecha";
     $error = 1;
     } else {
       $fecha = test_input($_POST["fecha"]);
       $error=0;

    }
    if (empty($_POST["tipo"])) {
      $tipoErr = "Datos incompletos";
      $error = 1;
    } else {
        $tipo = test_input($_POST["tipo"]);
        $observaciones = test_input($_POST['observaciones']);
        $error=0;
  
      }
      }else $error=1;


      break;

    default:
      // code...
      break;
  }
  
  if($error) include("registro.html");
  else {
      
   $cuota=test_input($_POST["CuotaRecup"]);
   //echo '<script type="text/javascript">','alert("'.$_POST["CuotaRecup"].'");','</script>';
   
   $error=registrar($paciente,$asistente,$fecha,$tipo,$observaciones,$cuota);
   if($error!=100){
       echo '<script type="text/javascript">',
     'alert("'.$error.'");',
     '</script>';
   }
   include("registro.html");   
  }

*/

  session_start();
  include("../views/_header.html");
  include("registro.html"); 
  include("../views/_footer.html");
 ?>
