<?php  
 //fetch.php  
require_once("util.php");
 $connect=conectDb();
 if(isset($_POST["employee_id"]))  
 {  
 	  $id=$_POST["employee_id"];
      $query = "SELECT * FROM tipodeservicio WHERE IdServicio = '".$id."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>