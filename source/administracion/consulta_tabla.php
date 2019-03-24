<?php 
    require_once("util.php");
    $depa=htmlspecialchars($_POST["depa"]);
    $date=htmlspecialchars($_POST["date"]);

    if(isset($_POST["depa"] )){
     getServicioByDepartamentoyFecha($_POST["depa"],$_POST["date"]);
        
    }
    
    else{
         getServicioByDepartamentoyFecha();
            }
    

?>

