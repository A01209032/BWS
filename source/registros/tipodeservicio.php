<?php
    require_once("../util.php");
    require_once("models/servicio.php");
    session_start();
    $error=0;
    $id=getIdDepartamento($_SESSION['departamento']);
     if (empty($_POST["nombreServicio"])) {
     echo json_encode(array(1));
     } 
     else {
        $nombreServicio = test_input($_POST["nombreServicio"]);
        if(registrar($nombreServicio)) echo json_encode(array(2,getTipodeServicio($id)));
        else echo json_encode(array(3)); 
     }
     
    
        


?>