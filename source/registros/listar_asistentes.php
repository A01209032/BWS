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

include('models/asistente.php');


if (isset($_GET['pattern'])) {
	$asistentesPattern = $_GET['pattern'];

	// Remover Ataque HTML
	$asistentesPattern = htmlspecialchars($asistentesPattern);

	// Remover Ataque SQL
	// $asistentesPattern = mysqli_escape_string($asistentesPattern);

	$asistentes = listarAsistentesCon($asistentesPattern);

	$resStr = "";
	for ($i=0; $i < count($asistentes); $i++) {
		$pId = $asistentes[$i]['id'];
		$pName = $asistentes[$i]['fname'];
		
		$resStr .= "$pId|$pName";

		if ($i != count($asistentes)-1) $resStr .= "#";
	}

	echo json_encode($asistentes);
	//echo $resStr;

} else {
	echo json_encode(array("Error", "Argumentos No Validos o Suficientes Enviados a la Peticion"));
	// echo "Error#Argumentos No Validos o Suficientes Enviados a la Peticion";

}


?>