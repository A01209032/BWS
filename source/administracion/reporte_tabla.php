<?php 
    require_once("util.php");
    include("../views/_header_carpetas.html");
    $_POST["date"]=htmlspecialchars($_POST["date"]);

        getServicioByFecha($_POST["date"]);
    
            
     include("../views/_footer.html");
    include("partials/_generar_reporte.html") 


?>
