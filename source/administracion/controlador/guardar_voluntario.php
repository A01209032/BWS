<?php
    /*Controaldor que almacena un voluntario si todos los campos de la forma estan llenos*/
    require_once("../modelo/util.php");
    
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

        /*if(*/insertVoluntario($nombre,$fechaNacimiento,$genero,$cargo,$tipo,1);//){
          //echo '<script language="javascript">';
          echo 'alert("Se agrego el voluntario de manera exitosa")';
          //echo 'window.location="../voluntarios.php";';
          //echo '</script>';
          //header( "refresh:.1; url=../voluntarios.php" );
        //}else{
          //Error al cargar las datos
        //}
    }else{
      //error "Falta llenar todos los campos"
      //header("../voluntarios.php");
    }
?>
