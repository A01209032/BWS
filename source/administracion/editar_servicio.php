<?php
    //session_start();
    require_once("util.php");
    include("../views/_header_carpetas.html");
        
    //Validación de datos
    if(isset($_POST["depa2"]) && isset($_POST["depa2"]) != ""  &&
        isset($_POST["paciente2"]) && isset($_POST["paciente2"]) != "" && isset($_POST["asistente2"]) && isset($_POST["asistente2"]) != ""  ){
        
        $IdDepartamento=htmlspecialchars($_POST["depa2"]);
        $IdPaciente=htmlspecialchars($_POST["paciente2"]);
        $IdVoluntario=htmlspecialchars($_POST["asistente2"]);
        $Fecha=htmlspecialchars($_POST["date2"]);
        $IdServicio=htmlspecialchars($_POST["servicio2"]);
$Observaciones=htmlspecialchars($_POST["Observaciones2"]);
     $CuotaRecup=htmlspecialchars($_POST["cuota2"]);
        $temp=htmlspecialchars($_POST["employee_id"]);
        $id=intval($temp,10);
      
        if(update_Servicio($id,$IdDepartamento,$IdPaciente,$IdVoluntario,$Fecha,$IdServicio,$Observaciones,$CuotaRecup)){
          //Se cargaron los datos
          echo '<script language="javascript">';
            echo 'alert("Se edito el servicio correctamente!"); window.location="consultas.php";';
            echo '</script>';
         /*   echo '<script language="javascript">';
 //echo 'window.location.href="../administracion/consultas.php"';
            echo 'javascript:history.back()';
                echo '</script>';*/
                }
            //header('Location: '.$_SERVER['HTTP_REFERER']);
        else{
          //Error al cargar las datos
           echo '<script language="javascript">';
            echo 'alert("No se edito el servicio"); window.location="consultas.php";';
            echo '</script>';
 //echo 'window.location.href="../administracion/consultas.php"';
            echo 'javascript:history.back()';
                echo '</script>';
            //var_dump($_POST);
    }
}
else{
    echo "fallo";
}
    include("../views/_footer.html");
    
  
?>
