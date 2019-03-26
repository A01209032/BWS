<?php
  session_start();
  require_once("models/registro.php");
  require_once("../util.php");

   $pacienteErr = $asistenteErr = $fechaError = $tipoErr = "*";
   $paciente    = $asistente  = $fecha = $tipo = $observaciones ="";

   $error = 0;

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["paciente"])) {
     $pacienteErr = "Datos incompletos";
     $error = 1;
   } else {
     $paciente = test_input($_POST["paciente"]);
   }

   if (empty($_POST["asistente"])) {
     $asistenteErr = "Datos incompletos";
     $error = 1;
   } else {
     $asistente = test_input($_POST["asistente"]);
   }
   if (empty($_POST["fecha"])) {
     $fechaErr = "Porfavor elige una fecha";
     $error = 1;
   } else {
     $fecha = test_input($_POST["fecha"]);
   }

    if (empty($_POST["tipo"])) {
      $tipoErr = "Datos incompletos";
      $error = 1;
    } else {
        $tipo = test_input($_POST["tipo"]);
        $observaciones = test_input($_POST['observaciones']);
        $cuota = test_input($_POST["CuotaRecup"]);
    }
  
  } else 
    $error=1;


    if ($error == 1) {
      echo "Error: En los campos!";
    } else {
      $error=registrar($paciente,$asistente,$fecha,$tipo,$observaciones,$cuota);
      if($error != 100) {
       echo 'Error: Al insertar a la base de datos!';
        
      }
      else 
        echo "Success: Registro hecho correctamente!";
   }

   

   

 ?>