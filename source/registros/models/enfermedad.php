<?php 

/*
 * BWS
 * Modulo: enfermedad.php
 *
 * Descripcion: Modulo con funciones respecto a las Enfermedades.
 *
 * Funciones:
 * - listarEnfermedadesCon($pattern) Devuelve un array de enfermedades cuyo nombre contiene pattern.
 * - buscarEnfermedadPorId($id) Busca en la base de datos la enferemedad con id $id y lo devuelve.
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

?>