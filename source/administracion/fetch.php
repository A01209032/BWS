<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "servicio_social");  
 if(isset($_POST["employee_id"]))  
 {  
 	  $id=$_POST["employee_id"];
      $query = "SELECT * FROM voluntarios WHERE IdVoluntario = '".$id."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 