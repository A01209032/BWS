<?php
    //session_start();
    require_once("util.php");
    include("../views/_header_carpetas.html");
        
    //Validación de datos
    if(isset($_POST["nombreM"]) && isset($_POST["nombreM"]) != "" &&
        isset($_POST["fechaDeNacimientoM"]) && isset($_POST["fechaDeNacimientoM"]) != "" &&
        isset($_POST["sexoM"]) && isset($_POST["sexoM"]) != "" &&
        isset($_POST["cargoM"]) && isset($_POST["cargoM"]) != "" &&
        isset($_POST["tipoM"]) && isset($_POST["tipoM"]) != ""){

        $id=htmlspecialchars($_POST["employee_id"]);
        $nombre=htmlspecialchars($_POST["nombreM"]);
        $fechaNacimiento=htmlspecialchars($_POST["fechaDeNacimientoM"]);
        $genero=htmlspecialchars($_POST["sexoM"]);
        $cargo=htmlspecialchars($_POST["cargoM"]);
        $tipo=htmlspecialchars($_POST["tipoM"]);

      
        updateVoluntarioById($id,$nombre,$fechaNacimiento,$genero,$cargo,$tipo);
          //Se cargaron los datos
         //var_dump($_POST);
          echo '<script language="javascript">';
            echo 'alert("Se edito el voluntario");window.location="voluntarios.php";';
            echo '</script>';
            //header('Location: '.$_SERVER['HTTP_REFERER']);
        }else{
          //Error al cargar las datos
          echo '<script language="javascript">';
            echo 'alert("No se encontro el registro de volutario")';
            echo '</script>';
            var_dump($_POST);
    }
    include("../views/_footer.html");
    
  
?>