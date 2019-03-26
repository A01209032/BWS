<?php

    require_once("util.php");
    

    $id=$_POST['id'];

    /*CONTROLADOR*/
   //Funcion para eliminar
    if (isset($_POST["id"])) {
        
        if(delete_by_ID($id)){
         echo '<script language="javascript">';
            echo 'alert("Se elimino el servicio correctamente"); window.location="consultas.php";';
            echo '</script>';
            
    }else{
         echo '<script language="javascript">';
            echo 'alert("No se pudo eliminar el ervicio"); window.location="consultas.php";';
            echo '</script>';
    }
        
       
    }
    
  
  
?>