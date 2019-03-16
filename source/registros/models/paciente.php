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

include('common/utils/database.php');

function listarPacientesCon($pattern) {

	$pacientes = array();

	$conn = connectDB();

	// For Table Pacientes con Nombre y Apellido
	/*$sqlQuery = "SELECT IdPaciente, (nombre + '' + apellido) as 'Full Name'
				 FROM paciente 
				 HAVING (nombre + '' + apellido) LIKE ?
				 ORDER BY 'Full Name'";*/
	$sqlQuery = "SELECT IdPaciente, nombre
				 FROM paciente 
				 WHERE nombre LIKE '$pattern'
				 ORDER BY nombre";



	$res = mysqli_execute($conn, $sqlQuery);

	if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fech_assoc($res)) {
			$id    = $row['IdPaciente'];
			$fname = $row['Full Name'];
			array_push($pacientes, array("id"=>$id, "fname"=>$fname));
		}
	}

	return $pacientes;

	closeDB($conn);

}

function buscarPacientePorId($id) {
	$paciente = array();

	$found = false;

	// Conectar, Consultar/Buscar, Cerrar Sesion

	if (!$found)
		return false;

	return $paciente;
}

 ?>