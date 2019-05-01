<?php 

/*
 * BWS
 * Modulo: listar_enfermedades.php
 *
 * Descripcion: Controlador de la accion 'listar enfermedades' que devuelve una lista 
 * de enfermedades que coincidan con el nombre buscado.
 *
 * Tipo de Peticion: GET
 * Params:
 *  - pattern: String del patron del nombre a buscar entre los enfermedad
 *
 * Response:
 *  - String de lista de enfermedades con 2 atributos en orden 'id' y 'nombre'.
 *  - Formato: Cada paciente esta separado por '#'. Cada atributo de cada enfermedad
 *    esta separado por '|'.
 *
 * Errores:
 *   - Si no se establece ningun parametro 'pattern' en GET se genera un error de
 *   - argumentos invalidos.
*/

include('models/enfermedad.php');


if (isset($_GET['pattern'])) {
	$enfermedadesPattern = $_GET['pattern'];

	// Remover Ataque HTML
	$enfermedadesPattern = htmlspecialchars($enfermedadesPattern);

	// Remover Ataque SQL
	// $enfermedadesPattern = mysqli_escape_string($enfermedadesPattern);

	$enfermedades = listarEnfermedadesCon($enfermedadesPattern);

	$resStr = "";
	for ($i=0; $i < count($enfermedades); $i++) {
		$pId = $enfermedades[$i]['id'];
		$pName = $enfermedades[$i]['nombre'];
		
		$resStr .= "$pId|$pName";

		if ($i != count($enfermedades)-1) $resStr .= "#";
	}

	echo json_encode(array("arr"=>$enfermedades));
	//echo $resStr;

} else {
	$errarr = array("Error", "Argumentos No Validos o Suficientes Enviados a la Peticion");
	echo json_encode(array("arr" => $errarr));
	// echo "Error#Argumentos No Validos o Suficientes Enviados a la Peticion";

}


?>