<?php

require_once('utils/database.php');

function findDepartmentByName($name) {

	$conn = connectDB();

	$safeParam = test_input($conn, $name);

	$sql = "SELECT IdDepartamento,NombreDepartamento,contrasena FROM departamento WHERE NombreDepartamento LIKE '$safeParam'";

	$res = mysqli_query($conn, $sql);

	$user = false;

	if (mysqli_num_rows($res) > 0) {
		$row = mysqli_fetch_assoc($res);

		$user = array('id'  => $row['IdDepartamento'],
					 'name'=> $row['NombreDepartamento'],
					 'pass'=> $row['contrasena']);
	}

	return $user;
}

function findAllDepartments() {

	$conn = connectDB();

	$sql = "SELECT * FROM departamento";

	$res = mysqli_query($conn, $sql);

	$departamentos = array();
	if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$dep = array('Nombre' => $row['NombreDepartamento'], 
						 'Id'=> $row['IdDepartamento'], 
						 'Contrasenia' => $row['contrasena'],
						 'Imagen' => $row['imagen']);
			
			array_push($departamentos, $dep);
		}
	}


    closeDb($conn);
    return $departamentos;
}



  //Modifica una contraseña
  function modifyContraseniaById($id,$nuevaContrasena){
   $conn = connectDB();
    $sql="UPDATE departamento SET IdDepartamento='$id', contrasena='$nuevaContrasena' WHERE IdDepartamento = '".$id."' ";
    $result = mysqli_query($conn, $sql);
    $id = $conn->real_escape_string($id);
    $nuevaContrasena = $conn->real_escape_string($nuevaContrasena);
    closeDb($conn);
    return $result;
  }

?>