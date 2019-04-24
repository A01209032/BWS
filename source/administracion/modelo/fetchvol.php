<?php  
 //fetch.php  
require_once("util.php");
 $connect=conectDb();
 if(isset($_POST["paciente2"]))  
 {  
 	  $id=$_POST["paciente2"];
      $query = "SELECT Nombre FROM pacientes WHERE IdPaciente = '".$id."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>