<?php  
 //fetch.php  
require_once("util.php");
 $connect=conectDb();
 if(isset($_POST["employee_id"]))  
 {  
 	  $id=$_POST["employee_id"];
      $query = "SELECT IdDepartamento, IdAtienden, IdServicio,
      				   Fecha, Observaciones, CuotaRecup,
      				   atienden.IdVoluntario as 'IdVoluntario',
      				   atienden.IdPaciente as 'IdPaciente',
      				   voluntarios.Nombre as 'NombreVoluntario',
      				   pacientes.Nombre as 'NombrePaciente'
      			FROM atienden, voluntarios, pacientes 
      			WHERE idAtienden = $id AND
      				  atienden.IdVoluntario = voluntarios.IdVoluntario AND
      				  atienden.IdPaciente = pacientes.IdPaciente";
      // $query = "SELECT *
      // 			FROM atienden
      // 			WHERE idAtienden = '".$id."'" AND
      // 				  atienden.IdVoluntario = voluntarios.IdVoluntario AND
      // 				  atienden.IdPaciente = pacientes.IdPaciente;  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>