<?php
    require_once("../util.php");
    require_once("models/paciente.php");
    $nombre = $nivel = $apellido = $enfermedad = $direccion = $telefono = $celular = $fechaNacimiento = $sexo = $religion = ' ';
    $nombreErr = $nivelErr =$apellidoErr = $fechaNacimientoErr =$enfermedadErr = $sexoErr = $religionErr = '*';
    $error = 0;
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["nombre"])) {
     $nombreErr = "Datos incompletos";
     $error = 1;
     } else {
     $nombre = test_input($_POST["nombre"]);
     
     }
     if (empty($_POST["apellido"])) {
     $apellidoErr = "Datos incompletos";
     $error = 1;
     } else {
     $apellido = test_input($_POST["apellido"]);
     

     }
     if (empty($_POST["fecha_nacimiento"])) {
     $fechaNacimientoErr = "Porfavor elige una fecha";
     $error = 1;
     } else {
       $fechaNacimiento = test_input($_POST["fecha_nacimiento"]);
     

    }
     if (empty($_POST["religion"])) {
     $religionErr = "Datos incompletos";
     $error = 1;
     } else {
       $religion = test_input($_POST["religion"]);
       

    }
    if (empty($_POST["nivel"])) {
     $nivelErr = "Datos incompletos";
     $error = 1;
     } else {
       $nivel = test_input($_POST["nivel"]);
       

    }
    if (empty($_POST["sexo"])) {
      $sexoErr = "Datos incompletos";
      $error = 1;
    } else {
        $sexo = test_input($_POST["sexo"]);
        $direccion = test_input($_POST['direccion']);
        $telefono = test_input($_POST['telefono']);
        $celular = test_input($_POST['celular']);
      
  
      }
      }else $error=1;
      
  if($error) include("registro_paciente.html");
  else {
   //echo '<script type="text/javascript">','alert("'.$celular.'");','</script>';
   $error=registrarPaciente($nombre,$apellido,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel);
   if($error!=100){
       echo '<script type="text/javascript">',
     'alert("'.$error.'");',
     '</script>';
   }
   else  echo '<script type="text/javascript">',
     'alert("'.'Registro exitoso'.'");',
     '</script>';
   include("registro_paciente.html");   
  }




?>
