<?php 
    require_once("util.php");
    include("../views/_header_carpetas.html");
    $_POST["depa"]=htmlspecialchars($_POST["depa"]);
    $_POST["date"]=htmlspecialchars($_POST["date"]);
    if(isset($_POST["depa"] )){
        getServicioByDepartamentoyFecha($_POST["depa"],$_POST["date"]);
    }
    
    else{
         getServicioByDepartamentoyFecha();
            }
     include("../views/_footer.html");


?>

