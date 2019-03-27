<?php
    require_once("util.php");
    
    
    
    //Validación de datos
    if(isset($_POST["depa"]) && isset($_POST["depa"]) != ""  &&
        isset($_POST["paciente"]) && isset($_POST["paciente"]) != "" && isset($_POST["asistente"]) && isset($_POST["asistente"]) != ""  ){
        
        $IdDepartamento=htmlspecialchars($_POST["depa"]);
        $IdPaciente=htmlspecialchars($_POST["paciente"]);
        $IdVoluntario=htmlspecialchars($_POST["asistente"]);
        $Fecha=htmlspecialchars($_POST["date"]);
        $IdServicio=htmlspecialchars($_POST["servicio"]);
$Observaciones=htmlspecialchars($_POST["Observaciones"]);
     $CuotaRecup=htmlspecialchars($_POST["cuota"]);
       
        
//$IdDepartamento,$IdPaciente,$IdVoluntario,$Fecha,$IdServicio,$Observaciones,$CuotaRecup
        insertnew($IdDepartamento,$IdPaciente,$IdVoluntario,$Fecha,$IdServicio,$Observaciones,$CuotaRecup);//){
        var_dump($_POST);
         echo '<script language="javascript">';
          /*  echo 'alert("Se creo el servicio de manerea exitosa!"); window.location="consultas.php";';*/
            echo '</script>';
       
    }
else{
      //error "Falta llenar todos los campos"
        var_dump($_POST);
        echo '<script language="javascript">';
            echo 'alert("Algun dato es incorrecto"); window.location="consultas.php";';
        
            echo '</script>';
    }
?>
