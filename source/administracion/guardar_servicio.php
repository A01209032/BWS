<?php
    require_once("util.php");
    
    
    
    //Validación de datos
    if(isset($_POST["nombre"]) && isset($_POST["nombre"]) != "" &&
        isset($_POST["descripcion"]) && isset($_POST["descripcion"]) != "" &&
        isset($_POST["depa"]) && isset($_POST["depa"]) != "" ){

        $nombre=htmlspecialchars($_POST["nombre"]);
        $descripcion=htmlspecialchars($_POST["descripcion"]);
        $depa=htmlspecialchars($_POST["depa"]);
        $date=htmlspecialchars($_POST["date"]);

        insertnew($nombre,$descripcion,$depa,$date);//){
        echo '<script language="javascript">';
        echo 'alarm("Se inserto un nuevo servicio de manera correcta!")';
                echo '</script>';
          echo '<script language="javascript">';
 //echo 'window.location.href="../administracion/consultas.php"';
            echo 'javascript:history.back()';
                echo '</script>';
       
    }else{
      //error "Falta llenar todos los campos"
       echo '<script language="javascript">';
        echo 'alarm("No se pudo insertar el nuevo servicio!")';
                echo '</script>';
          echo '<script language="javascript">';
 //echo 'window.location.href="../administracion/consultas.php"';
            echo 'javascript:history.back()';
                echo '</script>';
    }
?>
