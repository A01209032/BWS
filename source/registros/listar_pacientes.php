<?php 

/*
 * BWS
 * Modulo: listar_pacientes.php
 *
 * Descripcion: Controlador de la accion 'listar pacientes' que devuelve una lista 
 * de pacientes que coincidan con el nombre buscado.
 *
 * Tipo de Peticion: GET
 * Params:
 *  - pattern: String del patron del nombre a buscar entre los pacientes
 *
 * Response:
 *  - String de lista de pacientes con 2 atributos en orden 'id' y 'nombre'.
 *  - Formato: Cada paciente esta separado por '#'. Cada atributo de cada paciente
 *    esta separado por '|'.
 *
 * Errores:
 *   - Si no se establece ningun parametro 'pattern' en GET se genera un error de
 *   - argumentos invalidos.
*/

include('models/paciente.php');


if (isset($_GET['pattern'])) {
	$pacientePattern = $_GET['pattern'];

	// Remover Ataque HTML
	$pacientePattern = htmlspecialchars($pacientePattern);

	// Remover Ataque SQL
	// $pacientePattern = mysqli_escape_string($pacientePattern);

	$pacientes = listarPacientesCon($pacientePattern);

	$resStr = "";
	for ($i=0; $i < count($pacientes); $i++) {
		$pId = $pacientes[$i]['id'];
		$pName = $pacientes[$i]['fname'];
		
		$resStr .= "$pId|$pName";

		if ($i != count($pacientes)-1) $resStr .= "#";
	}

	echo $resStr;

} else {

	echo "Error#Argumentos No Validos o Suficientes Enviados a la Peticion";

}


?>