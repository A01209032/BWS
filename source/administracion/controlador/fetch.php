<?php  
 //fetch.php  
 /*Obtiene los datos del voluntario seleccionado*/
 require_once("util.php");
 $connect=connectDB();
 if(isset($_POST["employee_id"]))  
 {  
 	  $id=$_POST["employee_id"];
      $query = "SELECT * FROM voluntarios WHERE IdVoluntario = '".$id."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result); 
      echo "YUPI";
      //echo json_encode($row);  
 }  
 ?>
 