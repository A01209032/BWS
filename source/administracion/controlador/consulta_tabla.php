<?php 
    require_once("../modelo/util.php");
    $depa=htmlspecialchars($_POST["depa"]);
    $date=htmlspecialchars($_POST["date"]);
     $_SESSION["date1"]=$_POST["date"];
     $_SESSION["depa1"]=$_POST["depa"];
    if(isset($_POST["depa"] )){
     getServicioByDepartamentoyFecha($_POST["depa"],$_POST["date"]);
        
    }
    
    else{
         getServicioByDepartamentoyFecha();
    }
?>

