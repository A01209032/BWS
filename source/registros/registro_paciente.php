<?php
    require_once("../util.php");
    require_once("models/paciente.php");
    $nombre = $nivel = $apellido = $enfermedad = $direccion = $telefono = $celular = $fechaNacimiento = $sexo = $religion = ' ';
    $nombreErr = $nivelErr =$apellidoErr = $fechaNacimientoErr =$enfermedadErr = $sexoErr = $religionErr = '*';
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
     if (empty($_POST["enfermedad"])) {
     $enfermedadErr = "Datos incompletos";
     $error = 1;
     } else {
       $enfermedad = test_input($_POST["enfermedad"]);
       

    }
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
      

      if($error) echo "Error: En los campos!";
      else {
       //echo '<script type="text/javascript">','alert("'.$nombre,$apellido,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel.'");','</script>';
       $error=registrarPaciente($nombre,$apellido,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel);


       if($error!=100)
         echo "Error: En insercion de base de datos!";
       else 
          echo "Success: Al ingresar datos";
      }


      }else {


          // Por El Momento Nada


      }
  


  




?>
