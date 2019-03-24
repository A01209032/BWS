<?php

    require_once("util.php");
    

    $id=$_POST['id'];

    /*CONTROLADOR*/
   //Funcion para eliminar
    if (isset($_POST["id"])) {
        
        if(delete_by_ID($id)){
        echo '<script language="javascript">';
        echo 'alert("Se eliminó correctamente el servicio")';
        echo '</script>';
            echo '<script language="javascript">';
 //echo 'window.location.href="../administracion/consultas.php"';
            echo 'javascript:history.back()';
                echo '</script>';
            
    }else{
        echo '<script language="javascript">';
        echo 'alert("No se pudo eliminar")';
        echo '</script>';
             echo '<script language="javascript">';
 //echo 'window.location.href="../administracion/consultas.php"';
            echo 'javascript:history.back()';
                echo '</script>';
    }
        
       
    }
    
  
  
?>