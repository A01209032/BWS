<?php
    require_once("../modelo/util.php");
    //include("../views/_header_carpetas.html");

    $id=$_POST['id'];

    /*CONTROLADOR*/
    //Funcion para eliminar un registro
    if (isset($_POST["id"])) {
        //header('Location: '.$_SERVER['HTTP_REFERER']);
        deleteVoluntarioById($id);
        //echo '<script language="javascript">';
        echo 'Se eliminó correctamente el voluntario';
        //echo '</script>';
    }else{
        //header('Location: '.$_SERVER['HTTP_REFERER']);
        //echo '<script language="javascript">';
        echo 'No se pudo eliminar';
        //echo '</script>';
    }
?>