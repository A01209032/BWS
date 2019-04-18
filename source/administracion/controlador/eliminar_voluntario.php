<?php
    require_once("../modelo/util.php");
    //include("../views/_header_carpetas.html");

    $id=$_POST['employee_id'];

    /*CONTROLADOR*/
    //Funcion para eliminar un registro
    if (isset($_POST["employee_id"])) {
        deleteVoluntarioById($id);
        echo 'Se eliminó correctamente el voluntario';
    }else{
        echo 'No se pudo eliminar';
    }
?>