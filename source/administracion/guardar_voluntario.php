<?php
    require_once("util.php");
    
    
    
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

        /*if(*/insertVoluntario($nombre,$fechaNacimiento,$genero,$cargo,$tipo);//){
          //Se cargaron los datos
          include("voluntarios.php");
          //header('Location: '.$_SERVER['HTTP_REFERER']); //Regresar a donde fue la petición
        //}else{
          //Error al cargar las datos
        //}
    }else{
      //error "Falta llenar todos los campos"
      header("voluntarios.php");
    }
?>
