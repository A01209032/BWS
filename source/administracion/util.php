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

  function insertVoluntario($nombre,$fechaNacimiento,$genero,$cargo,$tipo) {
        $bd = conectDb();
        
        // insert command specification 
        $query='INSERT INTO voluntarios (Nombre,FechaDeNacimiento,Sexo,Cargo,Tipo) VALUES (?,?,?,?,?)';
        // Preparing the statement 
        if (!($statement = $bd->prepare($query))) {
            die("Preparation failed: (" . $bd->errno . ") " . $bd->error);
        }
        
        $nombre = $bd->real_escape_string($nombre);
        $fechaNacimiento = $bd->real_escape_string($fechaNacimiento);
        $genero = $bd->real_escape_string($genero);
        $cargo = $bd->real_escape_string($cargo);
        $tipo = $bd->real_escape_string($tipo);
        
        if (!$statement->bind_param("sssss", $nombre,$fechaNacimiento,$genero,$cargo,$tipo)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
         // Executing the statement
         if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
          } 

        closeDb($bd);
    }
?>
