<?php
    require_once("../util.php");
    require_once("models/servicio.php");
    $error=0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["nombreServicio"])) {
     $error= 1;
     } else {
     $nombreServicio = test_input($_POST["nombreServicio"]);
     
     }
     if(!$error){
        if(registrar($nombreServicio))
        echo "success";
        else echo "error";
     }
     else echo "errord";
     
    }



?>