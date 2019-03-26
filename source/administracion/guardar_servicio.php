<?php
    require_once("util.php");
    
    
    
    //Validación de datos
    if(isset($_POST["nombre"]) && isset($_POST["nombre"]) != ""  &&
        isset($_POST["descripcion"]) && isset($_POST["descripcion"]) != "" &&
        isset($_POST["depa"]) && isset($_POST["depa"]) != "" ){

        $nombre=htmlspecialchars($_POST["nombre"]);
        $descripcion=htmlspecialchars($_POST["descripcion"]);
        $depa=htmlspecialchars($_POST["depa"]);
        $date=htmlspecialchars($_POST["date"]);

        insertnew($nombre,$descripcion,$depa,$date);//){
         echo '<script language="javascript">';
            echo 'alert("Se creo el servicio de manrea exitosa!"); window.location="consultas.php";';
            echo '</script>';
       
    }else{
      //error "Falta llenar todos los campos"
        echo '<script language="javascript">';
            echo 'alert("Se edito el servicio"); window.location="consultas.php";';
            echo '</script>';
    }
?>
