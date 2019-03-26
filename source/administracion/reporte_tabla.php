<?php 
    require_once("util.php");
    $_POST["date"]=htmlspecialchars($_POST["date"]);
    $_POST["date2"]=htmlspecialchars($_POST["date2"]);

        getServicioByFecha($_POST["date"],$_POST["date2"]);
    
            
   


?>
