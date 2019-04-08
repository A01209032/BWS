<?php
    require_once("../util.php");
    require_once("models/enfermedad.php");
    $enfermedadNErr = '';
    $enfermedad = '';
    $error = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["enfermedad"])) {
     $enfermedadErr = "Datos incompletos";
     $error = 1;
     } else {
     $enfermedad = test_input($_POST["enfermedad"]);
     
     }
     
  
      }
      
    $array= array($enfermedadNErr);
      if($error) echo json_encode($array);
      else {
       //echo '<script type="text/javascript">','alert("'.$nombre,$apellido,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel.'");','</script>';
       $error=registrarEnfermedad($enfermedad);

       if($error!=100)
          echo json_encode(array("Error: En insercion de base de datos!",$error));
       else 
          echo json_encode(array("Success: Al ingresar datos"));
      }


      


?>