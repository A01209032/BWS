<?php

require_once('utils/database.php');

function findDepartmentByName($name) {

	$conn = connectDB();

	$sql = "SELECT IdDepartamento,NombreDepartamento,contrasena FROM departamento WHERE NombreDepartamento LIKE '$name'";

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

	$sql = "SELECT NombreDepartamento,contrasena FROM departamento";

	$res = mysqli_query($conn, $sql);
    closeDb($conn);
    return $res;
}
?>