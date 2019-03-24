<?php
 /*Controlador que se utiliza en voluntario.php y en js/edicion.js para cargar los datos del voluntario seleccionado */
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
 