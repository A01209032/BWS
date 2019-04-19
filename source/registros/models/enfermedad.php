<?php 

/*
 * BWS
 * Modulo: enfermedad.php
 *
 * Descripcion: Modulo con funciones respecto a las Enfermedades.
 *
 * Funciones:
 * - listarEnfermedadesCon($pattern) Devuelve un array de enfermedades cuyo nombre contiene pattern.
 * - registrarEnfermedad($enfNombre) Registra en la base de datos una enfermedad.
 *
*/

//include('common/utils/database.php');
require_once('util.php');

function listarEnfermedadesCon($pattern) {

	$enfermedades = array();

	$conn = conectDB();

	// For Table enfermedades con Nombre y Apellido
	$sqlQuery = "SELECT id, nombre
				 FROM enfermedades 
				 ORDER BY nombre";



	$res = mysqli_query($conn, $sqlQuery);

	if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$id    = $row['id'];
			$nombre = $row['nombre'];
			array_push($enfermedades, array("id"=>$id, "nombre"=>$nombre));
		}
	}

	closeDB($conn);

	return $enfermedades;
}

function registrarEnfermedad($enfNombre) {
	$conn = conectDB();

	$sql = "INSERT INTO enfermedades (Nombre) VALUES ('$enfNombre')";

	$res = mysqli_query($conn, $sql);

	if ($res === false)
		return false;
	else
		return mysqli_insert_id($conn);

	closeDB($conn);
}

?>