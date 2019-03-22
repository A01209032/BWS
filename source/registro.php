<?php
  session_start();
  require_once("util.php");
  header_html();

  switch ($_SESSION['departamento']) {
    case 'asistencias':
     $pacienteErr= $asistenteErr = $fechaError = $tipoErr = "*";
$paciente  = $asistente  = $fecha = $tipo = $observaciones ="";
$error = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {


if (empty($_POST["password"])) {
  $passwordErr = "Incomplete data";
  $error = 1;
} else {
  $password1 = test_input($_POST["password"]);
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
    $error = 1;
  } else {
    $username = test_input($_POST["username"]);
    $_SESSION["username"] = "$username";
    $error=0;

  }
}

}else $error=1;
if($error) include("registro.html");
else include("registro.html");


      break;

    case 'dispensario':
     $pacienteErr= $asistenteErr = $fechaError = $tipoErr = "*";
$paciente  = $asistente  = $fecha = $tipo = $observaciones ="";
$error = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {


if (empty($_POST["password"])) {
  $passwordErr = "Incomplete data";
  $error = 1;
} else {
  $password1 = test_input($_POST["password"]);
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
    $error = 1;
  } else {
    $username = test_input($_POST["username"]);
    $_SESSION["username"] = "$username";
    $error=0;

  }
}

}else $error=1;
if($error) include("registro.html");
else include("registro.html");


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
     $asistenteErr = "Porfavor elige una fecha";
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
      if($error) include("registro.html");
      else include("registro.html");


      break;

    default:
      // code...
      break;
  }






  include("views/_footer.html");
 ?>
