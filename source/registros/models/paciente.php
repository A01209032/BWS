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

// include('common/utils/database.php');

function listarPacientesCon($pattern) {

	$pacientes = array();

	// $conn = connectDB();

	// For Table Pacientes con Nombre y Apellido
	/*$sqlQuery = "SELECT IdPaciente, (nombre + '' + apellido) as 'Full Name'
				 FROM paciente 
				 HAVING (nombre + '' + apellido) LIKE ?
				 ORDER BY 'Full Name'";*/
	$sqlQuery = "SELECT IdPaciente, Nombre
				 FROM paciente 
				 WHERE nombre LIKE '$pattern'
				 ORDER BY nombre";



	// $res = mysqli_execute($conn, $sqlQuery);

	// if (mysqli_num_rows($res) > 0) {
	// 	while ($row = mysqli_fech_assoc($res)) {
	// 		$id    = $row['IdPaciente'];
	// 		$fname = $row['Full Name'];
	// 		array_push($pacientes, array("id"=>$id, "fname"=>$fname));
	// 	}
	// }

	// TODO: ESTO ES UNA SIMULACION DE LA FUNCIONALIDAD REALMENTE SERIA CON SQL
	$todosLosPacientes = array(array("IdPaciente"=>0, "Nombre"=>"Juan Jose Olivera"),
							   array("IdPaciente"=>1, "Nombre"=>"Domenica Renteria"),
							   array("IdPaciente"=>2, "Nombre"=>"Juan Carlos Diaz"),
							   array("IdPaciente"=>3, "Nombre"=>"Agusto Dominguez"),
							   array("IdPaciente"=>4, "Nombre"=>"Ana Alcantara"),
							   array("IdPaciente"=>5, "Nombre"=>"Antonio Diaz"));

	for ($i=0; $i < count($todosLosPacientes); $i++) {
        $pos = stripos(strtolower($todosLosPacientes[$i]['Nombre']), $pattern);
        if (!($pos === false)) {
                $paciente = $todosLosPacientes[$i];
                array_push($pacientes, array('id'=> $paciente['IdPaciente'], 'fname'=>$paciente['Nombre']));
        }
	}	



	// closeDB($conn);

	return $pacientes;
}


/*
 * Funcion A Implementar
*/
function buscarPacientePorId($id) {
	$paciente = array();

	$found = false;

	// Conectar, Consultar/Buscar, Cerrar Sesion

	if (!$found)
		return false;

	return $paciente;
}

 ?>