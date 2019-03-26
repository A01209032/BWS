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

function listarPacientesCon($pattern) {

	$pacientes = array();

	$conn = conectDB();

	// For Table Pacientes con Nombre y Apellido
	$sqlQuery = "SELECT IdPaciente, Nombre
				 FROM pacientes 
				 ORDER BY nombre";



	$res = mysqli_query($conn, $sqlQuery);

	if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$id    = $row['IdPaciente'];
			$fname = $row['Nombre'];
			array_push($pacientes, array("id"=>$id, "fname"=>$fname));
		}
	}



	closeDB($conn);

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
function registrarPaciente($nombre,$apellido,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel){
      $nombre = $nombre.' '.$apellido;
      //echo '<script type="text/javascript">','alert("'.$nombre.' '.$enfermedad.' '.$direccion.' '$telefono.' '.$celular.' '.$fechaNacimiento.' '.$sexo.' '.$religion.'");','</script>';
      $res=addPaciente($nombre,$enfermedad,$direccion,$telefono,$celular,$fechaNacimiento,$sexo,$religion,$nivel);
      if($res){
      	return 100;    
        }
      return "Error";
    }
 ?>