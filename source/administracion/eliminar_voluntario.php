<?php

    require_once("util.php");
    
    include("../views/_header_carpetas.html");

    $id=$_POST['id'];

    /*CONTROLADOR*/
   //Funcion para eliminar un registro
    if (isset($_POST["id"])) {
        deleteVoluntarioById($id);
        echo '<script language="javascript">';
        echo 'alert("Se borró la fruta")';
        echo '</script>';
        header('Location: '.$_SERVER['HTTP_REFERER']);
        
    }else{
        echo '<script language="javascript">';
        echo 'alert("No se puedo eliminar")';
        echo '</script>';
    }
    include("../views/_footer.html");
    
  
  
?>
?>