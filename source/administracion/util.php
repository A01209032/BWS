<?php

  function conectDb(){

  	$conexion=mysqli_connect("localhost","root","","bws");
  	//Validar la conexion
  	if($conexion==NULL){
  		die("Error en la conexión");
  	}
  	$conexion->set_charset("utf8");

  	return $conexion;
  }

  //ciErra la base de datos
  function closeDb ($conexion){
  	mysqli_close($conexion);
  }

  //Obtiene todos los voluntarios 
  function getVoluntarios(){
  	$conn=conectDb();
  	$sql="SELECT IdVoluntario, Nombre, FechaDeNacimiento, Sexo, Cargo, Tipo FROM voluntarios";
  	$result = mysqli_query($conn, $sql);
  	closeDb($conn);
  	return $result;
  }

  function getEdadVoluntario(){
    $conn=conectDb();
    $sql="SELECT GETDATE() - FechaDeNacimiento as 'Edad' FROM voluntarios";
    $result = mysqli_query($conn, $sql);
   closeDb($conn);
    return $result;
  }
  
?>
