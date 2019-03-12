<?php

    require_once("util.php");
    /*
    include("partials/_head.html");
    $name=$_POST['nombre'];*/
    /*CONTROLADOR*/
   //Funcion para eliminar un registro
    //if (isset($_POST["nombre"])) {
        
        delete_by_name($name);
        echo '<script language="javascript">';
        echo 'alert("Se borró la fruta")';
        echo '</script>';
        header('Location: '.$_SERVER['HTTP_REFERER']);
        /*
    }else{
        echo '<script language="javascript">';
        echo 'alert("Ingresa el nombre de la fruta correctamente")';
        echo '</script>';
    }
    include("partials/_footer.html"); */
    
  
  
?>