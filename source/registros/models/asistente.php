<?php 

/*
 * BWS
 * Modulo: paciente.php
 *
 * Descripcion: Modulo con funciones respecto a los Pacientes.
 *
 * Funciones:
 * - listarPacientesCon($pattern) Devuelve un array de pacientes cuyo nombre contiene pattern.
 * - buscarPacientePorId($id) Busca en la base de datos el paciente con id $id y lo devuelve.
 *
*/

//include('common/utils/database.php');
require_once('util.php');

function listarVoluntariosCon($pattern) {

	$voluntarios = array();

	$conn = conectDB();

	// For Table voluntarios con Nombre y Apellido
	$sqlQuery = "SELECT IdVoluntario, Nombre
				 FROM voluntarios 
				 ORDER BY Nombre";



	$res = mysqli_query($conn, $sqlQuery);

	if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$id    = $row['IdVoluntario'];
			$fname = $row['Nombre'];
			array_push($voluntarios, array("id"=>$id, "fname"=>$fname));
		}
	}

	closeDB($conn);

	return $voluntarios;
}

?>