<?php
    //session_start();
    require_once("util.php");
    include("../views/_header_carpetas.html");
        
    //Validación de datos
    if(isset($_POST["nombre"]) && isset($_POST["nombre"]) != "" &&
        isset($_POST["fechaDeNacimiento"]) && isset($_POST["fechaDeNacimiento"]) != "" &&
        isset($_POST["sexo"]) && isset($_POST["sexo"]) != "" &&
        isset($_POST["cargo"]) && isset($_POST["cargo"]) != "" &&
        isset($_POST["tipo"]) && isset($_POST["tipo"]) != ""){

        $nombre=htmlspecialchars($_POST["nombre"]);
        $fechaNacimiento=htmlspecialchars($_POST["fechaDeNacimiento"]);
        $genero=htmlspecialchars($_POST["sexo"]);
        $cargo=htmlspecialchars($_POST["cargo"]);
        $tipo=htmlspecialchars($_POST["tipo"]);

      
        updateVoluntarioById($id,$nombre,$fechaNacimiento,$genero,$cargo,$tipo);
          //Se cargaron los datos
          echo '<script language="javascript">';
            echo 'alert("Se edito el voluntario")';
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