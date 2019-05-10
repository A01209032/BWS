<?php
    require_once("../util.php");
    require_once("models/paciente.php");
    require_once("models/enfermedad.php");
    $nombre = $nivel = $apellido = $enfermedad = $direccion = $telefono = $celular = $fechaNacimiento = $sexo = $religion = ' ';
    $nombreErr = $nivelErr =$apellidoErr = $fechaNacimientoErr =$enfermedadErr = $sexoErr = $religionErr = '';
    $error = 0;
    $telefono =0;
    $celular = 0;
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["nombre"])) {
     $nombreErr = "Datos incompletos";
     $error = 1;
     } else {
     $nombre = test_input($_POST["nombre"]);
     
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
   if ($_POST["enfermedad"] == '-1') {
      // Necesita Registrar la Enfermedad Nueva
      if (empty($_POST["enfermedadNombre"])) {
        $error = 1;
        $enfermedadErr = "Datos incompletos";
      }
   } else {
      $enfermedad = test_input($_POST["enfermedad"]);
   }
   /*if (empty($_POST["enfermedad"])) {
    $enfermedadErr = "Datos incompletos";
    $error = 1;
   } else {
     $enfermedad = test_input($_POST["enfermedad"]);
   }*/
    if (empty($_POST["direccion"])) {
     
     } else {
       $direccion = test_input($_POST["direccion"]);
       

    }
    if (empty($_POST["telefono"])) {
     } else {
       $telefono = test_input($_POST["telefono"]);
       

    }
    if (empty($_POST["celular"])) {
     
     } else {
       $celular = test_input($_POST["celular"]);
       

    }
    if (empty($_POST["sexo"])) {
      $sexoErr = "Datos incompletos";
      $error = 1;
    } else {
        $sexo = test_input($_POST["sexo"]);
      
  
      }
      
        $array= array($nombreErr,$nivelErr,$apellidoErr,$fechaNacimientoErr,$enfermedadErr,$sexoErr,$religionErr);

      if($error) echo json_encode($array);
      else {

        if ($_POST["enfermedad"] == '-1') {
          $enfermedad = registrarEnfermedad(test_input($_POST["enfermedadNombre"]));
        }
       //echo '<script type="text/javascript">','alert("'.$nombre,$apellido,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel.'");','</script>';
        $id = test_input($_POST["id"]);
       $error=actualizarPaciente($id,$nombre,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel);


        if($error!=100)
          echo json_encode(array("Error: En inserción de base de datos!",$error));
       else 
          echo json_encode(array("Success: Al ingresar datos"));
      }


      }else {


          // Por El Momento Nada


      }
  


  




?>
